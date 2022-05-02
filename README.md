# Theme manager for filament

Configurable theme manager for [filament](https://filamentphp.com/).

## Features

- Change the filament theme color from the config file.

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

- Install the assets from the plugin:

```bash
php artisan vendor:publish --tag="yepsua-filament-themes-assets"
```

- Configure the tailwind resource using [css variables](https://tailwindcss.com/docs/customizing-colors#using-css-variables): 

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

- Execute Laravel mix

```bash
npm run dev
```

- Change the color in the config file (`config/filament-themes.php`):

```php
[    
    ...
    'color_public_path' => 'vendor/yepsua-filament-themes/css/red.css',
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

__

Now, you should see the app using the color defined from your config file. You can change the color without recompile the resources, just updating the config file.

---

`Notice:` The theme manager use the [asset](https://laravel.com/docs/helpers) function by default to get the path to the
colors `.css` files. If you need to use another function, for example `mix`, `global_asset` ([laravelteanancy](https://tenancyforlaravel.com/)) or any other function, you can doit by the next way:

1) Disable the auto_register in the config file `filament-themes.php`: 

2) Register the theme inside your AppServiceProvider

```php
    use Yepsua\Filament\Themes\Facades\FilamentThemes;

    public function boot()
    {
        ...
        FilamentThemes::register(function($path) {
            // Use here the function you need to replace
            return global_asset($path);
        });
        ...
    }
```

## Notice:

Finally, as you can see, you don't need a package to got this functionality, You just need to configure tailwind using css variables and add a new styles defining the primary color variables, however just installing this plugin is pretty easy to manage the themes colors from a config file.
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

