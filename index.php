<?php
include_once('db.php');

session_start(); // Démarrer la session


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
     
    $_SESSION['action'] = "add";

    // réinitialiser les variables pour eviter quelle concervent les anciennes val
    $name = $email = $mobile = $password = "";
    //rafraichit la page apres linsertion pour garantir un reset complet
    header("Location: ".$_SERVER['PHP_SELF']);
            exit();
   }
}
}

    $users_sql="SELECT * FROM user";
    $all_user=mysqli_query($con,$users_sql);
    $user=$all_user->fetch_assoc();
    

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
            <div class="d-flex p-2 justify-content-between mb-2">
                <h2>All Users</h2>
                <div><a href="add_user.php"><i data-feather="user-plus"></i></a></div>
            </div>
            <hr>  <!-- inserer une ligne horizontale -->
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Mobile</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                      while ($user = $all_user->fetch_assoc()) { ?>
                        <tr>
                            <td><?php echo $user['id']; ?></td>
                            <td><?php echo $user['name']; ?></td>
                            <td><?php echo $user['email']; ?></td>
                            <td><?php echo $user['mobile']; ?></td>
                            <td>
                                <div class="d-flex p-2 justify-content-evenly mb-2">
                                    <i onclick="confirm_delete(f" class="text-danger" data-feather="trash-2"></i>
                                    <i class="text-success" data-feather="edit"></i>
                                </div>
                                
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>

        </div>
    </div>


    <script src="js/jq.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/icon.js"></script>
    <script src="js/toastr.js"></script>
    <script src="js/main.js"></script>
    <?php
    if (isset($_SESSION['action'])){
        if($_SESSION['action'] == "add" ){?>
        <script>
            show_add()
        </script>
    <?php
         unset($_SESSION['action']);}  // fermer la session de msG de validaton de cretion
        }?>
    <script>
        feather.replace();
    </script>
</body>
</html>