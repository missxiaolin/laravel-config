<?php
/**
 * Created by PhpStorm.
 * User: mac
 * Date: 2018/8/6
 * Time: 上午11:21
 */

if (!function_exists('yml_read')) {

    /**
     * 读取yaml配置
     * @param $file
     * @param null $key
     * @return mixed
     */
    function yml_read($file, $key = null)
    {
        $yaml = \Symfony\Component\Yaml\Yaml::parseFile($file);
        if ($key == 'all') {
            return $yaml;
        }
        return $yaml;
    }
}

if (!function_exists('yml_write')) {

    /**
     * 读取yaml配置
     * @param $file
     * @param $data
     * @param null $key
     * @return bool|int
     */
    function yml_write($file, $data, $key = null)
    {
        $content = yml_read($file, 'all');
        $content[$key] = $data;
        $yaml = \Symfony\Component\Yaml\Yaml::dump($content, 4);
        if (!is_writable($file)) {
            $message = sprintf('File "%s" cannot be write.', $file);
            throw new \Symfony\Component\Yaml\Exception\ParseException($message);
        }

        return file_put_contents($file, $yaml);
    }
}