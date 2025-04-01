<?php
require '../../config.php';
require BLA . 'inc/header.php';

if (isset($_GET['id'])) {
    $service_id = $_GET['id'];
    $service = getRow('service_id', $service_id, 'services');

    if ($service) {
        ?>
<form method="POST" action="update.php">
    <input type="hidden" name="service_id" value="<?php echo $service['service_id']; ?>">
    <div class="form-group">
        <label for="service_name">Service Name</label>
        <input type="text" name="service_name" class="form-control" value="<?php echo $service['service_name']; ?>">
    </div>
    <button type="submit" name="submit" class="btn btn-success">Update</button>
</form>
<?php
    } else {
        echo "<div class='alert alert-danger'>Service not found.</div>";
    }
} else {
    echo "<div class='alert alert-danger'>No service ID provided.</div>";
}

require BLA . 'inc/footer.php';
?>