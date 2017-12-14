<?php
/**
 * Created by PhpStorm.
 * User: Antho
 * Date: 14-12-2017
 * Time: 09:17
 */

//echo "Hello world!";

echo "<table id='toursTable'>";
echo "<tr>
<th class='toursTH'>ID</th>
<th class='toursTH'>Package</th>
<th class='toursTH'>Name</th>
<th class='toursTH'>Description</th>
<th class='toursTH'>Price</th>
<th class='toursTH'>Difficulty</th>
<th class='toursTH'>Graphic</th>
<th class='toursTH'>Length</th>
<th class='toursTH'>Region</th>
<th class='toursTH'>Keywords</th>
</tr>";

$sql = "SELECT * FROM tours t LEFT JOIN packages p ON t.packageId = p.packageId";

$result = $connect->query($sql);
if ($result->num_rows > 0)
{
    while ($row = $result->fetch_assoc())
    {
        echo "<tr>";
        echo "<td class='toursTD'>" . $row["tourId"] . "</td>";
        echo "<td class='toursTD'>" . $row["packageTitle"] . "</td>";
        echo "<td class='toursTD'>" . $row["tourName"] . "</td>";
        echo "<td class='toursTD'>" . $row["description"] . "</td>";
        echo "<td class='toursTD'>" . $row["price"] . "</td>";
        echo "<td class='toursTD'>" . $row["difficulty"] . "</td>";
        //echo "<td class='toursTD'>" . $row["graphic"] . "</td>";
        echo "<td class='toursTD'><img src='images/" . $row["graphic"] . "' alt='Graphics Missing :('> </td>";
        echo "<td class='toursTD'>" . $row["length"] . "</td>";
        echo "<td class='toursTD'>" . $row["region"] . "</td>";
        echo "<td class='toursTD'>" . $row["keywords"] . "</td>";
        echo "</tr>";
    }
}



?>