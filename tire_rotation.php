<?php
require_once ('./basic_inspection.php');

Class TireRotation extends BasicInspection {
    public $tire_rotation;

    function get_price(){
        $basic_inspection = new BasicInspection ;
        $this->tire_rotation = $basic_inspection;
        return $this->tire_rotation->get_price() + 23.5;
    }

}