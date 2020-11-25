<?php

declare(strict_types=1);
/**
 * This file is part of Smsease.
 *
 * @link     https://github.com/huangdijia/hyperf-config-any
 * @document https://github.com/huangdijia/hyperf-config-any/blob/main/README.md
 * @contact  huangdijia@gmail.com
 * @license  https://github.com/huangdijia/hyperf-config-any/blob/main/LICENSE
 */
namespace Huangdijia\ConfigArray;

use Huangdijia\ConfigArray\Listener\BootProcessListener;
use Huangdijia\ConfigArray\Listener\OnPipeMessageListener;
use Huangdijia\ConfigArray\Process\ConfigFetcherProcess;

class ConfigProvider
{
    public function __invoke(): array
    {
        defined('BASE_PATH') or define('BASE_PATH', __DIR__ . '/../../../');

        return [
            'dependencies' => [
            ],
            'processes' => [
                ConfigFetcherProcess::class,
            ],
            'listeners' => [
                BootProcessListener::class,
                OnPipeMessageListener::class,
            ],
            'annotations' => [
                'scan' => [
                    'paths' => [
                        __DIR__,
                    ],
                ],
            ],
            'publish' => [
                [
                    'id'          => 'config',
                    'description' => 'The config for config_any.',
                    'source'      => __DIR__ . '/../publish/config_any.php',
                    'destination' => BASE_PATH . '/config/autoload/config_any.php',
                ],
            ],
        ];
    }
}
