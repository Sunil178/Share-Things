<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Http\RedirectResponse;

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
     * Boot the services for the application.
     *
     * @return void
     */
    public function boot()
    {
        if (! isset($this->app['blade.compiler'])) {
            $this->app['view'];
        }
        $this->registerResponseExtensions();
    }

    public function registerResponseExtensions() {
        RedirectResponse::macro('withMessage', function ($name, $message) {
            session()->flash($name, $message);
            return $this;
        });
        RedirectResponse::macro('withSuccessMessage', function ($message) {
            session()->flash('success', $message);
            return $this;
        });
        RedirectResponse::macro('withErrorMessage', function ($message) {
            session()->flash('errors', $message);
            return $this;
        });
    }
}
