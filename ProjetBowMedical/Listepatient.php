<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="style.css" />
    <meta charset="UTF-8">
    <title>Liste des Patients</title>
</head>
<body>
<nav>
    <ul class="nav-list">
        <li class="nav-item"><a href='Index.php'>Acceuil</a></li>
        <li class="nav-item"><a href='EnregistrementPatient.php'>Enregistrer un patient</a></li>
        <li class="nav-item"><a href='Listepatient.php'>Liste des patients</a></li>

    </ul>
</nav>
    <table border='1'>
        <tr>
            <th>id</th>
            <th> Nom </th>
            <th> Prénom </th>
            <th> Date de naissance </th>
            <th> Date d'intervention </th>
            <th> Type intervention </th>
            <th> Localisation </th>
            <th>Sexe</th>
        </tr>


        <?php
            $bdd = new PDO('mysql:host=localhost;dbname=bowproject;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
             $réponse = $bdd->query('SELECT * FROM patient');//On récup les données dans la bdd
                 while ($donnée = $réponse->fetch())
                 { //fetch pour récup une ligne a chaque fois
                     echo '<tr>
                                 <td>' . $donnée['id'] . '</td>
                                 <td>' . $donnée['nom'] . '</td>
                                 <td>' . $donnée['prenom'] . '</td>
                                 <td>' . $donnée['datenaissance'] . '</td>
                                 <td>' . $donnée['dateintervention'] . '</td>
                                 <td>' . $donnée['typeintervention'] . '</td>
                                 <td>' . $donnée['localisation'] . '</td>';

                             if ($donnée['sexe'] == '1')
                             {
                                    echo "<td>Homme</td>";
                             }
                                else
                                 {
                                     echo "<td>Femme</td>";
                                 }

                                ?>
                    <td> <form method="post" action="Modifpatient.php">
                                 <input type="hidden" name="id" value="<?php echo $donnée['id'] ?>">
                                 <input type="hidden" name="nom" value="<?php echo $donnée['nom'] ?>">
                                 <input type="hidden" name="prenom" value="<?php echo $donnée['prenom'] ?>">
                                 <input type="hidden" name="datenaissance" value="<?php echo $donnée['datenaissance'] ?>">
                                 <input type="hidden" name="dateintervention" value="<?php echo $donnée['dateintervention'] ?>">
                                 <input type="hidden" name="typeintervention" value="<?php echo $donnée['typeintervention'] ?>">
                                 <input type="hidden" name="sexe" value="<?php echo $donnée['sexe'] ?>">
                                 <input type="hidden" name="localisation" value="<?php echo $donnée['localisation'] ?>">
                                 <input type="submit" name="valider" value="Modifier">
                        </form> </td>

                     <td>
                         <form method="post" action="Listepatient.php">
                            <input type="hidden" name="id_supp" value="<?php echo $donnée['id']; ?>">
                            <input type="submit" name="supp" value="Supprimer">
                         </form>
                     </td>
                    <?php


                 }
                         echo "</tr> </table>";

                 if (!empty($_POST['supp']))
               {

                 $requete = $bdd->prepare('DELETE FROM patient WHERE id = :id');
                 $requete->execute(array('id' => $_POST['id_supp']));

                }
        ?>





</body>
</html>