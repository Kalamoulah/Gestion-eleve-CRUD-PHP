<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<?php
    if ( isset( $_POST["submit"] ) ) {

        extract($_POST);

        if (!empty($lastname) &&  !empty($firstname) && !empty($age)&& !empty($level) && !empty($ine)) {

            $lastname= htmlspecialchars($_POST['lastname']);            
            $firstname= htmlspecialchars($_POST['firstname']);
            $age= htmlspecialchars($_POST['age']);
            $level= htmlspecialchars($_POST['level']);
            $ine= htmlspecialchars($_POST['ine']);

            include_once"connect.php";

            $req = mysqli_query($bdd, "INSERT INTO student VALUE(NULL, '$lastname', '$firstname', '$age', '$level', '$ine')");
            if ($req){

                 header("location: index.php");

            }else{
                 $error_message = "Eleve non ajouter";                 
                }

            }else {
               $error_message = "make sure to fill in all the fields";
            }

    }
?>

    <div class="form_container">

       <a href="index.php" class="back_btn" ><img src="image/fleche.svg" alt="fleche retour">Back</a>

       <h2>Add a student</h2>

       <p class="error_message">
         <?php
           if (isset($error_message)) {
              echo "$error_message";
           }
         ?>
       </p>

       <form action="#" method="post">

           <div class="input_bloc">
                <label for="lastname">lastname</label>
                <input type="text" id="lastname" name="lastname">
           </div>

           <div class="input_bloc">
                <label for="firstname">firstname</label>
                <input type="text" id="firstname" name="firstname">
           </div>

           <div class="input_bloc">
                <label for="age">age</label>
                <input type="text" id="age" name="age">
           </div>

           <div class="input_bloc">
                <label for="level">level</label>
                <input type="text" id="level" name="level">
           </div>

           <div class="input_bloc">
                <label for="ine">ine</label>
                <input type="text" id="ine" name="ine">
           </div>

           <div class="input_bloc">            
                <input type="submit" id="submit" value="ADD" name="submit">
           </div>

       </form>

    </div>

</body>
</html>