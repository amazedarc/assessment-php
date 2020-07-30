<?php
  header("Access-Control-Allow-Origin: *");
  header("content-type: application/json");

  $services = ['Basic Inspection','OIl change','Tire rotation'];
  $name="";
  
  function basic_inspection_cost(){
    return 50;
  }
  function oil_change_cost($basic_cost){
    return $basic_cost+ 85;
  }
  function tire_rotation_cost($basic_cost){
    return $basic_cost+ 23.5;
  }
  function all_service_cost(){
    return tire_rotation_cost(oil_change_cost(basic_inspection_cost()));
  }
 
if(isset($_GET['inp'])){
  if(isset($_GET['inp']) && preg_match("/^[a-zA-Z]*$/",$_GET['inp'])){
    $response  = array('message'=>'Select a Service .\n1.'.$services[0].'\n2.'.$services[1].'\n3. '.$services[2].'\n4.All Services\n5.Add another Service');
  }
   if($_GET['inp'] == '1' ){
      $response  = array('message'=>' your Basic Inspection bill is: $'.basic_inspection_cost());
    }elseif($_GET['inp'] == '2'){
      // $name = $_GET['inp'];
      $response  = array('message'=>' your Oil change bill is: $'.oil_change_cost(basic_inspection_cost()));
    }elseif($_GET['inp'] == '3'){
      // $name = $_GET['inp'];
      $response  = array('message'=>' your Tire rotation bill is: $'.tire_rotation_cost(basic_inspection_cost()));
    }
    elseif($_GET['inp'] == '4'){
      // $name = $_GET['inp'];
      $response  = array('message'=>' your Tire rotation and Oil change bill is: $'.all_service_cost());
    }

  }else{
     if(sizeof($services)=='3'){
      $response  = array('message'=>'Enter the client name');
     }
 
  }


  echo json_encode($response);