<?php
/**
 * Created by PhpStorm.
 * User: mac
 * Date: 2018/8/8
 * Time: 下午2:53
 */

namespace Lin\Config\Support;

use Lin\Config\Common\InstanceTrait;
use Symfony\Component\Yaml\Yaml as Basic;
use Xiao\Support\Arr;

class Yaml
{
    use InstanceTrait;

    /**
     * 读取配置文件
     * @param $file
     * @param string $key
     * @return array|mixed
     */
    public function load($file, $key = 'all')
    {
        $yaml = Basic::parseFile($file);

        if ($key == 'all') {
            return $yaml;
        }

        return Arr::get($yaml, $key, '');
    }

}