<?php

namespace Gate\Storage;

/**
 * @class StorageInf
 * @author ShiO
 */

interface StorageInf
{
    /**
     * @param $key
     * @param null $value
     * @return mixed
     */
    public function set($key, $value = null);

    /**
     * @param $key
     * @return mixed
     */
    public function get($key);

    /**
     * @return mixed
     */
    public function clean();
}