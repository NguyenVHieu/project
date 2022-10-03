<?php include('partical/menu.php');?>
        <!--Main Content Section Starts-->
        <div class="main-content"> 
            <div class="wrapper">
                <h1>Manager Admin</h1>
                <br />

                    <?php
                        if(isset($_SESSION['add_admin']))
                        {
                            echo $_SESSION['add_admin'];
                            unset($_SESSION['add_admin']);
                        }
                        if(isset($_SESSION['delete_admin']))
                        {
                            echo $_SESSION['delete_admin'];
                            unset($_SESSION['delete_admin']);
                        }
                    ?>

                <br><br><br>
                    <a href="add-admin.php" class="btn-primary">Add Admin</a>
                </br></br></br>   
                <table class = "tbl-full">
                    <tr>
                        <th>S.N</th>
                        <th>Full Name</th>
                        <th>Username</th>
                        <th>Action</th>
                    </tr>
                        <?php
                            $sql = "select * from tbl_admin";
                            $query=mysqli_query($conn, $sql);
                            if($query==TRUE)
                            {
                                $count = mysqli_num_rows($query);
                                $sn = 1;
                                if($count>0)
                                {
                                    while($rows = mysqli_fetch_assoc($query))
                                    {
                                        $id = $rows['ID'];
                                        $full_name = $rows['fullname'];
                                        $username = $rows['username'];
                                        $password = $rows['password'];

                                        ?>
                                        <tr>
                                            <td><?php echo $sn++?></td>
                                            <td><?php echo $full_name?></td>
                                            <td><?php echo $username?></td>
                                            <td>
                                                <a href="update admin.phpid=<?php echo $id?>?" class="btn-second">Update Admin</a>
                                                <a href="delete-admin.php?id=<?php echo $id?>" class="btn-danger">Delete Admin</a>
                                            </td>
                        
                                        </tr>
                                        <?php
                                    }
                                }
                                else
                                {
                                    echo "NoDb";
                                }
                            }

                        ?>
                </table>
                
            </div>
        </div>
        <!--Main Content Section Starts-->

<?php include('partical/footer.php'); ?>
