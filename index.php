<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion d'éléve</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>    
    <nav class="navbar">
      <h1 class="logo">Exellence</h1>
      <a href="ajouter.php" class="add">Ajouter un éléve </a>
    </nav>
    <main>
        <div class="container">
            <?php
              // inclure la page connect
              include_once "connect.php";
            ?>
            <table>
                <tr id="items" class="items">
                    <th>Nom</th>
                    <th >Prenom</th>
                    <th>Age</th>
                    <th>classe</th>
                    <th>Ine</th>
                    <th>Edit</th>
                    <th>delete</th>
                </tr>
                <?php
                   // inclure la page connect
                   include_once "connect.php";

                   // requêtte pour afficher la liste des employés
                   $req = mysqli_query($bdd, "SELECT * FROM student");
                   $message='';
                   if (mysqli_num_rows($req) == 0) {
                      $message = "Il n'y a pas encore d'eleve Ajouter!";
                   }
                   else{
                     while ($row = mysqli_fetch_assoc($req)) {
                        ?>
                        <tr>
                            <td><?=$row["lastname"] ?></td>
                            <td><?=$row["firstname"] ?></td>
                            <td><?=$row["age"] ?></td>
                            <td><?=$row["level"] ?></td>
                            <td><?=$row["ine"] ?></td>
                            <td><a href="modifier.php?id=<?=$row["id"]?>"><img src="image/edit.svg" alt="un crayon"></a></td>
                            <td><a href="delete.php?id=<?=$row["id"]?>"><img src="image/delete.svg" alt="une poubelle"></a></td>
                        </tr>
                        <?php
                     }
                   }
                ?>
                 <p class="message"><?php echo $message?> </p>
            </table>
            
        </div>
    </main>
    <script src="js/script.js"></script>
</body>
</html>