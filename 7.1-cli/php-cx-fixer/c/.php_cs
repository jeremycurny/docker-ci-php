<?php
$finder = PhpCsFixer\Finder::create()
  ->in(__DIR__)
  ->exclude([
    '.git',
    'node_modules',
    'vendor',
  ])
;

return PhpCsFixer\Config::create()
  ->setFinder($finder)
  ->setRules([
    '@PSR1' => true,
    '@PSR2' => true,
    '@PhpCsFixer' => true,
    '@PHP70Migration' => true,
    '@PHP71Migration' => true,

    // Risky rules
    'dir_constant' => true,
    'native_constant_invocation' => true,
    'native_function_invocation' => true,
    'psr4' => true,

    // Rules
    'general_phpdoc_annotation_remove' => [
      'annotations' => ['author', 'copyright', 'license', 'package']
    ],
    'no_blank_lines_before_namespace' => true,
    'php_unit_test_class_requires_covers' => false,
    'phpdoc_add_missing_param_annotation' => [
      'only_untyped' => false
    ],
    'single_blank_line_before_namespace' => false
  ])
;
