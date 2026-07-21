<?php

declare(strict_types=1);

/*
 * This file is part of erdmannfreunde/contao-swiper-pro-bundle.
 *
 * (c) Erdmann & Freunde <https://erdmann-freunde.de>
 *
 * @license MIT
 */

namespace ErdmannFreunde\ContaoSwiperProBundle\Model;

use Contao\Model;

/**
 * @property string $title
 * @property string $swiperEffect
 * @property string $swiperSpeed
 * @property string $swiperLoop
 * @property string $swiperPagination
 * @property string $swiperNavigation
 * @property string $swiperAutoplay
 * @property string $swiperAutoplayDelay
 * @property string $swiperAutoplayDisableOnInteraction
 * @property string $swiperAutoplayPauseOnMouseEnter
 * @property string $config
 */
class SwiperSettingsModel extends Model
{
    protected static $strTable = 'tl_swiper_settings';
}
