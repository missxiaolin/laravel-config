<?php
/**
 * Created by PhpStorm.
 * User: mac
 * Date: 2018/8/8
 * Time: 下午2:52
 */

namespace Lin\Config\Common;

trait InstanceTrait
{
    protected static $_instances = [];

    protected $instanceKey;

    public static function getInstance($key = 'default')
    {
        if (!isset($key)) {
            $key = 'default';
        }

        if (isset(static::$_instances[$key]) && static::$_instances[$key] instanceof static) {
            return static::$_instances[$key];
        }

        $client = new static();
        $client->instanceKey = $key;
        return static::$_instances[$key] = $client;
    }

    /**
     * @desc   回收单例对象
     * @author limx
     */
    public function flushInstance()
    {
        unset(static::$_instances[$this->instanceKey]);
    }
}
