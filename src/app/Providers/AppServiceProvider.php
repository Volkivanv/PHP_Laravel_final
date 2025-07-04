<?php

namespace App\Providers;

use App\Services\SmsSenderInterface;
use App\Services\SmsSenderService;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
        $this->app->bind(SmsSenderInterface::class, function(){
            return new SmsSenderService('2304820398', 'dsflasdf');
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
        VerifyCsrfToken::except([
            '/test_parameters',
            '/json_parse',
            '/store-form',
            '/user/*',
            '/list_of_books',
            '/list_of_books/*'
        ]);
    }
}
