<?php
/**
 * Created by PhpStorm.
 * User: mac
 * Date: 2018/5/31
 * Time: 上午10:47
 */

namespace Tests\Test;

use Lin\Config\Support\Yaml;
use Tests\TestCase;

class BaseTest extends TestCase
{
    public $file;

    public function __construct(string $name = null, array $data = [], string $dataName = '')
    {
        $this->file = TESTS_PATH . '/config.yml';
        parent::__construct($name, $data, $dataName);
    }

    public function testTable()
    {
        $this->assertTrue(true);
    }

    public function testWriteYml()
    {
        $file = $this->file;
        $data['mysql']['host'] = '127.0.0.1';
        $data['mysql']['port'] = 3306;
        $data = Yaml::getInstance()->save($file, $data);
        $this->assertEquals('{"local":{"mysql":{"host":"127.0.0.1","port":3306}},"dev":{"mysql":{"host":"127.0.0.1","port":3306}}}', json_encode($data, true));
    }

    public function testReadYml()
    {
        $data = Yaml::getInstance()->load($this->file);
//        dd(Yaml::getInstance()->load($this->file,'local'));
        $this->assertEquals('{"local":{"mysql":{"host":"127.0.0.1","port":3306}},"dev":{"mysql":{"host":"127.0.0.1","port":3306}}}', json_encode($data, true));
    }

    public function testCopyYml()
    {
        $file = TESTS_PATH . '/config1.yml';
        $data = Yaml::getInstance()->copy($file, 'dev', 'prd');
        $this->assertEquals('{"local":{"mysql":{"host":"127.0.0.1","port":3306}},"dev":{"mysql":{"host":"127.0.0.1","port":3306}},"prd":{"mysql":{"host":"127.0.0.1","port":3306}}}', json_encode($data, true));
    }
}