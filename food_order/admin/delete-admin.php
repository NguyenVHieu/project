<?php
include('connect.php');
$id = $_GET['id'];
$sql = "delete from tbl_admin where ID = $id";
$query = mysqli_query($conn, $sql);
if($query == TRUE)
{
    $_SESSION['delete_admin'] = "<div class='success'>Admin delete Successfully</div>";
    header("location:".SITEURL.'admin/manager-admin.php');

}
else{
    $_SESSION['delete_admin'] = "<div class='success'>Admin delete Fail, Please try again</div>";
    header("location:".SITEURL.'admin/manager-admin.php');

}

?>