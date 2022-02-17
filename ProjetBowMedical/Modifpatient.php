<!DOCTYPE html>
<html>
<head>
    <title>Modif de du patient</title>
    <link rel="stylesheet" href="style.css" />
    <meta charset="utf-8" />
</head>
    <body>
    <nav>
        <ul class="nav-list">
            <li class="nav-item"><a href='Index.php'>Acceuil</a></li>
            <li class="nav-item"><a href='EnregistrementPatient.php'>Enregistrer un patient</a></li>
            <li class="nav-item"><a href='Listepatient.php'>Liste des patients</a></li>

        </ul>
    </nav>
    <?php
              $bdd = new PDO('mysql:host=localhost;dbname=bowproject;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
              $réponse = $bdd->query('SELECT id FROM patient');
             ?>

    <div id='formulaire'>
          <form method="post" action="Modifpatient.php">

            <label><b>Nom</b></label><br />
            <input type="text" placeholder="Nom" name="nom"  value="<?php echo $_POST['nom'] ?>"> <br />


            </br>

            <label><b>Prénom</b></label><br />
            <input type="prenom" placeholder="Prénom" name="prenom"  value="<?php echo $_POST['prenom'] ?>"  ><br/>


            </br>

            <label><b>Date de Naissance</b></label><br />
            <input type="Date" name="datenaissance" value="<?php echo $_POST['datenaissance'] ?>"><br />



            </br>

            <label><b>Date d'intervention</b></label><br/>
            <input type="Date" name="dateintervention"  value="<?php echo $_POST['dateintervention'] ?>"  > <br/>



            </br>

            <label><b>Type d'Intervention</b></label><br/>
            <input type="text" placeholder="Type d'Intervention" name="typeintervention" value="<?php echo $_POST['typeintervention'] ?>" ><br/>

            </br>
            </br>

            <label><b>Localisation</b></label><br/>
            <input type="text" placeholder="localisation" name="localisation" value="<?php echo $_POST['localisation'] ?>" ><br/>

            </br>
            </br>
            <input type="hidden" name="id" value="<?php echo $_POST['id'] ?>">
            <input type="submit"  value="Mettre à jour" name="maj"> <br />
        </form>
    </div>

        <?php
            if (!empty($_POST['maj']))
             {
                 $bdd = new PDO('mysql:host=localhost;dbname=bowproject;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
                 $requete = $bdd->prepare('UPDATE patient SET nom,prenom,datenaissance,dateintervention,typeintervention,localisation WHERE id = :id)  VALUES(?,?,?,?,?,?,?)');
                  $requete->execute(array($_POST['nom'],$_POST['prenom'],$_POST['datenaissance'],$_POST['dateintervention'],$_POST['typeintervention'],$_POST['localisation'],$_POST['id']));
                 echo "Modification faite";
              } ?>
    </body>
</html>