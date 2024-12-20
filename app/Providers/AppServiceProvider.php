<?php

namespace App\Providers;

use App\Models\Comment;
use Illuminate\Support\Facades\View;
use Request;
use App\Models\User;
use App\Models\Thread;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //

        Gate::define('threadEditDelete',function(User $user,Thread $ob){
            return $ob->user_id == $user->id;
        });

        Gate::define('commentEditDelete',function(User $user,Comment $ob){
            return $ob->user_id == $user->id;
        });
        Gate::define('commentLike',function(User $user,Comment $ob){
            return $ob->user_id != $user->id;
        });


        // limit function

        View::share('word_limit',function(string $s1,int $size){
            $arr = explode(" ",$s1);
            $final = array_slice($arr,0,$size);
            return implode(" ",$final);
          
        });




    }
}
