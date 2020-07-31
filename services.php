<?php

class Services  implements JsonSerializable
{
    public $basic_inspection;
    public $oil_change;
    public $tire_rotation;


    public function jsonSerialize()
    {
        return [
            'basic_inspection' => $this->basic_inspection,
            'oil_change' => $this->oil_change,
            'tire_rotation' => $this->tire_rotation,
        ];
    }
    public function get_price()
    {
        $service = new Services();
        $services = array();
        $service->basic_inspection = 50;
        $service->tire_rotation = 23.5;
        $service->oil_change = 85;

        $services = $service;
        return $services;
    }
}