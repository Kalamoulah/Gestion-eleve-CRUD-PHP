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
        include_once"connect.php";

        @$id = $_GET["id"];

        $req = mysqli_query($bdd, "SELECT * FROM student WHERE id = $id ");
        
        @$row = mysqli_fetch_assoc($req);
        
       if (isset($_POST["submit"])) {

          extract($_POST);

          if (!empty($lastname) &&  !empty($firstname) && !empty($age)&& !empty($level) && !empty($ine)) {

            $lastname= htmlspecialchars($_POST['lastname']);
            $firstname= htmlspecialchars($_POST['firstname']);
            $age= htmlspecialchars($_POST['age']);
            $level= htmlspecialchars($_POST['level']);
            $ine= htmlspecialchars($_POST['ine']);
            $req = mysqli_query($bdd, "UPDATE student SET lastname = '$lastname', firstname = '$firstname', age = '$age', level = '$level', ine = '$ine ' WHERE id = $id");
            
            if ($req){
                header("location: index.php");
            } else{
                $error_message = "Eleve non ajouter";
            }

        }else {
             $error_message = "make sure to fill in all the fields";
          }
    }
?>
    <div class="form_container">

       <a href="index.php" class="back_btn" ><img src="image/fleche.svg" alt="fleche retour">Back</a>

       <h2>Edit a student</h2>

       <p class="error_message">
        
       </p>
       <form action="#" method="post">

           <div class="input_bloc">

                <label for="lastname">lastname</label>
                <input type="text"  name="lastname" value="<?=$row["lastname"]?>">

           </div>
           <div class="input_bloc">

                <label for="firstname">firstname</label>
                <input type="text"  name="firstname" value="<?=$row["firstname"]?>">

           </div>
           <div class="input_bloc">

                <label for="age">age</label>
                <input type="number"  name="age" value="<?=$row["age"]?>">

           </div>
           <div class="input_bloc">

                <label for="level">level</label>                
                <input type="text"  name="level" value="<?=$row['level'];?>">

           </div>
           <div class="input_bloc">

                <label for="ine">ine</label>
                <input type="text" id="ine" name="ine" value="<?=$row["ine"]?>">

           </div>
           <div class="input_bloc"> 

                <input type="submit" id="submit" value="Edit" name="submit">

           </div>
           
       </form>
    </div>
</body>
</html>