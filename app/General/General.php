<?php

namespace App\General;
/**
 * Trait General
 * @package App\General
 */

trait General
{
    /**
     * @var array
     */

    public $data = [];

    /**
     * @param $key
     * @param null $value
     * @return null
     */

    public function data($key, $value = null)
    {

        return $this->data[$key] = $value;
    }

}