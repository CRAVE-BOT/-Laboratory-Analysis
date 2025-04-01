<?php require 'config.php'; ?>
<?php require BL . 'functions/validate.php'; ?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo ASSETS; ?>/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat|Open+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo ASSETS; ?>/css/style.css">

    <title>Home Page</title>
</head>

<body>

    <div class="cont-main" style="background:url(<?php echo ASSETS . '/images/bg-1.jpg'; ?>)">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <?php
                if (isset($_POST['submit'])) {
                    $service = $_POST['service'];
                    $city = $_POST['city'];
                    $mobile = sanitizeString($_POST['mobile']);
                    $notes = sanitizeString($_POST['notes']);
                    $name = sanitizeString($_POST['name']);
                    $email = sanitizeString($_POST['email']);

                    if (checkEmpty($mobile) && checkEmpty($name)) {
                        $sql = "INSERT INTO orders (`order_name`,`order_email`,`order_mobile`,`order_serv_id`,`order_city_id`,`order_notes`)
                                VALUES ('$name','$email','$mobile','$service','$city','$notes')";
                        $success_message = db_insert($sql);
                    } else {
                        $error_message = "Please enter your Name and Mobile number.";
                    }
                }
                ?>

                    <form class="row" method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                        <?php require BL . 'functions/error.php'; ?>
                        <div class="col-sm-6">
                            <div class="form-group mt-3">
                                <label for="service" class="font-1">Choose Service</label>
                                <select name="service" id="service" class="form-control font-1">
                                    <?php
                                $data = getRows('services');
                                foreach ($data as $row) {
                                    echo "<option value='{$row['service_id']}'>{$row['service_name']}</option>";
                                }
                                ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group mt-3">
                                <label for="city" class="font-1">Choose City</label>
                                <select name="city" id="city" class="form-control font-1">
                                    <?php
                                $dataCity = getRows('city');
                                foreach ($dataCity as $row) {
                                    echo "<option value='{$row['ciry_id']}'>{$row['city_name']}</option>";
                                }
                                ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-4 col-sm-12">
                            <div class="form-group">
                                <label for="name" class="font-1">Type Your Name *</label>
                                <input type="text" name="name" id="name" class="form-control font-1 bg-base">
                            </div>
                        </div>

                        <div class="col-md-4 col-sm-12">
                            <div class="form-group">
                                <label for="email" class="font-1">Type Your Email</label>
                                <input type="email" name="email" id="email" class="form-control font-1 bg-base">
                            </div>
                        </div>

                        <div class="col-md-4 col-sm-12">
                            <div class="form-group">
                                <label for="mobile" class="font-1">Type Your Mobile *</label>
                                <input type="text" name="mobile" id="mobile" class="form-control font-1 bg-base">
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="notes" class="font-1">Type Notes</label>
                                <textarea name="notes" id="notes" class="form-control font-1 bg-base"
                                    rows="5"></textarea>
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="form-group">
                                <button type="submit" name="submit" class="btn btn-success form-control">Send</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <script src="<?php echo ASSETS; ?>/js/jquery-3.4.1.min.js"></script>
    <script src="<?php echo ASSETS; ?>/js/popper.min.js"></script>
    <script src="<?php echo ASSETS; ?>/js/bootstrap.min.js"></script>
</body>

</html>