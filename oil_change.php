<?php
require_once ('./basic_inspection.php');

Class OilChange extends BasicInspection {
    public $oil_change;

    function __construct(BasicInspection $basic_inspection){
        $this->oil_change = $basic_inspection;
    }

    function get_price(){
                return $this->oil_change->get_price() + 85 ;
    }

}