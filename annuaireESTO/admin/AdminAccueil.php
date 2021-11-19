<?php include ('../Accueil/ScriptPHP.php'); ?>
<!DOCTYPE html>
<html>
<head>
    <title>Accueil</title>
    <link rel="stylesheet" type="text/css" href="../css/main.css">
    <script type="text/javascript" src="../js/script.js"></script>
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
    <div class="div_de_recherche">
     <img src="../images/back3.jpg" class="image_de_recherche">
      <input id="recherche_input"  class="input_de_recherche" type="text" name="" placeholder="Recherchez par email,telephone,nom complet" title="Le nom et le prénom ne  doivent être séparés que par un seul espace ">
        <button class="button_de_recherche" type="button" onclick="FunctionValue()">Recherche</button>
        <div class="div_de_resultat">            
              <?php
                    $Nom="";
                    $Prenom="";
                    $Email="";
                    $Telephone="";
                    $Type="";
               if (isset($_GET['MOT_RECHERCHE']))
                {
                  $mot=$_GET['MOT_RECHERCHE'];
                 
                  if ($mot==""){
              
                       }
                  $Nom_complet=explode(" ", $mot);
                  if (sizeof($Nom_complet)>=2) {
                  $nom=$Nom_complet[0];
                  $prenom=$Nom_complet[1];
                }
                else
                {
                  $nom="";
                  $prenom="";
                }
               
                   $query2 = "SELECT * FROM etudiant where ET_EMAIL='$mot' or ET_TELEPHONE='$mot' or (ET_NOM='$nom' and ET_PRENOM='$prenom') or (ET_NOM='$prenom' and ET_PRENOM='$nom') ";  
                   $result2 = mysqli_query($connexion, $query2);
                   
                   $query3 = "SELECT * FROM Fonctionnaire where F_EMAIL='$mot' or F_TELEPHONE='$mot' or (F_NOM='$nom' and F_PRENOM='$prenom') or (F_NOM='$prenom' and F_PRENOM='$nom') ";  
                   $result3 = mysqli_query($connexion, $query3);
                   
                   $query4 = "SELECT * FROM Enseignant where EN_EMAIL='$mot' or EN_TELEPHONE='$mot' or (EN_NOM='$nom' and EN_PRENOM='$prenom') or (EN_NOM='$prenom' and EN_PRENOM='$nom') ";
                   $result4 = mysqli_query($connexion, $query4);
                      if($row = mysqli_fetch_array($result2)){  
                      $Nom=$row["ET_NOM"];
                      $Prenom=$row["ET_PRENOM"];
                      $Email=$row["ET_EMAIL"];
                      $Telephone=$row["ET_TELEPHONE"];
                      $Type="Etudiant";
                    }
                    else  if($row = mysqli_fetch_array($result3)){  
                      $Nom=$row["F_NOM"];
                      $Prenom=$row["F_PRENOM"];
                      $Email=$row["F_EMAIL"];
                      $Telephone=$row["F_TELEPHONE"];
                      $Type="Fonctionnaire";
                    }
                    else  if($row = mysqli_fetch_array($result4)){  
                      $Nom=$row["EN_NOM"];
                      $Prenom=$row["EN_PRENOM"];
                      $Email=$row["EN_EMAIL"];
                      $Telephone=$row["EN_TELEPHONE"];
                      $Type="Enseiganat";
                    }

                    else{
                      echo "<script type='text/javascript'>
                             alert('Aucun résultat trouvé !');
                            </script>";

                      header('Refresh: 0; url=AdminAccueil.php');
                      
                    }
                  }


                  ?>

 
    
     <TABLE class="table1">
     <tr class="tr_resultat">
       <td class="colonne_bar">Nom:</td>
       <td class="colonne_simple"><?php echo $Nom ;?></td>
     </tr>
     <tr class="tr_resultat">
       <td class="colonne_bar">Prénom:</td>
       <td class="colonne_simple"><?php echo $Prenom ;?></td>
     </tr>
     <tr class="tr_resultat">
       <td class="colonne_bar">Email:</td>
       <td class="colonne_simple"><?php echo $Email ;?></td>
     </tr>
     <tr class="tr_resultat">
       <td class="colonne_bar">Téléphone:</td>
       <td class="colonne_simple"><?php echo $Telephone ;?></td>
     </tr>
     <tr class="tr_resultat">
       <td class="colonne_bar">Type:</td>
       <td class="colonne_simple"><?php echo $Type ;?></td>
     </tr>
   </TABLE>

  

   
 </div>

</div>
   
<?php require'../Accueil/footer.php'  ?>
    

</body>
</html>