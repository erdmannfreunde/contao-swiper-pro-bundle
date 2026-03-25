<?php

declare(strict_types=1);

/*
 * This file is part of erdmannfreunde/contao-swiper-pro-bundle.
 *
 * (c) Erdmann & Freunde <https://erdmann-freunde.de>
 *
 * @license MIT
 */

use ErdmannFreunde\ContaoSwiperProBundle\Model\SwiperSettingsModel;

$GLOBALS['BE_MOD']['design']['swiper_settings'] = [
    'tables' => ['tl_swiper_settings'],
];

$GLOBALS['TL_MODELS']['tl_swiper_settings'] = SwiperSettingsModel::class;
