<?php
/**
 * Created by PhpStorm.
 * User: Antho
 * Date: 14-12-2017
 * Time: 09:15
 */

$serverName = "localhost";
$username = "root";
$password = "root";
$dbName = "explorecalifornia";
$connect = new mysqli($serverName, $username, $password, $dbName);

if ($connect->connect_error)
{
    die("Connection failed... " + $connect->connect_error);
}
//echo "Connection succesful";

?>