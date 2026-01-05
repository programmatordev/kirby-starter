<?php

namespace App;

use Kirby\Toolkit\Str;

/**
 * Helper class for Kirby Panel-related functionality
 */
class PanelHelper
{
    /**
     * Builds a menu entry for the Kirby panel
     *
     * @param string $icon The icon name to use
     * @param string $label Display text for the menu item
     * @param string $link URL the menu item points to
     * @param bool $menu Whether this item should be included in the menu
     * @return array The constructed menu entry
     */
    public static function buildMenuEntry(string $icon, string $label, string $link, bool $menu = true): array
    {
        return [
            'icon' => $icon,
            'label' => $label,
            'link' => $link,
            'current' => self::isCurrentPage($link),
            'menu' => $menu
        ];
    }

    /**
     * Checks if the provided link matches the current page path
     *
     * @param string $link The link to check against the current path
     * @return bool True if the current page matches the link
     */
    public static function isCurrentPage(string $link): bool
    {
        $path = kirby()->path();
        return Str::contains($path, $link);
    }
}