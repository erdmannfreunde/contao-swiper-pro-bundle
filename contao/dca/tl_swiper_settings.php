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
        '__selector__' => ['swiperAutoplay'],
        'default' => '{title_legend},title;{options_legend},swiperEffect,swiperSpeed,swiperPagination,swiperLoop,swiperNavigation;{autoplay_legend},swiperAutoplay;{config_legend},config',
    ],
    'subpalettes' => [
        'swiperAutoplay' => 'swiperAutoplayDelay,swiperAutoplayDisableOnInteraction,swiperAutoplayPauseOnMouseEnter',
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
        'swiperEffect' => [
            'inputType' => 'select',
            'options' => ['slide', 'fade', 'cube', 'coverflow', 'flip', 'cards', 'creative'],
            'reference' => &$GLOBALS['TL_LANG']['tl_swiper_settings']['swiperEffectOptions'],
            'eval' => ['tl_class' => 'w50'],
            'sql' => "varchar(32) NOT NULL default 'slide'",
        ],
        'swiperSpeed' => [
            'inputType' => 'text',
            'eval' => ['rgxp' => 'natural', 'placeholder' => '300', 'tl_class' => 'w50'],
            'sql' => "varchar(8) NOT NULL default ''",
        ],
        'swiperPagination' => [
            'inputType' => 'select',
            'options' => ['bullets', 'fraction', 'progressbar', 'none'],
            'reference' => &$GLOBALS['TL_LANG']['tl_swiper_settings']['swiperPaginationOptions'],
            'eval' => ['tl_class' => 'w50'],
            'sql' => "varchar(16) NOT NULL default 'bullets'",
        ],
        'swiperLoop' => [
            'inputType' => 'checkbox',
            'eval' => ['tl_class' => 'w50 m12'],
            'sql' => "char(1) NOT NULL default ''",
        ],
        'swiperNavigation' => [
            'inputType' => 'checkbox',
            'eval' => ['tl_class' => 'w50 m12'],
            'sql' => "char(1) NOT NULL default ''",
        ],
        'swiperAutoplay' => [
            'inputType' => 'checkbox',
            'eval' => ['submitOnChange' => true, 'tl_class' => 'clr'],
            'sql' => "char(1) NOT NULL default ''",
        ],
        'swiperAutoplayDelay' => [
            'inputType' => 'text',
            'eval' => ['rgxp' => 'natural', 'placeholder' => '3000', 'tl_class' => 'w50'],
            'sql' => "varchar(8) NOT NULL default ''",
        ],
        'swiperAutoplayDisableOnInteraction' => [
            'inputType' => 'checkbox',
            'eval' => ['tl_class' => 'w50 m12'],
            'sql' => "char(1) NOT NULL default ''",
        ],
        'swiperAutoplayPauseOnMouseEnter' => [
            'inputType' => 'checkbox',
            'eval' => ['tl_class' => 'w50 m12'],
            'sql' => "char(1) NOT NULL default ''",
        ],
        'config' => [
            'inputType' => 'textarea',
            'eval' => ['rte' => 'ace|yaml', 'decodeEntities' => true, 'class' => 'monospace', 'tl_class' => 'clr'],
            'sql' => 'text NULL',
        ],
    ],
];
