<?php
/**
 * Created by PhpStorm.
 * User: mac
 * Date: 2018/8/8
 * Time: 下午2:53
 */

namespace Lin\Config\Support;

use Lin\Config\Common\InstanceTrait;
use Symfony\Component\Yaml\Exception\ParseException;
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

    /**
     * 将配置写入到文件
     * @param $file
     * @param $data
     * @param string $key
     * @return bool|int
     */
    public function save($file, $data, $key = 'local')
    {
        $content = $this->load($file);
        $content[$key] = $data;

        $yaml = Basic::dump($content, 4);

        if (!is_writable($file)) {
            $message = sprintf('File "%s" cannot be write.', $file);
            throw new ParseException($message);
        }
        file_put_contents($file, $yaml);
        return $content;
    }

}