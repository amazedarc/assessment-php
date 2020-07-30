<?php
  header("Access-Control-Allow-Origin: *");
  header("content-type: application/json");
  require ('./basic_inspection.php');
  require ('./tire_rotation.php');
  require ('./oil_change.php');

  $services = ['Basic Inspection','OIl change','Tire rotation'];
  $name="";

  $basic_inspection = new BasicInspection;
  $tire_rotation = new TireRotation ;
  $oil_change = new OilChange;

  function all_service_cost(){
    return  (new OilChange)->get_price() + 23.5;
  }

if(isset($_GET['inp'])){
  
  if(isset($_GET['inp']) && preg_match("/^[a-zA-Z]*$/",$_GET['inp'])){
    $response  = array('message'=>'Select a Service .\n1.'.$services[0].'\n2.'.$services[1].'\n3. '.$services[2].'\n4.All Services\n5.Add another Service');
  }
   elseif($_GET['inp'] == '1'){
      $response  = array('message'=>' your Basic Inspection bill is: $'.$basic_inspection->get_price());
    }elseif($_GET['inp'] == '2'){
      $response  = array('message'=>' your Oil change bill is: $'.$oil_change->get_price());
    }elseif($_GET['inp'] == '3'){
      // $name = $_GET['inp'];
      $response  = array('message'=>' your Tire rotation bill is: $'.$tire_rotation->get_price());
    }
    elseif($_GET['inp'] == '4'){
      // $name = $_GET['inp'];
      $response  = array('message'=>' your Tire rotation and Oil change bill is: $'.all_service_cost());
    }

  }else{
      $response  = array('message'=>'Enter the client name');
     
 
  }


  echo json_encode($response);