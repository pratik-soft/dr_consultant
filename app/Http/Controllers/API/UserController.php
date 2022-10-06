<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\Product as ProductResource;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class UserController extends BaseController
{
    /**
     * Undocumented function
     *
     * @param Request $request
     * @return void
     */
    public function updateUserProfile(Request $request){
        $data = $request->post();
        // $userId = auth('api')->user()['id'];
        $userId = $request->user_id;
        // die($userId);
        $storagePath = storage_path('app/public/user_avatar');
        if (!file_exists($storagePath)) {
            mkdir($storagePath, 0777, true);
        }

        // echo env('APP_SROTAGE_URL');exit;
        if($request->user_avatar){
            try {
              $filePath = Storage::disk('public')->putFile('user_avatar', $request->user_avatar, 'public');
            } catch (Exception $exception) {
                return response()->json(['error' => $exception->getMessage()], 409);
            }
            $data = (object) [];
            // $filePath = env('APP_SROTAGE_URL').$filePath;
            $filePath = explode('/', $filePath);
            
            $user_avatar = $filePath[count($filePath) - 1];
            User::where('id', $userId)->update(['user_avatar' => $user_avatar]);
        }
        $data = User::find($userId);
        $data['user_avatar'] = env('APP_SROTAGE_URL').'user_avatar/'.$data['user_avatar'];
        // $data['user_avatar'] = env('APP_SROTAGE_URL').$filePath;
        return $this->sendResponse(new ProductResource($data), 'User profile update successfully.');
    }
}
