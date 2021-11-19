<?php include ('../Accueil/ScriptPHP.php'); ?>
<!DOCTYPE html>
<html>
<head>
    <title>Accueil</title>
    <link rel="stylesheet" type="text/css" href="../css/main.css">
    <script type="text/javascript" src="../js/script.js"></script>
    <script type="text/javascript">
    	
    	function confirme_etudiant( cne )
		{
		var confirmation = confirm( "Voulez vous vraiment supprimer cet étudiant ?" ) ;
		if( confirmation )
		{
		document.location.href = "../Accueil/scriptPHP.php?ID_SUPPRIMER="+cne ;
		}
		}
    </script>
</head>
<body>
  <header>
        <nav class="nav" id="menu1">
            <img src="../images/logo_tiltle.png" class="logo">

          <ul >
  <li><a href="AdminAccueil.php">Accueil</a></li>
  <li><a href="#" style="padding: 0; height: 45px; width:110px; padding-top: 10px;">Gérer les comptes</a>
    <ul>
      <li><a href="GestionDesEtudiants.php">Etudiant</a></li>
      <li><a href="GestionDesEnseigant.php">Enseignant</a></li>
      <li><a href="GestionDesFonctionnaire.php">Fonctionnaire</a></li>
    </ul>
  </li>
  <li><a href="Profil.php">Profil</a></li>
  <li><a href="../Accueil/deconnexion.php">Déconnexion</a></li>
</ul>
        </nav>
    </header>
    <div>
    	<H2 align="center">Listes des étudiants inscris(admis et no-admis)</H2>
     
   <table class="table1" >
    <tr class="colonne_bar">
      <td class="ceuille">
        CNE
      </td>
      <td class="ceuille">
        Nom complet
      </td>
      <td class="ceuille">
        Filière
      </td>
      <td class="ceuille">
        Email
      </td>
      <td class="ceuille">
        Téléphone
      </td>
      <td class="ceuille">
        Etat de l'inscription
      </td>
      <td class="ceuille">
     <a href="ajouterEtudiant.php"> <img src="../images/ajouter.png" style="width: 50px; height: 50px;" title="Ajouter un étudiant"></a>
      </td>
    </tr>
    
    
                        <?php

                               $query2 = "SELECT * FROM etudiant order by ET_ETAT_INSCRIPTION desc,ET_NOM  ";  
                               $result2 = mysqli_query($connexion, $query2);

                                  if ($result2->num_rows > 0) {
                                    while ($row  = $result2->fetch_assoc()) {
                                      $ID_FILIERE=$row["ID_FILIERE"];
                                      $query3 = "SELECT * FROM Filiere where ID_FILIERE='$ID_FILIERE' ";  
                                      $result3 = mysqli_query($connexion, $query3);
                                      if ($row3  = $result3->fetch_assoc()) {
                                      ?>
                                   
                                        

<form method="GET" >
    <tr class="colonne_simple"> 
           <td class="ceuille" data-title="Age"> 
                <?php echo $row["ET_CNE"]; ?> </td> 

            <td class="ceuille" data-title="Age"> <?php echo $row["ET_NOM"].' '.$row["ET_PRENOM"]; ?> </td> 

            <td class="ceuille" data-title="Age"><?php echo $row3["FILIERE"] ;?> </td> 

            <td class="ceuille"  ><?php echo $row["ET_EMAIL"]; ?></td>  
            <td class="ceuille"  ><?php echo $row["ET_TELEPHONE"]; ?></td> 
            <td class="ceuille"  ><?php echo $row["ET_ETAT_INSCRIPTION"]; ?></td>
            <td class="ceuille" data-title="Age">
            	<?php if ($row["ET_ETAT_INSCRIPTION"]=="En cours de vérification") {
            		?>
            	
                <a href="../Accueil/ScriptPHP.php?CNE_VALIDER=<?php echo $row["ET_CNE"]; ?>">
                  <img class="gener_image" title ="Valider" src="../images/details1.png">
                </a><br>
            	<?php } ?>

                <a href="modifierEtudiant.php?CNE_MODIFIER=<?php echo $row["ET_CNE"]; ?>">
                  <img class="gener_image" title="Modifier" src="../images/modifier1.png">
                </a><br>
                <a  href="#" onclick="confirme_etudiant(<?php echo $row["ID_ETUDIANT"]; ?>)">
                  <img class="gener_image" title="Supprimer" src="../images/supprimer.jpg" >
                </a>
          </td>
  </tr>

</form>
 <?php 
 }}}
  ?>
    
  </table>


</div>
   
<?php require'../Accueil/footer.php'  ?>
    

</body>
</html>