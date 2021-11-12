<?php
    $server = 'localhost';
    $user = 'dangnam739';
    $pass = '123456';
    $mydb = 'Lab12';

    $q=$_GET["q"];
    $con = mysqli_connect($server, $user, $pass, $mydb);
    if ( !$con) {
        die ("Cannot connect to $server using $user");
    } 

    $sql="SELECT * FROM user WHERE id = '".$q."'";
    $result = $con->query($sql);

    echo "<table border='1'>
    <tr>
        <th>First name</th>
        <th>Last name</th>
        <th>Age</th>
        <th>Hometown</th>
        <th>Job</th>
    </tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['firstname'] . "</td>";
        echo "<td>" . $row['lastname'] . "</td>";
        echo "<td>" . $row['age'] . "</td>";
        echo "<td>" . $row['hometown'] . "</td>";
        echo "<td>" . $row['job'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
    mysqli_close($con);
?> 