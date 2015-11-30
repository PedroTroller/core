<?php

$finder = Symfony\CS\Finder\DefaultFinder::create()
    ->in('src/')
;

return Symfony\CS\Config\Config::create()
    ->setUsingCache(true)
    ->level(Symfony\CS\FixerInterface::SYMFONY_LEVEL)
    ->fixers([
        'align_double_arrow',
        'align_equals',
        'concat_with_spaces',
        'header_comment',
        'logical_not_operators_with_spaces',
        'long_array_syntax',
        'multiline_spaces_before_semicolon',
        'newline_after_open_tag',
        'ordered_use',
        'phpdoc_order',
        'phpdoc_var_to_type',
        'single_array_no_trailing_comma',
    ])
    ->finder($finder)
;
