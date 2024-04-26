<?php

$registration = array(
    //'app_id' =>"'". $_POST['inp_appid']."'",
    'L_name' =>"'". $_POST['inp_Lname']."'",
    'F_name' =>"'". $_POST['inp_Fname']."'",
    'Ext_name' =>"'". $_POST['inp_exname']."'",
    'M_name' =>"'". $_POST['inp_Mname']."'",
    'Gender' =>"'". $_POST['inp_gender']."'",
    'Birth_date' =>"'". $_POST['inp_birthdate']."'",
   'Birth_place' =>"'". $_POST['inp_birthplace']."'",
    'Zip_code' =>"'". $_POST['inp_zcode']."'",
   'Status' =>"'". $_POST['inp_status']."'",
);

save($registration);

function save($data)
{
    include('../config/database.php');


    $attributes = implode(", ", array_keys($data));
    $values = implode(", ", array_values($data));

    $query = "INSERT INTO register ($attributes) VALUES ($values)";


    if($conn->query($query) === TRUE){
        header('location: /myshop/registration.php?success');
    }else{
        header('location: /myshop/registration.php?invalid');
    }

    $conn->close();
}