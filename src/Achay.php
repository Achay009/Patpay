<?php

namespace Achay\Patpay;

/**
 * Class Parent Object
 *
 */
class Achay
{
    /**
     * Returns the object as array
     *
     * @return mixed
     */
    public function toArray()
    {
        return get_object_vars($this);
    }
}