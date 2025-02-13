<?php
/**
 * @link https://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license https://www.yiiframework.com/license/
 */

declare(strict_types=1);

namespace yii\bootstrap5;

use yii\web\AssetBundle;

/**
 * Twitter Bootstrap 5 CSS bundle.
 */
class BootstrapAsset extends AssetBundle
{
    /**
     * @inheritDoc
     */
    public $sourcePath = '@npm/bootstrap';

    /**
     * @inheritDoc
     */
    public $css = [
        'dist/css/bootstrap.css'
    ];
}
