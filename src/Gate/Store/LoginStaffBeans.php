<?php

namespace App\Http\Process\Gate\Store;

use App\Http\Process\SystemStorage\Session;
use App\Http\Process\SystemStorage\StorageInf;


/**
 * @class LoginBeansService
 * @author ShiO
 */
class LoginStaffBeans implements LoginBeanInf
{
    private static $instance;
    private $prefix = 'manage::login';
    private static $drive;

    /**
     * @author ShiO
     * @param $drive
     * @return LoginStaffBeans
     */
    public static function getInstance(StorageInf $drive = null)
    {
        if ($drive == null) {
            self::$drive = Session::getInstance();
        } else {
            self::$drive = $drive;
        }
        if (self::$instance == null) {
            $instance = new self();
            self::$instance = $instance;
        }
        return self::$instance;
    }

    /**
     * @author ShiO
     * @param $key
     * @param $value
     * @return mixed|void
     * @throws \Exception
     */
    public function saveLoginData($key = null, $value)
    {
        $storage = self::$drive;
        $storage->setPrefix($this->prefix);
        if ($key == null) {
            if (is_array($value)) {
                foreach ($value as $k => $v) {
                    $storage->set($k, $v);
                }
            } else {
                throw new \Exception('请传递数组为参数');
            }
        } else {
            $storage->set($key, $value);
        }
    }

    /**
     * @author ShiO
     * @param null $key
     * @return mixed
     */
    public function getLoginData($key = null)
    {
        $storage = self::$drive;
        $storage->setPrefix($this->prefix);
        return $storage->get($key);
    }

    /**
     * @author ShiO
     * @param string $key
     * @return
     */
    public function getLoginStaffId($key = 'staff_id')
    {
        $storage = self::$drive;
        $storage->setPrefix($this->prefix);
        return $storage->get($key);
    }

    /**
     * @author ShiO
     * @param $key
     * @param $value
     * @internal param $data
     * @return mixed|void
     */
    public function appendLoginData($key, $value)
    {
        $storage = self::$drive;
        $storage->setPrefix($this->prefix);
        $storage->set($key, $value);
    }

    /**
     * @author ShiO
     */
    public function cleanLoginData()
    {
        $storage = self::$drive;
        $storage->setPrefix($this->prefix);
        $storage->clean();
    }

    /**
     * @author ShiO
     */
    public function getDriveAllData()
    {
        $storage = self::$drive;
        return $storage->all();
    }
}
