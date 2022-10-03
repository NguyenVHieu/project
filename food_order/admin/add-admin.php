<?php include('partical/menu.php')?>

    <div class="main-content">
        <div class="wrapper">
            <h1>Add Admin</h1>

            <br></br>

            <form action="" method="POST">

            <table class="tbl-30">
                <tr>
                    <td>Full Name:</td>
                    <td>
                        <input type="text" name="full_name" placeholder="Enter your name">
                    </td>
                </tr>
                <tr>
                    <td>Username:</td>
                    <td>
                        <input type="text" name="username" placeholder="Enter username">
                    </td>
                </tr>
                <tr>
                    <td>Password:</td>
                    <td>
                        <input type="password" name="password" placeholder="Enter your name">
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" name="Add Admin" class="btn-second">
                    </td>
                </tr>
            </table>
            </form>
        </div>
    </div>

<?php include('partical/footer.php')?>

<?php 
    
    if(isset($_POST['submit']))
    {
        $full_name = $_POST['full_name'];
        $username = $_POST['username'];
        $password = $_POST['password'];
    $sql = "insert into tbl_admin (fullname, username, password) values ('$full_name','$username','$password')";
    $query = mysqli_query($conn, $sql) or die (mysqli_error());
    if($query == TRUE){
        $_SESSION['add_admin'] = "Admin Added Sucessfully.";
        header("location:".SITEURL.'admin/manager-admin.php');
    }
    else{
        $_SESSION['add_admin'] = "Admin Added Fail";
        header("location:".SITEURL.'admin/add-admin.php');
    }
}

    

?>
