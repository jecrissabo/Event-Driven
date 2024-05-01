<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <script src="./assets/js/search.js"></script>

    <link href="./assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="./assets/bootstrap/js/bootstrap.bundle.min.js"></script>

    <style>
        body {
            background-color: #ecf0f1;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="javascript:void(0)">
                <img src="./assets/img/logo.png" height="50">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="mynavbar">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="./index.php">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./registration.php">Registration</a>
                    </li>
            </div>
        </div>
    </nav>

    <div class="container">
        <p class="h2 mt-3">Postal Code</p>
        <p>you can add Postal code here...</p>
        <div class="card mt-3">

            <form action="/myshop/models/save-postal-code.php" method="POST">
                <div class="card-header">Registration form</div>
                <div class="card-body">
                    <?php
                    if (isset($_GET['success'])) {
                    ?>
                        <div class="alert alert-success">
                            <b>Postal Code Added</b>. Congrat. Thank you.
                        </div>
                        <hr>
                    <?php
                    } elseif (isset($_GET['invalid'])) {
                    ?>
                        <div class="alert alert-danger">
                            <b>Existed Postal Code</b>. Please try another. Thank you.
                        </div>
                        <hr>
                    <?php
                    }
                    ?>

                    <!--  <div class="row">
                        <div class="col-md-4">
                            <label> Application ID : <b class="text-danger">*</b> </label><br>
                            <input name="inp_appid" type="text" placeholder="Enter application id here" class="form control mt-2">
                        </div>
                    </div> -->

                    <div class="row mt-3">
                        <?php
                        include "./config/database.php";

                        ?>
                        <!-- Address -->
                        <div class="row mt-3">
                            <div class="col-md-12">
                            </div>
                            <div class="col-md-3">
                                <label>Region :<b class="text-danger">*</b></label>
                                <select name="inp_region" id="inp_region" onchange="display_province(this.value)" required class="form-control mt-2">
                                    <option value="" disabled selected>--SELECT REGION--</option>
                                    <?php
                                    $sql = "SELECT * FROM ph_region";
                                    $result = $conn->query($sql);

                                    if ($result->num_rows > 0) {
                                        // output data of each row
                                        while ($row = $result->fetch_assoc()) {
                                    ?>
                                            <option value="<?= $row["regCode"] ?>"><?= $row["regDesc"] ?></option>
                                    <?php
                                        }
                                    } else {
                                        echo "0 results";
                                    }
                                    $conn->close();
                                    ?>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label>PROVINCE : <b class="text-danger">*</b></label>
                                <select name="inp_province" id="inp_province" onchange="display_citymun(this.value)" required class="form-control mt-2">
                                    <option value="" disabled selected>--SELECT PROVINCE--</option>
                                </select>

                            </div>
                            <div class="col-md-3">
                                <label>Municipality : <b class="text-danger">*</b></label>
                                <select name="inp_citymun" id="inp_citymun" required class="form-control mt-2">
                                    <option value="" disabled selected>--SELECT MUNICIPALITY--</option>
                                </select>

                            </div>
                            <div class="col-md-3">
                                <label>POSTAL CODE : <b class="text-danger">*</b></label>
                                <input type="number" name="inp_postalcode" class="form-control mt-2" placeholder="Postal Code here...">

                            </div>
                        </div>

                    </div>
                </div>

        </div>
        <div class="card-footer">
            <span style="float: right">
                <button class="btn btn-success">
                    add Postal Code
                </button>
            </span>
        </div>
        </form>
    </div>
    </div>

</body>
<script>
    function display_province(regCode) {

        $.ajax({

            url: './models/address.php',
            type: 'POST',
            data: {
                'type': 'region',
                'past_Code': regCode
            },
            success: function(response) {
                $('#inp_province').html(response);
            }
        });
    }

    function display_citymun(provCode) {

        $.ajax({

            url: './models/address.php',
            type: 'POST',
            data: {
                'type': 'province',
                'past_Code': provCode
            },
            success: function(response) {
                $('#inp_citymun').html(response);
            }
        });
    }

    function display_brgy(citymunCode) {

        $.ajax({

            url: './models/address.php',
            type: 'POST',
            data: {
                'type': 'citymun',
                'past_Code': citymunCode
            },
            success: function(response) {
                $('#inp_brgy').html(response);
            }
        });
    }
</script>

<!-- jquery -->
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
<!-- jquery -->

</html>