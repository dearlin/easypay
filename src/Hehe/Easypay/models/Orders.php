<?php
namespace Hehe\Easypay\Models;

/**
 * 订单记录
 * Class Orders
 * @package Hehe\Easypay\Models
 */
class Orders extends \Illuminate\Database\Eloquent\Model
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
}
