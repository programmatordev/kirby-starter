<?php

use Kirby\Cms\App;

return [
    'page.update:after' => function() {
        /** @var App $this */
        $debug = $this->option('debug');

        if ($debug && $this->user()->isAdmin()) {
            // improve when command is executed
            // ideally, it should execute only when a blueprint has been changed
            shell_exec('~/.composer/vendor/bin/kirby types:create --force');
        }
    }
];