<?php
require_once ('./basic_inspection.php');

Class TireRotation extends BasicInspection {
    public $tire_rotation;

    function __construct(BasicInspection $basic_inspection){
        $this->tire_rotation = $basic_inspection;
    }

    function get_price(){
        return $this->tire_rotation->get_price() + 23.5;
    }

}