<?php
    include('./config/database.php');

    $sql = "SELECT * FROM `province of bukidnon` WHERE Municipality_name LIKE 'Malitbog'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            echo $row['Municipality_name'] . "<br/>";
        }
    } else {
        echo "0 results";
    }
    $conn->close();
    ?>