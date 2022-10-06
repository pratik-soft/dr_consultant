<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use Illuminate\Pagination\Paginator;

use Spatie\Valuestore\Valuestore;

use App\Models\Blog;
use App\Models\Category;
use App\Models\Tag;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();

        //get settings
        $pathToFile = public_path() . '/default/settings.json';
        $valuestore = Valuestore::make($pathToFile);
        $settings = $valuestore->all();
        // dd($settings);
        view()->share('settings', $settings);

        // $categories = Category::withCount('blogs')->where('type','1')->having('blogs_count', '>', 0)->where('status','1')->get();
        // // dd($categories->toArray());        
        // view()->share('categories', $categories);

        // $recent_blogs = Blog::select('title','slug','image','posted_at')->where('status','PUBLISHED')->orderBy('posted_at', 'desc')->limit(5)->get();
        // // dd($recent_blogs->toArray());
        // view()->share('recent_blogs', $recent_blogs);

        // $tags = Tag::withCount('blogs')->where('type','1')->having('blogs_count', '>', 0)->where('status','1')->get();
        // // dd($tags->toArray());
        // view()->share('tags', $tags);

        // $service_categories = Category::with('services')->withCount('services')->having('services_count', '>', 0)->where('type','3')->where('status','1')->get();
        // // dd($service_categories->toArray());        
        // view()->share('service_categories', $service_categories);
    }
}
