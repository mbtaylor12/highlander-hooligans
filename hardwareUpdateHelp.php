<?php 
    $manufacturer = $_POST['manufacturer'];
    $assetTag = $_POST['assetTag'];
    $location = $_POST['location'];
    $description = $_POST['description'];
    $model = $_POST['model'];
    $periphereals = $_POST['periphereals'];
    $serialNumber = $_POST['serialNumber'];
    $ticketStatus = $_POST['ticketStatus'];


    echo("Manufacturer: $manufacturer<br />Asset Tag: $assetTag<br />Location: $location<br />Description: $description<br />Model: $model<br />Periphereals: $periphereals<br />Serial Number: $serialNumber<br />Ticket Status: $ticketStatus");
?>