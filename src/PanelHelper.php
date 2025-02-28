<?php

namespace KirbyStarter;

use Kirby\Cms\App;
use Kirby\Toolkit\Str;

class PanelHelper
{
    static function buildMenuPage(string $icon, string $label, string $link): array
    {
        return [
            'icon' => $icon,
            'label' => $label,
            'link' => $link,
            'current' => fn() => self::isCurrentPage($link)
        ];
    }

    static function isCurrentPage(string $link): bool
    {
        $path = App::instance()->path();
        return Str::contains($path, $link);
    }
}