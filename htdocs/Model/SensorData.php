<?php
/**
 * Created by PhpStorm.
 * User: Leo
 * Date: 20.10.2016
 * Time: 18:01
 */

namespace Mvc\Model;


class SensorData extends ModelBase
{
    public $pkid, $id_sensor, $time, $temperature, $humidity;
    public function getSource()
    {
        return 'sensor_datas';
    }
}