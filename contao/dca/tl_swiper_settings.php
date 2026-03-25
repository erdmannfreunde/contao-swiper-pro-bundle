<?php

declare(strict_types=1);

/*
 * This file is part of erdmannfreunde/contao-swiper-pro-bundle.
 *
 * (c) Erdmann & Freunde <https://erdmann-freunde.de>
 *
 * @license MIT
 */

use Contao\DC_Table;

$GLOBALS['TL_DCA']['tl_swiper_settings'] = [
    'config' => [
        'dataContainer' => DC_Table::class,
        'sql' => [
            'keys' => [
                'id' => 'primary',
            ],
        ],
    ],
    'list' => [
        'sorting' => [
            'mode' => 1,
            'flag' => 1,
            'fields' => ['title'],
        ],
        'label' => [
            'fields' => ['title'],
            'format' => '%s',
        ],
        'operations' => [
            'edit' => [
                'href' => 'act=edit',
                'icon' => 'edit.svg',
            ],
            'delete' => [
                'href' => 'act=delete',
                'icon' => 'delete.svg',
                'attributes' => 'onclick="if(!confirm(\''.($GLOBALS['TL_LANG']['MSC']['deleteConfirm'] ?? 'DELETE?').'\'))return false"',
            ],
        ],
    ],
    'palettes' => [
        'default' => '{title_legend},title;{config_legend},config',
    ],
    'fields' => [
        'id' => [
            'sql' => 'int(10) unsigned NOT NULL auto_increment',
        ],
        'tstamp' => [
            'sql' => 'int(10) unsigned NOT NULL default 0',
        ],
        'title' => [
            'inputType' => 'text',
            'eval' => ['mandatory' => true, 'maxlength' => 255, 'tl_class' => 'w50'],
            'sql' => "varchar(255) NOT NULL default ''",
        ],
        'config' => [
            'inputType' => 'textarea',
            'eval' => ['rte' => 'ace|yaml', 'decodeEntities' => true, 'class' => 'monospace', 'tl_class' => 'clr'],
            'sql' => 'text NULL',
        ],
    ],
];
