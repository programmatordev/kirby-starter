<?php

namespace KirbyStarter;

use Kirby\Toolkit\Str;

class PanelHelper
{
    static function buildMenuEntry(string $icon, string $label, string $link, bool $isEnabled = true): array
    {
        return [
            'icon' => $icon,
            'label' => $label,
            'link' => $link,
            'current' => self::isCurrentPage($link),
            // decide to show menu entry or not
            // for example, can be useful in cases where it should only be enabled for certain roles
            'menu' => $isEnabled
        ];
    }

    static function isCurrentPage(string $link): bool
    {
        $path = kirby()->path();
        return Str::contains($path, $link);
    }
}