<?php

use Illuminate\Support\Facades\Auth;

use App\Models\Category;
use App\Models\Tag;
use App\Models\Blog;
  
if(!function_exists('getAvatar'))
{
    function getAvatar()
    {           
        $url = asset('default/user.jpg');
        if(Auth::user()->photo)
        {
            if(file_exists(public_path() . '/uploads/avatar/' . Auth::user()->photo))
            {
                $url = asset('uploads/avatar/' . Auth::user()->photo);
            }
        }

        return $url;        
    }
}

if(!function_exists('getThumb'))
{
    function getThumb()
    {                
        $url = asset('default/user.jpg');
        if(Auth::user()->photo)
        {
            if(file_exists(public_path() . '/uploads/avatar/thumb/' . Auth::user()->photo))
            {
                $url = asset('uploads/avatar/thumb/' . Auth::user()->photo);
            }
        }

        return $url;
    }
}

if(!function_exists('getUserThumb'))
{
    function getUserThumb($photo)
    {                
        $url = asset('default/user.jpg');
        if($photo)
        {
            if(file_exists(public_path() . '/uploads/avatar/thumb/' . $photo))
            {
                $url = asset('uploads/avatar/thumb/' . $photo);
            }
        }

        return $url;
    }
}

if(!function_exists('removePhoto'))
{
    function removePhoto($photo)
    {                
        if($photo)
        {
            if(file_exists(public_path() . "/uploads/avatar/" . $photo))
            {
                unlink(public_path() . "/uploads/avatar/" . $photo);
            }
            
            if(file_exists(public_path() . "/uploads/avatar/thumb/" . $photo))
            {
                unlink(public_path() . "/uploads/avatar/thumb/" . $photo);
            }            
        }        
    }
}

if(!function_exists('getBlogImage'))
{
    function getBlogImage($image)
    {           
        $photo = 'default.jpg';
        if($image)
        {
            if(file_exists(public_path() . '/uploads/blog/' . $image))
            {
                $photo = $image;
            }
        }

        return asset('uploads/blog/' . $photo);        
    }
}

if(!function_exists('getUserStatusHtml'))
{
    function getUserStatusHtml($status)
    {           
        $html = '';
                        
        if($status == '1'){
            $html .= '<label class="badge badge-success mr-1">Active</label>';
        } else if($status == '2'){
            $html .= '<label class="badge badge-warning mr-1">Inactive</label>';
        } else if($status == '3'){
            $html .= '<label class="badge badge-danger mr-1">Deleted</label>';
        } else if($status == '4'){
            $html .= '<label class="badge badge-dark mr-1">Blocked</label>';
        }
        
        return $html;
    }
}

if(!function_exists('getDatetimeHtml'))
{
    function getDatetimeHtml($datetime, $badge='default')
    {           
        if($datetime){
            return '<small class="badge badge-'.$badge.'" data-toggle="tooltip" data-placement="top" title="'.$datetime.'"><i class="far fa-clock"></i> '.$datetime->diffForHumans().'</small>';
        } else {
            return '';
        }
        
    }
}

if(!function_exists('generateRandomString'))
{
    function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}

if(!function_exists('getClientImage'))
{
    function getClientImage($image)
    {           
        $photo = 'default.jpg';
        if($image)
        {
            if(file_exists(public_path() . '/uploads/clients/' . $image))
            {
                $photo = $image;
            }
        }

        return asset('uploads/clients/' . $photo);        
    }
}

if(!function_exists('getTeamPhoto'))
{
    function getTeamPhoto($image)
    {           
        $url = asset('default/team.jpg');
        if($image)
        {
            if(file_exists(public_path() . '/uploads/team/' . $image))
            {
                $url = asset('uploads/team/' . $image);
            }
        }

        return $url;
    }
}

if(!function_exists('getTestimonialPhoto'))
{
    function getTestimonialPhoto($image)
    {           
        $url = asset('default/testimonial.jpg');
        if($image)
        {
            if(file_exists(public_path() . '/uploads/testimonials/' . $image))
            {
                $url = asset('uploads/testimonials/' . $image);
            }
        }

        return $url;
    }
}

if(!function_exists('getServiceImage'))
{
    function getServiceImage($image)
    {           
        $photo = 'default.jpg';
        if($image)
        {
            if(file_exists(public_path() . '/uploads/services/' . $image))
            {
                $photo = $image;
            }
        }

        return asset('uploads/services/' . $photo);        
    }
}

if(!function_exists('getPortfolioImage'))
{
    function getPortfolioImage($image)
    {           
        $photo = 'default.jpg';
        if($image)
        {
            if(file_exists(public_path() . '/uploads/portfolio/' . $image))
            {
                $photo = $image;
            }
        }

        return asset('uploads/portfolio/' . $photo);        
    }
}

if(!function_exists('getSiteLogo'))
{
    function getSiteLogo($image)
    {           
        $photo = 'default.jpg';
        if($image)
        {
            if(file_exists(public_path() . '/default/' . $image))
            {
                $photo = $image;
            }
        }

        return asset('default/' . $photo);        
    }
}

if(!function_exists('getFavicon'))
{
    function getFavicon($image)
    {           
        $photo = 'default.jpg';
        if($image)
        {
            if(file_exists(public_path() . '/default/' . $image))
            {
                $photo = $image;
            }
        }

        return asset('default/' . $photo);        
    }
}

if(!function_exists('deleteFile'))
{
    function deleteFile($fileDir)
    {                
        if($fileDir)
        {
            if(is_file($fileDir))
            {
                unlink($fileDir);
            }            
        }        
    }
}

if(!function_exists('get_service_categories'))
{
    function get_service_categories()
    {                
        $data = Category::with('services')->withCount('services')->having('services_count', '>', 0)->where('type','3')->where('status','1')->get();
        // dd($data->toArray());

        return $data;
    }
}

if(!function_exists('get_tags'))
{
    function get_tags()
    {                
        $data = Category::with('services')->withCount('services')->having('services_count', '>', 0)->where('type','3')->where('status','1')->get();
        // dd($data->toArray());
        
        return $data;
    }
}

if(!function_exists('get_recent_blogs'))
{
    function get_recent_blogs()
    {                
        $data = Blog::select('title','slug','image','posted_at')->where('status','PUBLISHED')->orderBy('posted_at', 'desc')->limit(5)->get();
        // dd($data->toArray());
        
        return $data;
    }
}

if(!function_exists('get_categories'))
{
    function get_categories()
    {               
        $data = Category::withCount('blogs')->where('type','1')->having('blogs_count', '>', 0)->where('status','1')->get();
        // dd($data->toArray());
        
        return $data;
    }
}

if(!function_exists('getUploadedFile'))
{
    function getUploadedFile($file, $dir = '', $default = '')
    {           
        $url = asset('default/' . $default);
        if($file)
        {
            if(file_exists(public_path() . '/uploads/' . $dir . '/' . $file))
            {
                $url = asset('uploads/' . $dir . '/' . $file);
            }
        }

        return $url;        
    }
}

if(!function_exists('getDummyStatusHtml'))
{
    function getDummyStatusHtml($status)
    {           
        $html = '';
                        
        if($status == '1'){
            $html .= '<label class="badge badge-success mr-1">Active</label>';
        } else if($status == '0'){
            $html .= '<label class="badge badge-warning mr-1">Inactive</label>';
        }
        
        return $html;
    }
}
