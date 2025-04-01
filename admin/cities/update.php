<?php require '../../config.php';  ?>

<?php require BLA.'inc/header.php';  ?>
<?php require BL.'functions/validate.php';  ?>



<?php 

        if(isset($_POST['submit']))
        {
            $city_id = $_POST['ciry_id'];
            $name = sanitizeString($_POST['name']);
            $notEmpty = checkEmpty($name);
          
            if($notEmpty)
            {
                $less = checkLess($name,3);
                if($less)
                {
                    $sql = "UPDATE city SET `city_name`='$name' WHERE `ciry_id`='$city_id' ";
                    $success_message = db_update($sql);
                }
                else 
                {
                    $error_message = "Please Type Correct City";
                }
            }
            else 
            {
                $error_message = "Please Type City Name";
            }

            require BL.'functions/error.php';
        }


    ?>





<?php require BLA.'inc/footer.php';  ?>