# Theme manager for filament

Configurable theme manager for [filament](https://filamentphp.com/).

We recommend reading the official documentation about how to create themes on the [Filament web site](https://filamentphp.com/docs/2.x/admin/appearance#building-themes)

## Features

- Change the filament theme color from the config file.
- Supports Mix and Vite bundlers

---
## Installation

You can install the package via composer:

```bash
composer require yepsua/filament-themes
```
You can publish the config file with:

```bash
php artisan vendor:publish --tag="yepsua-filament-themes-config"
```

---
## Usage

`Notice:` The next steps assume the .css file is located in the folder '/resources/css/app.css' but you can change the name and location of this file, just take into account if you copy and paste some code on this guide. 

- Install the assets from the plugin:

```bash
php artisan vendor:publish --tag="yepsua-filament-themes-assets"
```

- Configure the tailwind resource using [css variables](https://tailwindcss.com/docs/customizing-colors#using-css-variables): 

tailwind.config.js:
```js
const colors = require('tailwindcss/colors')
const defaultTheme = require('tailwindcss/defaultTheme')

function withOpacityValue(variable) {
    return ({ opacityValue }) => {
        if (opacityValue === undefined) {
            return `rgb(var(${variable}))`
        }
        return `rgb(var(${variable}) / ${opacityValue})`
    }
}

module.exports = {
    content: [
        './resources/**/*.blade.php',
        './vendor/filament/**/*.blade.php',
    ],
    darkMode: 'class',
    theme: {
        extend: {
            colors: {
                primary: {
                    '50':  withOpacityValue('--color-primary-50'),
                    '100': withOpacityValue('--color-primary-100'),
                    '200': withOpacityValue('--color-primary-200'),
                    '300': withOpacityValue('--color-primary-300'),
                    '400': withOpacityValue('--color-primary-400'),
                    '500': withOpacityValue('--color-primary-500'),
                    '600': withOpacityValue('--color-primary-600'),
                    '700': withOpacityValue('--color-primary-700'),
                    '800': withOpacityValue('--color-primary-800'),
                    '900': withOpacityValue('--color-primary-900')
                },
                danger: colors.red,
                success: colors.green,
                warning: colors.amber,
            },
            fontFamily: {
                sans: ['DM Sans', ...defaultTheme.fontFamily.sans],
            },
        },
    },
    plugins: [
        require('@tailwindcss/forms'),
        require('@tailwindcss/typography'),
    ],
}
```

- Make sure you have in your `resources/css/app.css` the next content: 

resources/css/app.css:
```css
@import './../../vendor/filament/filament/resources/css/app.css';
``` 

### Steps for Laravel Mix

- Configure the postCss in the webpack.mix.js to use tailwindcss and autoprefixer

webpack.mix.js:
```js
...
mix.js('resources/js/app.js', 'public/js')
.postCss('resources/css/app.css', 'public/css', [
    require('tailwindcss'),
    require('autoprefixer'),
]);
...

```
### Steps for Laravel Vite

- If you are using vite instead of mix, you must set 'enable_vite' to true. The 'theme_public_path' will be rendered using vite() instead of mix()

config/filament-themes.php
```php
[
    ...
    'enable_vite' => true,
    ...
]
```

- Configure the postCss in the postcss.config.js to use tailwindcss and autoprefixer

postcss.config.js:
```js
module.exports = {
    plugins: {
        tailwindcss: {},
        autoprefixer: {},
    },
};
```

- Configure the vite.config.js

vite.config.js
```js
import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js'
            ],
            refresh: true,
        }),
    ],
});
```
### Last steps 

- Update the config file to change the theme color:

config/filament-themes.php:
```php
[    
    ...
    'color_public_path' => 'vendor/yepsua-filament-themes/css/red.css',
    ...
]
```
Available colors (based on the [tailwind color pallet](https://tailwindcss.com/docs/customizing-colors)): 

* slate: slate.css
* gray: gray.css
* zinc: zinc.css
* neutral neutral.css
* stone: stone.css
* red: red.css
* orange: orange.css
* amber: amber.css
* yellow: yellow.css
* lime: lime.css
* green: green.css
* emerald: emerald.css
* teal: teal.css
* cyan: cyan.css
* sky: sky.css
* blue: blue.css
* indigo: indigo.css
* violet: violet.css
* purple: purple.css
* fuchsia: fuchsia.css
* pink: pink.css
* rose: rose.css

- Compile the assets

```bash
npm run dev
```
__

Now, you should see the app using the color defined in your config file. You can change the color without recompiling the resources, just updating the config file.

---

`Notice:` The theme manager uses the [Mix](https://laravel.com/docs/mix) or [Vite](https://laravel.com/docs/vite) to import the css resources. If you need to change the default behavior, you can do it by the next way:

1) Disable the auto_register in the config file `filament-themes.php`: 

2) Register the theme inside your AppServiceProvider

```php
    use Yepsua\Filament\Themes\Facades\FilamentThemes;

    public function boot()
    {
        ...
        FilamentThemes::register(function($path) {
            // Using Vite:
            return app(\Illuminate\Foundation\Vite::class)('resources/' . $path);
            // Using Mix:
            return app(\Illuminate\Foundation\Mix::class)($path);
            // Using asset()
            return asset($path);
        });
        ...
    }
```

## Notice:

Finally, as you can see, you don't need a package to get this functionality, You just need to configure tailwind using css variables and add new styles defining the primary color variables, however just installing this plugin is pretty easy to manage the themes colors from a config file.
## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](https://github.com/spatie/.github/blob/main/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Omar Yepez](https://github.com/oyepez003)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

