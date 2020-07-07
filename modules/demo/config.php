<?php defined('CS__BASEPATH') OR exit('No direct script access allowed');
/**
 *
 *    CubSystem Minimal
 *      -> http://github.com/Anchovys/cubsystem/minimal
 *    copy, © 2020, Anchovy
 * /
 */

/*
    Это персональная конфигурация
    для этого модуля.

    Конфигурация задается в массиве $config

    В массиве обязательно должны быть прописаны сл. ключи
        - min_rev   - минимальная версия движка
        - enable - включить ли модуль
*/

$config =
[
    'enable' => TRUE, // если FALSE, тогда модуль не будет загружен
    'min_rev'   => 0.08  // минимальная версия системы для работы модуля
];

// описание и название. не обязательно, но желательно!
$config['name'] = 'Демо модуль Cubsystem 0.08';
$config['desc'] = 'Демо модуль для демонстрации возможностей простых модулей';