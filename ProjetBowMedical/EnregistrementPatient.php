<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="style.css" />
	<meta charset="UTF-8">
	<title>Formulaire Patient</title>
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
    $bdd = new PDO('mysql:host=localhost;dbname=bowproject;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));//appel de la base au début pour ne plus la rappeler
?>
<h2>Formulaire du Patient :</h2>
</br>
<div id='main'>
	<form action="EnregistrementPatient.php" method="post">

		<label><b>Nom</b></label><br />
		<input type="text" placeholder="Nom" name="nom" required><br />


		</br>

		<label><b>Prénom</b></label><br />
		<input type="prenom" placeholder="Prénom" name="prenom"  required><br/>


		</br>

		<label><b>Date de Naissance</b></label><br />
		<input type="Date" name="datenaissance" required ><br />



		</br>

		<label><b>Date d'intervention</b></label><br/>
		<input type="Date" name="dateintervention"   required>  <br/>



		</br>

		<label><b>Type d'Intervention</b></label><br/>
		<input type="text" placeholder="Type d'Intervention" name="typeintervention"  required><br/>

		</br>
		</br>

		<input type="radio" name="sexe" value="1" id="Homme" /> <label for="Homme">Homme</label>
		<input type="radio" name="sexe" value="0" id="Femme" checked="checked"/> <label for="Femme">Femme</label>

		</br>
		</br>

		<button type="submit">Enregistrer</button> <br />
	</form>
</div>

<?php
	if(!empty($_POST['localisation']))
	{
		$requete = $bdd->prepare('INSERT INTO patient(nom,prenom,datenaissance,dateintervention,sexe,typeintervention,localisation) VALUES(?,?,?,?,?,?,?)');
		$requete->execute(array($_POST['nom'], $_POST['prenom'], $_POST['datenaissance'], $_POST['dateintervention'], $_POST['sexe'], $_POST['typeintervention'], $_POST['localisation']));
		 echo "Ajout de la localisation : ";
	}
	        if (!empty($_POST['nom']))
	    {

			if($_POST['dateintervention']==date("Y-m-d") )// condition pour faire apparaitre la case de la localisation
			{
                echo '</br>';
				echo "La date d'intervention est aujourd'hui veillez à indiquer le lieu : ";
                ?> </br>
				  <form method="post" action="EnregistrementPatient.php">
                      </br>
					   Localisation : <input type="text" name="localisation" value="" required>
						 <input type="hidden" name="nom" value="<?php echo $_POST['nom'] ?>">
						 <input type="hidden" name="prenom" value="<?php echo $_POST['prenom'] ?>">
						 <input type="hidden" name="datenaissance" value="<?php echo $_POST['datenaissance'] ?>">
						 <input type="hidden" name="dateintervention" value="<?php echo $_POST['dateintervention'] ?>">
						 <input type="hidden" name="typeintervention" value="<?php echo $_POST['typeintervention'] ?>">
						 <input type="hidden" name="sexe" value="<?php echo $_POST['sexe'] ?>">
					 <input type="submit" name="valider" value="Valider la localisation">


                <?php
			}
            else
            {
				$requete = $bdd->prepare('INSERT INTO patient(nom,prenom,datenaissance,dateintervention,sexe,typeintervention) VALUES(?,?,?,?,?,?)');
				$requete->execute(array($_POST['nom'], $_POST['prenom'], $_POST['datenaissance'], $_POST['dateintervention'], $_POST['sexe'],$_POST['typeintervention']));
				echo "Ajout du patient : ";

			}
	    }
?>

</body>
</html>