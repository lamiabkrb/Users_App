<?php
include_once('db.php');
if(isset($_POST['save'])){
   $name=$_POST['name'];
   $emai=$_POST['email'];
   $mobile=$_POST['mobile'];
   $password=$_POST['password'];

   $add_sql=INSERT INTO `user`(`name`, `email`, `password`, `mobile`) VALUES 
   ('[value-2]','[value-3]','[value-4]','[value-5]')
}
?>

<!DOCTYPE html>
<html lang="en">
<head> 
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Application Utilisateurs</title>
</head>
<body>
    <div class="container">
        <div class="wrapper p-5 m-5 ">
            <div class="d-flex p-2 justify-content-between ">
                <h2>All Users</h2>
                <div><a href="add_user.php"><i data-feather="user-plus"></i></a></div>
            </div>
        </div>
    </div>



    <script src="js/bootstrap.min.js"></script>
    <script src="js/icon.js"></script>
    <script>
  feather.replace();
</script>
</body>
</html>