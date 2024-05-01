<?php
   
   include('../config/database.php');

    $value = $_POST['search'];

    $sql = "SELECT * FROM `register` WHERE  L_name  like'$value%' OR app_id like '$value%'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            ?>
            <tr>
                <td style="text-align: center;"><?=$row['app_id'] ?></td>
                <td><?= $row['L_name'] ?></td>
                <td class="d-grid">
                <button type="button" class="btn btn-sm btn-block btn-success <?=$row['app_id'] ?>" data-bs-toggle="modal" data-bs-target="#view-details">view</button>
                </td>
            </tr>
            <?php
        }
    } else {
        echo "0 results";
    }
    $conn->close();
?>