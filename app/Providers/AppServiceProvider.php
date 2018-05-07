<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

use App\Billing\Stripe;

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

        // View Composer laracasts ep021
         view()->composer('posts.index',function($view){
             $view->with('archives',\App\Post::archives());
             $view->with('tags',\App\Tag::has('posts')->pluck('name'));

         });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //

        \App::Singleton(Stripe::class,function(){
            return new Stripe(config('services.stripe.secret'));
        });
    }
}
