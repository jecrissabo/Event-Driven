<?php
   
   include('../config/database.php');

    $value = $_POST['search'];

    $sql = "SELECT * FROM `bukidnon` WHERE  Municipality_name like'$value%' OR Zip_code like '$value%'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            ?>
            <tr>
                <td style="text-align: center;"><?=$row['Zip_code'] ?></td>
                <td><?= $row['Municipality_name'] ?></td>
            </tr>
            <?php
        }
    } else {
        echo "0 results";
    }
    $conn->close();
?>