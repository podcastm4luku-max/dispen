<?php

namespace App\Providers;

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
        \Illuminate\Support\Facades\View::composer('*', function ($view) {
            try {
                if (\Illuminate\Support\Facades\Schema::hasTable('social_media')) {
                    $socialMediaLinks = \App\Models\SocialMedia::where('is_active', true)
                        ->orderBy('order', 'asc')
                        ->get();
                    $view->with('socialMediaLinks', $socialMediaLinks);
                }
            } catch (\Throwable $e) {
                // Ignore if DB connection not ready
            }
        });
    }
}
