<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;

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
        Validator::extend('sum_equals', function ($attribute, $value, $parameters, $validator) {
            $sum = 0;
            foreach ($parameters as $parameter) {
                $sum += (float) $validator->getData()[$parameter];
            }
            return abs($sum - (float) $value) < PHP_FLOAT_EPSILON;
        });
    }

}
