<?php

// 1. Connect to database

require "dbConnect.php";  

$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// 2. Create SQL command

$sql = "SELECT name, description, presenter, date, time, date_inserted, date_updated FROM wdv341_events WHERE presenter='Jeff Gullion'";

// 3. Prepare your statement/statement object

$stmt = $conn->prepare($sql);

// 4. Bind parameters
// none

// 5. Execute your prepared statement
$stmt->execute(); //catches returned results

// 6. Process the result set/object
$stmt->setFetchMode(PDO::FETCH_ASSOC);

//$eventsArray = $stmt->fetchAll();

//$row = $stmt->fetch();




?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WDV341</title>

    <Style>
        table, th, td {
            border:1px solid black;
        }
    </style>
</head>
<body>

<h1>WDV341 Intro PHP</h1>
<h2>Select Events Assignment</h2>
<h3>Selected all events where Jeff Gullion was the presenter</h3>
<table>
    <tr>
        <td>Name</td>
        <td>Description</td>
        <td>Presenter</td>
        <td>Date</td>
        <td>Time</td>
        <td>Date Inserted</td>
        <td>Date Updated</td>
    </tr>
<?php 
while($row = $stmt->fetch()){
    echo "<tr>";
    echo ("<td>". $row['name']. "</td>");
    echo ("<td>" . $row['description'] . "</td>");
    echo ("<td>" . $row['presenter'] . "</td>");
    echo ("<td>" . $row['date'] . "</td>");
    echo ("<td>" . $row['time'] . "</td>");
    echo ("<td>" . $row['date_inserted'] . "</td>");
    echo ("<td>" . $row['date_updated'] . "</td>");
    echo "<tr>";
}
?>
</table>
</body>
</html>