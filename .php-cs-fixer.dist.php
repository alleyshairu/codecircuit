<?php

$finder = PhpCsFixer\Finder::create()
    ->in(__DIR__)
    ->exclude('bootstrap')
    ->exclude('config')
    ->exclude('storage')
    ->exclude('resources')
    ->exclude('vendor')
    ->notPath('public/index.php')
    ->notPath('server.php');

return (new PhpCsFixer\Config())
    ->setRiskyAllowed(true)
    ->setRules([
        '@Symfony' => true,
        '@Symfony:risky' => true,
        '@DoctrineAnnotation' => true,
        'php_unit_method_casing' => ['case' => 'snake_case'],
        'multiline_comment_opening_closing' => true,
        'blank_line_after_namespace' => true,
        'blank_line_after_opening_tag' => true,
        'blank_line_before_statement' => true,
        'linebreak_after_opening_tag' => true,
        'ordered_imports' => ['sort_algorithm' => 'length'],
        'mb_str_functions' => true,
        'no_php4_constructor' => true,
        'no_unreachable_default_argument_value' => true,
        'no_useless_else' => true,
        'no_useless_return' => true,
        'php_unit_strict' => true,
        'phpdoc_order' => true,
        'strict_comparison' => true,
        'strict_param' => true,
        'no_unused_imports' => true,
        'array_indentation' => true,
        'global_namespace_import' => false,
    ])
    ->setFinder($finder)
    ->setCacheFile(__DIR__ . '/storage/app/.php_cs.cache');
