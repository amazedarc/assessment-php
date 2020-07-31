<?php session_start() ?>
<?php

// http://localhost:8080/assessment/index.php/ for starting
// http://localhost:8080/assessment/index.php/?inp=1 for basic inspection
// http://localhost:8080/assessment/index.php/?inp=2 for oil change 
// http://localhost:8080/assessment/index.php/?inp=3 for tire rotation
// http://localhost:8080/assessment/index.php/?inp=4 for oil * tire rotation


header("Access-Control-Allow-Origin: *");
header("content-type: application/json");

require('./services.php');

$service = new Services();
$services = $service->get_price();
$tire_rotation = $services->tire_rotation + $services->basic_inspection;
$oil_change = $services->oil_change + $services->basic_inspection;
$tire_oil_service = $oil_change + $services->tire_rotation;
$array_service = get_object_vars($services);
$service_name = array_keys($array_service);

if (isset($_GET['inp'])) {

  if (isset($_GET['inp']) && preg_match("/^[a-zA-Z]*$/", $_GET['inp'])) {
    $_SESSION['NAME'] = $_GET['inp'];
    $response  = array('message' => 'Select a Service .\n1.' . $service_name[0] . '\n2.' . $service_name[1] . '\n3. ' . $service_name[2] . '\n4.All Services\n5.Add another Service');
  } elseif ($_GET['inp'] == '1') {
    $response  = array('message' => $_SESSION['NAME'] . ' your Basic Inspection bill is: $ ' . $services->basic_inspection);
  } elseif ($_GET['inp'] == '2') {
    $response  = array('message' => $_SESSION['NAME'] . ' your Oil change bill is: $' . $oil_change);
  } elseif ($_GET['inp'] == '3') {
    $response  = array('message' => $_SESSION['NAME'] . ' your Tire rotation bill is: $' . $tire_rotation);
  } elseif ($_GET['inp'] == '4') {
    // $name = $_GET['inp'];
    $response  = array('message' => $_SESSION['NAME'] . ' your Tire rotation and Oil change bill is: $' . $tire_oil_service);
  }
} else {
  $response  = array('message' => 'Enter the client name');
}

echo json_encode($response);