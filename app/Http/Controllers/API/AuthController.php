<?php
   
namespace App\Http\Controllers\API;
   
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Validator;
use GuzzleHttp;
use Illuminate\Support\Facades\Http;
use Hash;

class AuthController extends BaseController
{
    /**
     * Register API
     *
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [            
            'first_name'        => 'required',
            'last_name'         => 'required',
            'email'             => 'required|email|unique:usersz',
            'password'          => 'required',
            'confirm_password'  => 'required|same:password',
            'device_uuid'       => 'required',
            'device_name'       => 'required',
            'device_token'      => 'required',
        ]);
   
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }
        
        
        $input = $request->all();
        $input['password']      = $input['password'];
        $input['device_uuid']   = $input['device_uuid'];
        $input['device_name']   = $input['device_name'];
        $input['device_token']  = $input['device_token'];
        $input['status']        = 1;
        $user = User::create($input);        
        $success['user']    =  $user;
        $success['token'] =  $user->createToken('Larademo')->accessToken;
   
        return $this->sendResponse($success, 'User registered successfully.');
        
    }
   
    /**
     * Login API
     *
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
                
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required'            
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }
        
        $user = User::where('email', $request->email)->first();             
        if($user == null){
            return response(
                ['data'=> 
                    [
                        "responseCode"  => 400,
                        "errorCode"     => "login_fail",
                        "message"       => "User not available in database",
                    ],
                ],422
            );
        }
        if(!Hash::check($request->password, $user['password'])){
            //password is different
            return response(
                ['data'=> 
                    [
                        "responseCode"  => 404,
                        "errorCode"     => "login_fail",
                        "message"       => "Password is wrong",
                    ],
                ],422
            );
        }        
        
        // if(Auth::attempt(['email' => $request->email, 'password' => $request->password]))
        if($user)
        {
            if (Hash::check($request->password, $user->password)) {                
                //allow only login new user
                $http = new GuzzleHttp\Client; 
                try {
                    $response = $http->post(env('APP_URL').'/oauth/token', [
                        'form_params' => [
                            'grant_type' => 'password',
                            'client_id' => env('clientId'),//7,
                            'client_secret' => env('clientSecret'),//'Y8cJSQvZVwOUj9a4dxdgL7JiX0xPAMmSrBOuocch',
                            'username' => $request->email,
                            'password' => $request->password,
                            'scope' => '*',
                        ],
                        'verify' => false,
                    ]);
    
                    $data = json_decode((string) $response->getBody(), true);                
                    $result = [
                        'success'       => true,
                        'data' =>
                        [                        
                            'token_type'    => $data['token_type'],
                            'expires_in'    => $data['expires_in'],
                            'access_token'  => $data['access_token'],
                            'refresh_token'  => $data['refresh_token'],
                        ],
                        'user' => [
                            "user_id"       => $user['id'],
                            "first_name"    => $user['first_name'],
                            "last_name"    => $user['last_name'],
                            "email"         => $user['email'],
                        ],
                    ];
                    
                    return $result;
                    // dd(json_decode((string) $response->getBody(), true));
                    //return json_decode((string) $response->getBody(), true);
    
                } catch (GuzzleHttp\Exception\BadResponseException $error) {
                     
                    if ($error->getCode() === 400) {
                        // If not its because of an incorrect password
                        return response(['invalid_password' => 'Your password is not correct please try again or reset your password.'], $error->getCode());
                    }
                    return $error->getCode();
                    //Log::error('An OAuth authentication error occurred.');
                    return response('Authentication failed. Please contact support.', $error->getCode());
                }
            } else {
                $response = ["message" => "Password mismatch"];
                return response($response, 422);
            }

            /*
            $user = Auth::user();
            $success['user'] = $user;
            
            //allow only login new user
            $http = new GuzzleHttp\Client;                               

            try {
                $response = $http->post(env('APP_URL').'/oauth/token', [
                    'form_params' => [
                        'grant_type' => 'password',
                        'client_id' => env('clientId'),//7,
                        'client_secret' => env('clientSecret'),//'Y8cJSQvZVwOUj9a4dxdgL7JiX0xPAMmSrBOuocch',
                        'username' => $request->email,
                        'password' => $request->password,
                        'scope' => '*',
                    ],
                    'verify' => false,
                ]);

                $data = json_decode((string) $response->getBody(), true);                
                $result = [
                    'success'       => true,
                    'data' =>
                    [                        
                        'token_type'    => $data['token_type'],
                        'expires_in'    => $data['expires_in'],
                        'access_token'  => $data['access_token'],
                        'refresh_token'  => $data['refresh_token'],
                    ],
                    'user' => [
                        "user_id"       => $user['id'],
                        "first_name"    => $user['first_name'],
                        "last_name"    => $user['last_name'],
                        "email"         => $user['email'],
                    ],
                ];
                
                return $result;
                // dd(json_decode((string) $response->getBody(), true));
                //return json_decode((string) $response->getBody(), true);

            } catch (GuzzleHttp\Exception\BadResponseException $error) {
                 
                if ($error->getCode() === 400) {
                    // If not its because of an incorrect password
                    return response(['invalid_password' => 'Your password is not correct please try again or reset your password.'], $error->getCode());
                }
                return $error->getCode();
                //Log::error('An OAuth authentication error occurred.');
                return response('Authentication failed. Please contact support.', $error->getCode());
            }
            */
            // $success['token'] = $user->createToken('Larademo')->accessToken;            
            // return $this->sendResponse($success, 'User logged in successfully.');
        } 
        else
        { 
            return response(
                ['data'=> 
                    [
                        "responseCode"  => 0,
                        "errorCode"     => "login_fail",
                        "message"       => "Email address or password not found in our database.",
                    ],
                ],422
            );
            //return $this->sendError('Unauthorised.', ['error'=>'Unauthorised']);
        } 
    }

    /**
     * Logout API
     *
     * @return void
    */
    public function logout()
    {        
        if (Auth::check())
        {
            Auth::user()->AauthAcessToken()->delete();            
            return $this->sendResponse([], 'User logged out successfully.');
        }
        else
        {
            return $this->sendError('Unauthorised.', ['error'=>'Unauthorised']);
        }
    }
}