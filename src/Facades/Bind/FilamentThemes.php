<?php

namespace Yepsua\Filament\Themes\Facades\Bind;

use Closure;
use Filament\Facades\Filament;

class FilamentThemes {

    /**
     * Register the theme using the Filament facade
     *
     * @param Closure|null $closure
     * @return void
     */
    public function register(Closure $closure = null) : void {
        Filament::serving(function () use ($closure) {
            $assetColorPath = config('filament-themes.color_public_path', 'vendor/yepsua-filament-themes/css/amber.css');
            Filament::registerStyles([asset($assetColorPath)]);
            Filament::registerTheme($this->generateAsset(config('filament-themes.theme_public_path', 'css/app.css'), $closure));
        });
    }

    /**
     * Get the asset using the asset or any other callable function
     *
     * @param string $path
     * @param Closure|null $closure
     * @return string
     */
    protected function generateAsset(string $path, Closure $closure = null) : string {
        if(!$closure) {
            if(config('filament-themes.enable_vite', false)) {
                return app(\Illuminate\Foundation\Vite::class)('resources/' . $path);
            }

            return app(\Illuminate\Foundation\Mix::class)($path);
        }

        return $closure($path);
    }
}
