<?php

return A::keyBy(
    A::map(
        Dir::read($dir = dirname(__DIR__, 2) . '/translations'),
        fn ($file) => A::merge(
            ['lang' => F::name($file)],
            Yaml::decode(F::read($dir . '/' . $file))
        )
    ),
    'lang'
);