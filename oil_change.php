<?php
require_once ('./basic_inspection.php');

Class OilChange extends BasicInspection {
    public $oil_change;

    function get_price(){
        
        $basic_inspection = new BasicInspection ;
        $this->oil_change = $basic_inspection;
        return $this->oil_change->get_price() + 85 ;
    }

}