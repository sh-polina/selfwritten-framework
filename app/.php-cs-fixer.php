<?php

use PhpCsFixer\Config;
use PhpCsFixer\Finder;

$finder = Finder::create()
    ->in(__DIR__ . '/src')
    ->name('*.php')
    ->ignoreDotFiles(true)
    ->ignoreVCS(true);

return (new Config())
    ->setRules([
        '@PSR1' => true,
        '@PSR12' => true,
        '@Symfony' => true,
        'array_syntax' => ['syntax' => 'short'], // ➤ Использовать []
        'binary_operator_spaces' => ['default' => 'single_space'], // ➤ Пробелы вокруг операторов
        'blank_line_before_statement' => ['statements' => ['return', 'throw', 'if', 'foreach']], // ➤ Пустая строка перед логикой
        'ordered_imports' => ['sort_algorithm' => 'alpha'], // ➤ Сортировка use-подключений
        'single_quote' => true, // ➤ Одинарные кавычки, если не используется интерполяция
        'no_unused_imports' => true, // ➤ Удаляет неиспользуемые use
        'trailing_comma_in_multiline' => ['elements' => ['arrays']], // ➤ Запятая в конце массива
    ])
    ->setFinder($finder);