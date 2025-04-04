<?php require '../../config.php';  ?>

<?php require BLA.'inc/header.php';  ?>
<?php require BL.'functions/validate.php';  ?>


<?php  
if(isset($_GET['id']) && is_numeric($_GET['id']))
{ 
    $row = getRow('ciry_id',$_GET['id'],'city');
    if(!$row){ header("location:".BU); }

    $city_id = $row['ciry_id'];
}
else
{
    header("location:".BUA);
}



?>



<div class="col-sm-6 offset-sm-3 border p-3">
    <h3 class="text-center p-3 bg-primary text-white">Edit City</h3>
    <form method="post" action="<?php echo BUA.'cities/update.php'; ?>">
        <div class="form-group">
            <label>Name Of City</label>
            <input type="text" name="name" value="<?php echo $row['city_name']; ?>" class="form-control">
            <input type="hidden" name="ciry_id" value="<?php echo $city_id; ?>" class="form-control">
        </div>

        <button type="submit" name="submit" class="btn btn-success">Save</button>
    </form>

</div>


<?php require BLA.'inc/footer.php';  ?>