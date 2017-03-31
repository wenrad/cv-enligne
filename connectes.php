<?php
// Connexion à MySQL
$host="sql310.byethost3.com";
$user="b3_13575534";
$password="wenrad1920";
$connection=mysql_connect($host,$user,$password);

$db="b3_13575534_radhwen";
mysql_select_db($db,$connection);


 
// -------
// ÉTAPE 1 : on vérifie si l'IP se trouve déjà dans la table.
// Pour faire ça, on n'a qu'à compter le nombre d'entrées dont le champ "ip" est l'adresse IP du visiteur.
$req = mysql_query('SELECT COUNT(*) AS nbre_entrees FROM connectes WHERE ip=\'' . $_SERVER['REMOTE_ADDR'] . '\'');
while ($res = mysql_fetch_array($req)){
    
if ($res['nbre_entrees'] == 0) // L'IP ne se trouve pas dans la table, on va l'ajouter.
{
    mysql_query('INSERT INTO connectes VALUES(\'' . $_SERVER['REMOTE_ADDR'] . '\', ' . time() . ')');
}
else // L'IP se trouve déjà dans la table, on met juste à jour le timestamp.
{
    mysql_query('UPDATE connectes SET timestamp=' . time() . ' WHERE ip=\'' . $_SERVER['REMOTE_ADDR'] . '\'');
}
}
 
 
// -------
// ÉTAPE 2 : on supprime toutes les entrées dont le timestamp est plus vieux que 5 minutes.
 
// On stocke dans une variable le timestamp qu'il était il y a 5 minutes :
$timestamp_5min = time() - (60 * 5); // 60 * 5 = nombre de secondes écoulées en 5 minutes
mysql_query('DELETE FROM connectes WHERE timestamp < ' . $timestamp_5min);
 
// -------
// ÉTAPE 3 : on compte le nombre d'IP stockées dans la table. C'est le nombre de visiteurs connectés.
$retour = mysql_query('SELECT COUNT(*) AS nbre_entrees FROM connectes');
while($donnees = mysql_fetch_array($retour)){
    // Ouf ! On n'a plus qu'à afficher le nombre de connectés !
echo '<p>Il y a actuellement ' . $donnees['nbre_entrees'] . ' visiteurs connectés sur mon site !</p>';
}

    

 

?>