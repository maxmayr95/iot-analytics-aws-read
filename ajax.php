<?php
require 'analytics.php';
$iotAnalytics = new IoTAnalyticsHandler();
$dataSet = $iotAnalytics->getDatasetContent("analytics2_dataset");
$csvUri = $dataSet["entries"][0]["dataURI"];
$json = csvToJson($csvUri);
echo $json;
function csvToJson($fname) {
    if (!($fp = fopen($fname, 'r'))) {
        die("Can't open file...");
    }
    $key = fgetcsv($fp,"1024",",");
    $json = array();
        while ($row = fgetcsv($fp,"1024",",")) {
        $json[] = array_combine($key, $row);
    }
    fclose($fp);
    return json_encode($json);
}
?>
