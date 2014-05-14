<?php

namespace App\AdminBundle\Business\Product;


class Constants
{
    const PAYMENT_TYPE_FREE      = 1;
    const PAYMENT_TYPE_ONE_TIME  = 2;
    const PAYMENT_TYPE_RECURRING = 3;

    public static function getPaymentTypes()
    {
        return array(
            self::PAYMENT_TYPE_FREE      => 'Free',
            self::PAYMENT_TYPE_ONE_TIME  => 'One-Time',
            self::PAYMENT_TYPE_RECURRING => 'Recurring',
        );
    }

    public static function getProductTypes()
    {
        return array();
    }
}