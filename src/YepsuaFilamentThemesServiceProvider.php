<?php

namespace Yepsua\Filament\Themes;

use Filament\Facades\Filament;
use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;
use Yepsua\Filament\Themes\Facades\Bind\FilamentThemes as BindFilamentThemes;
use Yepsua\Filament\Themes\Facades\FilamentThemes;

class YepsuaFilamentThemesServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = true;

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        $assetsPath = 'vendor/yepsua-filament-themes';
        $configPath = __DIR__ . '/../config/filament-themes.php';

        $this->publishes([
            __DIR__ . '/../resources' => public_path($assetsPath),
        ], 'yepsua-filament-themes-assets');

        $this->publishes([
            $configPath => config_path('filament-themes.php'),
        ], 'yepsua-filament-themes-config');

        if(! config('filament-themes.auto_register', false)) {
            return;
        }

        FilamentThemes::register();
    }

    /**
     * @return void
     */
    public function register() {
        App::bind(FilamentThemes::class,function() {
            return new BindFilamentThemes();
        });
    }
}
