<html>
<head>
    <title>Explore Cali</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="styles/style.css">
</head>
<body>

<header id="header">
    <h1>Explore California</h1>
</header>

<div id="nav">
    <ul class="mainBtns">
        <li class="nav_button">
            <a href="?page=home">Tours</a>
        </li>
        <li class="nav_button">
            <a href="?page=packages">Packages</a>
        </li>
        <li class="nav_button">
            <a href="?page=admin">Admin</a>
        </li>
    </ul>
</div>


<?php
include ("Includes/DB_connect.php");

if (!isset($_GET["page"])) {
    include ("Tours.php");
} else {
    switch ($_GET["page"])
    {
        case "home":
            include ("Tours.php");
            break;
        case "packages":
            include ("Packages.php");
            break;
        case "admin":
            include("AdminPanel.php");
            break;
    }
}
?>

</body>
</html>