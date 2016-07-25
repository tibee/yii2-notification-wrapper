<?php

namespace lo\modules\noty\layers;

use yii\helpers\Json;
use lo\modules\noty\assets\JqNotifyBarAsset;

/**
 * Class JqNotifyBar
 * @package lo\modules\noty\layers
 *
 * This widget should be used in your main layout file as follows:
 * ```php
 *  use lo\modules\noty\Wrapper;
 *
 *  echo Wrapper::widget([
 *      'layerClass' => 'lo\modules\noty\layers\JqNotifyBar',
 *      'options' => [
 *          'position' => 'top',
 *          'delay' => 3000,
 *          'animationSpeed' => 'normal',
 *
 *          // and more for this library...
 *      ],
 *  ]);
 * ```
 */
class JqNotifyBar extends Layer implements LayerInterface
{
    /**
     * @var array $defaultOptions
     */
    protected $defaultOptions = [
        'position' => 'top',
        'delay' => 3000,
        'animationSpeed' => 'normal',
    ];

    /**
     * register asset
     */
    public function run()
    {
        $view = $this->getView();
        JqNotifyBarAsset::register($view);
        parent::run();
    }

    /**
     * @param $options
     * @return string
     */
    public function getNotification($options)
    {
        $options['html'] = $this->message;
        $options['cssClass'] = $this->type;
        $options = Json::encode($options);

        return "jQuery.notifyBar($options);";
    }
}
