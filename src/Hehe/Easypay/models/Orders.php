<?php
namespace Hehe\Easypay\Models;

/**
 * 订单记录
 * Class Orders
 * @package Hehe\Easypay\Models
 */
class Orders extends BaseModel
{
    /**
     * 通过 id 获取订单
     * @param $orderId
     * @param bool $forUpdate
     * @return \Illuminate\Database\Eloquent\Model|\Illuminate\Database\Query\Builder|object|null
     */
    public function getById($orderId, $forUpdate = false)
    {
        $builder = self::query()->where('id', '=', $orderId);
        if ($forUpdate === true) {
            $builder->lockForUpdate();
        }
        return $builder->lockForUpdate()->first();
    }

    /**
     * 是否已支付
     * @param \Illuminate\Database\Eloquent\Model|\Illuminate\Database\Query\Builder|object $o
     * @return bool
     */
    public function isPay($o)
    {
        return $o->pay_time != '0000-00-00 00:00:00';
    }
}
