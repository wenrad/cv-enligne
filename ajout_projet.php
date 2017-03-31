<html>
    <head>
        <title> Rappel</title>
    </head>
    <body>
        <form method="post" enctype="multipart/form-data">
            <table>
                <tr>
                    <td>Nom</td>
                    <td><input type="text" name="titre"></td>
                </tr>
				<tr>
                    <td>date</td>
                    <td><input type="date" name="date"></td>
                </tr>
                <tr>
                    <td>outil</td>
                    <td><input type="textarea" name="outils"></td>
                </tr>
                <tr>
                    <td>description</td>
                    <td><input type="textarea" name="description"></td>
                </tr>
                
                
                <tr>
                    <td>Photo</td>
                    <td><input type="file" name="image"></td>
                </tr>
                <tr>
                    <td><input type="submit" name="ok" value="Ajouter"></td>
                </tr>
                
            </table>
        </form>
    </body>
</html>

<?php
$host_db="localhost";
$user_db = "root";
$password_db = "";
$bdd_db = "site_radhwen";

$connect_db = mysqli_connect($host_db,$user_db,$password_db);
mysqli_select_db($connect_db,$bdd_db) or die("ereur");

if(isset($_POST['ok']))
{
    
    $titre=$_POST['titre'];
    $date="";
    $outils="";
    $description="";
   
    $image="";
	/*$_FILES['image']['name'];
    move_uploaded_file($_FILES['image']['tmp_name'], "images/".$image);*/
    
    $req="INSERT INTO `site_radhwen`.`projet` (`id`, `titre`, `date`, `outils`, `description`, `image`) VALUES ('', '".$titre."', '".$date."', '".$outils."', '".$description."', '".$image."');";
 mysqli_query($connect_db,$req);
	echo "oooooo";
   /* if($res)
    {
        echo "insertion valide";
    }  else {
        
        echo "insertion invalide";
    
    }*/
}



?>
<table>
    <tr bgcolor="red">
        <td>ID</td><td>Nom</td><td>Prenom</td><td>Age</td><td>Sexe</td><td>Diplome</td><td>Ville</td><td>Photo</td>
    </tr>
    <?php
$req="SELECT * FROM `etudiant`";
$res= mysqli_query($connect_db,$req);
/*
while ($curseur= mysqli_fetch_array($res)) {
    
    echo '<tr><td>';
    echo  $curseur['id'];
    echo '</td>';
    echo '<td>';
    echo  $curseur['Nom'];
    echo '</td>';
    echo '<td>';
    echo  $curseur['Prenom'];
    echo '</td>';
    echo '<td>';
    echo  $curseur['Age'];
    echo '</td>';
    echo '<td>';
    echo  $curseur['Sexe'];
    echo '</td>';
    echo '<td>';
    echo  $curseur['Diplome'];
    echo '</td>';
    echo '<td>';
    echo  $curseur['Ville'];
    echo '</td>';
    echo '<td><img src="images/'.$curseur['Photo'].'" width="150" height="150">';
    echo '</td>';
    echo '<td>';
    echo  '<a href="edit.php?identifiant='.$curseur['id'].'">Edit</a>';
    echo '</td>';
    echo '<td>';
    echo  '<a href="Delete.php?identifiant='.$curseur['id'].'">Delete</a>';
    echo '</td></tr>';
    
    
    
}*/
 ?>
</table>
