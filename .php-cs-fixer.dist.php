<?php

$finder = PhpCsFixer\Finder::create()
    ->notPath(
        'ProjectBranchesResource.php'
    )
    ->in([
        __DIR__ . '/entry/app/Http',
        __DIR__ . '/entry/app/Models',
        __DIR__ . '/Auth',
        __DIR__ . '/User',
        __DIR__ . '/UseCases',
    ]);
$config = new PhpCsFixer\Config();

return $config->setRules([
    '@PSR12' => true,
    '@PSR1' => true,
    'array_syntax' => ['syntax' => 'short'],
    'escape_implicit_backslashes' => ['single_quoted' => true],
    'standardize_not_equals' => true,
    'doctrine_annotation_braces' => ['syntax' => 'with_braces'],
    'trailing_comma_in_multiline' => ['after_heredoc' => true],
    'phpdoc_scalar' => true,
    'blank_line_after_opening_tag' => true,
    'single_blank_line_before_namespace' => true,
    'no_trailing_whitespace_in_comment' => true,
    'declare_strict_types' => true,
])
    ->setUsingCache(true)
    ->setFinder($finder);
