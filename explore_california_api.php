<?php
/**
 * Created by PhpStorm.
 * User: Antho
 * Date: 14-12-2017
 * Time: 10:15
 */

/* RESTful API
    Spørgsmålet lyder om dette er et RESTful API, og hvordan man evt.
    kan gøre det til et RESTful API.
    Jeg ville sige at dette i forvejen er et RESTful API, det vil jeg konkludere
    ud fra at man tilgår denne API ved hjælp af en simpel URL.
    Hvis jeg hoster denne php fil med tilhørende database, kan jeg gå til
    "http://localhost/explore_california_api.php" og så vil den returnere et array i JSON format.
    Hvis man brugte SOAP ville man tilgå API'et ved hjælp af XML.*/
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include ("Includes/DB_connect.php");

$sql = "SELECT * FROM tours t LEFT JOIN packages p ON t.packageId = p.packageId";

$result = $connect->query($sql);

if ($result->num_rows > 0)
{
    // output the data found in the SQL query
    $tourArray = array();
    while ($row = $result->fetch_assoc())
    {
        $obj = new stdClass();
        $obj->tour_id = $row["tourId"];
        $obj->package_title = $row["packageTitle"];
        $obj->tour_name = $row["tourName"];
        //$obj->blurb = $row["blurb"];
        //$obj->description = $row["description"];
        $obj->price = $row["price"];
        $obj->difficulty = $row["difficulty"];
        $obj->graphic = $row["graphic"];
        $obj->length = $row["length"];
        $obj->region = $row["region"];
        $obj->keywords = $row["keywords"];

        array_push($tourArray, $obj);
        //$json_arr = json_encode()
        //echo '"item'.$obj->id.'" : ' .json_encode($obj) . ",";
    }

    $json_arr = json_encode($tourArray);
    echo $json_arr;
} else {
    echo "0 results";
}

?>