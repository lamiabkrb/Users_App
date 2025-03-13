<?php
include_once('db.php');
if(isset($_POST['save'])){
   
    //vérifier ue les champs sont vides
if(!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['mobile']) && !empty($_POST['password'])){
   $name=$_POST['name'];
   $email=$_POST['email'];
   $mobile=$_POST['mobile'];
   $password=$_POST['password'];

   $add_sql="INSERT INTO `user`(`name`, `email`, `password`, `mobile`) VALUES ('$name','$email','$password','$mobile')";
   $res_add=mysqli_query($con,$add_sql);
   if(!$res_add){
    die(mysqli_error($con));
   }else{
    echo 'user added successfully';

    // réinitialiser les variables pour eviter quelle concervent les anciennes val
    $name = $email = $mobile = $password = "";

    //rafraichit la page apres linsertion pour garantir un reset complet
    header("Location: ".$_SERVER['PHP_SELF']);
            exit();
   }
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head> 
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/toastr.css">
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


    <script src="js/jq.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/icon.js"></script>
    <script src="js/toastr.js"></script>
    <script>
  feather.replace();
</script>
</body>
</html>