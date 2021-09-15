<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\todo;
use Illuminate\Support\Facades\URL;
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
        
        // $tasks = todo::all();
        // return view("/home", ["tasks" => $tasks, "count" => 1]);
        view()->composer(
            'includes.todo',
            function ($view) {
                $view->with('tasks', todo::orderBy('id', 'desc')->get());
            }
        );
    }
}
