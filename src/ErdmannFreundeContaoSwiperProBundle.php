<?php

declare(strict_types=1);

/*
 * This file is part of erdmannfreunde/contao-swiper-pro-bundle.
 *
 * (c) Erdmann & Freunde <https://erdmann-freunde.de>
 *
 * @license MIT
 */

namespace ErdmannFreunde\ContaoSwiperProBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

final class ErdmannFreundeContaoSwiperProBundle extends Bundle
{
    public function getPath(): string
    {
        return \dirname(__DIR__);
    }
}
