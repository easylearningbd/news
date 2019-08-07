<?php

namespace App\Providers;
use App\Setting;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Category;
use App\User;
use App\Post;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
       Schema::defaultStringLength(191);
       $settings = Setting::all();
       foreach ($settings as $key => $setting) {
           if($key === 0) $system_name = $setting->value;
           elseif($key === 1) $favicon = $setting->value;
           elseif($key === 2) $front_logo = $setting->value; 
           elseif($key === 3) $admin_logo = $setting->value;  
       }
       
       $categories = Category::where('status',1)->get();
       $authors = User::where('id','!=',1)->get();
       $most_viewed = Post::with(['creator','comments'])->where('status',1)->orderBy('view_count','DESC')->limit(5)->get();

       $most_commented = Post::withCount('comments')->where('status',1)->orderBy('comments_count','DESC')->limit(5)->get();

       $shareData = array(
        'system_name'=>$system_name,
        'favicon'=>$favicon,
        'front_logo'=>$front_logo,
        'admin_logo'=>$admin_logo,
        'categories'=>$categories,
        'authors'=>$authors,
        'most_viewed'=>$most_viewed,
        'most_commented'=>$most_commented


       );
       view()->share('shareData',$shareData);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
