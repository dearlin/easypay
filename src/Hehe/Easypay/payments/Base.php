<?php
namespace Hehe\Easypay\Payments;

use Hehe\Easypay\Models\Orders;

class Base
{
    public function test()
    {
        $o = Orders::getInstance();
        $order = $o->getById(1);
        var_dump($o->isPay($order));
    }
}