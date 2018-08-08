<?php
/**
 * Created by PhpStorm.
 * User: mac
 * Date: 2018/5/31
 * Time: 上午10:47
 */

namespace Tests\Test;

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

    public function testReadYml()
    {
        $data = yml_read($this->file, 'all');
        $this->assertEquals('{"local":{"mysql":{"host":"127.0.0.1","port":3307}},"dev":{"mysql":{"host":"127.0.0.1","port":3306}}}', json_encode($data, true));
    }
}