<?php

declare(strict_types=1);

/*
 * This file is part of erdmannfreunde/contao-swiper-pro-bundle.
 *
 * (c) Erdmann & Freunde <https://erdmann-freunde.de>
 *
 * @license MIT
 */

namespace ErdmannFreunde\ContaoSwiperProBundle\Controller\ContentElement;

use Contao\ContentModel;
use Contao\CoreBundle\Controller\ContentElement\AbstractContentElementController;
use Contao\CoreBundle\DependencyInjection\Attribute\AsContentElement;
use Contao\CoreBundle\Twig\FragmentTemplate;
use ErdmannFreunde\ContaoSwiperProBundle\Model\SwiperSettingsModel;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Yaml\Yaml;

#[AsContentElement(category: 'miscellaneous', type: 'swiper_pro', nestedFragments: [true])]
class SwiperProController extends AbstractContentElementController
{
    protected function getResponse(FragmentTemplate $template, ContentModel $model, Request $request, mixed $fragment = null): Response
    {
        $configArray = [];

        if ($model->swiperSettings) {
            $setting = SwiperSettingsModel::findById($model->swiperSettings);

            if (null !== $setting && $setting->config) {
                try {
                    $configArray = Yaml::parse($setting->config);
                } catch (\Exception) {
                }
            }
        }

        $template->set('settings', $configArray);

        return $template->getResponse();
    }
}
