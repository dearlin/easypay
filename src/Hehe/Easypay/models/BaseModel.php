<?php
namespace Hehe\Easypay\Models;

use Illuminate\Database\Capsule\Manager as Capsule;

/**
 * 基础 model
 * Class BaseModel
 * @package Hehe\Easypay\Models
 */
class BaseModel extends \Illuminate\Database\Eloquent\Model
{
    public static $instances = [];
    public static function getInstance()
    {
        $call = get_called_class();
        if (!isset(static::$instances[$call]) || !static::$instances instanceof static) {
            return static::$instances[$call] = new static();
        }
        return static::$instances[$call];
    }

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $capsule = new Capsule;

        $capsule->addConnection([
            'driver'    => 'mysql',
            'host'      => 'localhost',
            'database'  => 'easy_pay',
            'username'  => 'root',
            'password'  => '',
            'charset'   => 'utf8',
            'collation' => 'utf8_general_ci',
            'prefix'    => '',
        ]);

        $capsule->bootEloquent();
    }
}
