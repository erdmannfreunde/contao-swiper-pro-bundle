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

            if (null !== $setting) {
                $configArray = $this->getOptionsFromSettings($setting);

                if ($setting->config) {
                    try {
                        $yaml = Yaml::parse($setting->config);

                        if (\is_array($yaml)) {
                            // YAML config always wins over the DCA fields.
                            $configArray = array_replace_recursive($configArray, $yaml);
                        }
                    } catch (\Exception) {
                    }
                }
            }
        }

        $template->set('settings', $configArray);

        return $template->getResponse();
    }

    /**
     * Builds the base Swiper options from the individual DCA fields. A key is only
     * emitted when the field is explicitly set, so unset fields fall through to the
     * template defaults and the YAML config can still override everything.
     */
    private function getOptionsFromSettings(SwiperSettingsModel $setting): array
    {
        $options = [];

        if ($setting->swiperLoop) {
            $options['loop'] = true;
        }

        if ('' !== (string) $setting->swiperSpeed) {
            $options['speed'] = (int) $setting->swiperSpeed;
        }

        // 'slide' (and the empty legacy value) is the Swiper default, so no key needed.
        if ($setting->swiperEffect && 'slide' !== $setting->swiperEffect) {
            $options['effect'] = $setting->swiperEffect;
        }

        if ($setting->swiperAutoplay) {
            $options['autoplay'] = [
                'delay' => (int) ($setting->swiperAutoplayDelay ?: 3000),
                'disableOnInteraction' => (bool) $setting->swiperAutoplayDisableOnInteraction,
                'pauseOnMouseEnter' => (bool) $setting->swiperAutoplayPauseOnMouseEnter,
            ];
        }

        // 'bullets' (and the empty legacy value) is the template default, so no key needed.
        switch ($setting->swiperPagination) {
            case 'none':
                $options['pagination'] = false;
                break;

            case 'fraction':
            case 'progressbar':
                $options['pagination'] = ['type' => $setting->swiperPagination];
                break;
        }

        if (!$setting->swiperNavigation) {
            $options['navigation'] = false;
        }

        return $options;
    }
}
