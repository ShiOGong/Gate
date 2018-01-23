<?php
/**
 * Created by PhpStorm.
 * User: gonghaichao
 * Date: 2017/11/17
 * Time: 上午10:16
 */

namespace Gate\Storage;


interface LoginStorageInf
{
    /**
     * @param StorageInf|null $drive
     * @return mixed
     */
    public static function getInstance(StorageInf $drive = null);
    /**
     * @param null $key
     * @param $value
     * @return mixed
     */
    public function saveLoginData($key = null, $value);

    /**
     * @param null $key
     * @return mixed
     */
    public function getLoginData($key = null);

    /**
     * @param $key
     * @param $value
     * @return mixed
     */
    public function appendLoginData($key, $value);

    /**
     * @return mixed
     */
    public function cleanLoginData();

    /**
     * @return mixed
     */
    public function getDriveAllData();

}