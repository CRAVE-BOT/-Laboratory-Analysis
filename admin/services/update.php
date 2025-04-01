<?php
ob_start();
require '../../config.php';
require BLA . 'inc/header.php';
 require BL . 'functions/validate.php'; 

if (isset($_POST['submit'])) {
    // التحقق من أن جميع الحقول موجودة قبل تنفيذ التحديث
    if (isset($_POST['service_id'], $_POST['service_name'])) {
        $service_id = $_POST['service_id'];
        $service_name = sanitizeString($_POST['service_name']);

        // التأكد من أن الاسم غير فارغ
        if (!empty($service_name)) {
            $sql = "UPDATE services SET service_name='$service_name' WHERE service_id='$service_id'";
            $success_message = db_update($sql);
        } else {
            $error_message = "Please enter a valid service name.";
        }
    } else {
        $error_message = "Service ID or Service Name is missing.";
    }
}

// عرض رسالة نجاح أو خطأ
if (isset($success_message)) {
    echo "<div class='alert alert-success'>$success_message</div>";
} elseif (isset($error_message)) {
    echo "<div class='alert alert-danger'>$error_message</div>";
}

require BLA . 'inc/footer.php';
ob_end_flush();
?>