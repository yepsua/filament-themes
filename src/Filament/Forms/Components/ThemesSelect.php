<?php

namespace Yepsua\Filament\Themes\Filament\Forms\Components;

use Filament\Forms\Components\Select;

class ThemesSelect extends Select
{
    public const COLOR_SLATE ='vendor/yepsua-filament-themes/css/slate.css';
    public const COLOR_GRAY ='vendor/yepsua-filament-themes/css/gray.css';
    public const COLOR_ZINC ='vendor/yepsua-filament-themes/css/zinc.css';
    public const COLOR_NEUTRAL ='vendor/yepsua-filament-themes/css/neutral.css';
    public const COLOR_STONE ='vendor/yepsua-filament-themes/css/stone.css';
    public const COLOR_RED ='vendor/yepsua-filament-themes/css/red.css';
    public const COLOR_ORANGE ='vendor/yepsua-filament-themes/css/orange.css';
    public const COLOR_AMBER ='vendor/yepsua-filament-themes/css/amber.css';
    public const COLOR_YELLOW ='vendor/yepsua-filament-themes/css/yellow.css';
    public const COLOR_LIME ='vendor/yepsua-filament-themes/css/lime.css';
    public const COLOR_GREEN ='vendor/yepsua-filament-themes/css/green.css';
    public const COLOR_EMERALD ='vendor/yepsua-filament-themes/css/emerald.css';
    public const COLOR_TEAL ='vendor/yepsua-filament-themes/css/teal.css';
    public const COLOR_CYAN ='vendor/yepsua-filament-themes/css/cyan.css';
    public const COLOR_SKY ='vendor/yepsua-filament-themes/css/sky.css';
    public const COLOR_BLUE ='vendor/yepsua-filament-themes/css/blue.css';
    public const COLOR_INDIGO ='vendor/yepsua-filament-themes/css/indigo.css';
    public const COLOR_VIOLET ='vendor/yepsua-filament-themes/css/violet.css';
    public const COLOR_PURPLE ='vendor/yepsua-filament-themes/css/purple.css';
    public const COLOR_FUCHSIA ='vendor/yepsua-filament-themes/css/fuchsia.css';
    public const COLOR_PINK ='vendor/yepsua-filament-themes/css/pink.css';
    public const COLOR_ROSE ='vendor/yepsua-filament-themes/css/rose.css';

    /**
     * Returns th default color
     *
     * @return string
     */
    public static function GET_DEFAULT_COLOR (): string {
        return static::COLOR_YELLOW;
    }

    /**
     * { @inheritDoc }
     *
     * @param string $name
     * @return static
     */
    public static function make(string $name): static
    {

        return parent::make($name)->options(static::getAvailableOptions())->default(static::GET_DEFAULT_COLOR());
    }

    /**
     * Returns the available option for the them selector.
     *
     * @return array
     */
    protected static function getAvailableOptions(): array {

        return [
            static::COLOR_SLATE => 'Slate Theme',
            static::COLOR_GRAY => 'Gray Theme',
            static::COLOR_ZINC => 'Zinc Theme',
            static::COLOR_NEUTRAL => 'Neutral Theme',
            static::COLOR_STONE => 'Stone Theme',
            static::COLOR_RED => 'Red Theme',
            static::COLOR_ORANGE => 'Orange Theme',
            static::COLOR_AMBER => 'Amber Theme',
            static::COLOR_YELLOW => 'Yellow Theme',
            static::COLOR_LIME => 'Lime Theme',
            static::COLOR_GREEN => 'Green Theme',
            static::COLOR_EMERALD => 'Emerald Theme',
            static::COLOR_TEAL => 'Teal Theme',
            static::COLOR_CYAN => 'Cyan Theme',
            static::COLOR_SKY => 'Sky Theme',
            static::COLOR_BLUE => 'Blue Theme',
            static::COLOR_INDIGO => 'Indigo Theme',
            static::COLOR_VIOLET => 'Violet Theme',
            static::COLOR_PURPLE => 'Purple Theme',
            static::COLOR_FUCHSIA => 'Fuchsia Theme',
            static::COLOR_PINK => 'Pink Theme',
            static::COLOR_ROSE => 'Rose Theme'
        ];
    }
}



