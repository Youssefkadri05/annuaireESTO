<?php include ('../Accueil/ScriptPHP.php'); ?>
<!DOCTYPE html>
<html>
<head>
    <title>Accueil</title>
    <link rel="stylesheet" type="text/css" href="../css/main.css">
    <script type="text/javascript">
        function FunctionValue1(){
                valuer=document.getElementById('recherche_input').value;
                document.location.href = "../Etudiant/EtudiantAccueil.php?MOT_RECHERCHE="+valuer ;
            
}
    </script>
</head>
<body>
   <header>
        <nav class="nav" id="menu">
            <img src="../images/logo_tiltle.png" class="logo">

          <ul>
  <li><a href="EtudiantAccueil.php">Accueil</a></li>
  <li><a href="Profil.php">Profil</a></li>
  <li><a href="../Accueil/deconnexion.php">Déconnexion</a></li>
</ul>
        </nav>
    </header>
    <div class="div_de_recherche">
     <img src="../images/back3.jpg" class="image_de_recherche">
     <H2 style="position: absolute; top: 0px; color: #66a3ff; left: 190px; border: #66a3ff solid 1px; padding: 15px; font-size: 25px; width: 70%; background: white;">Bienvenue notre cher étudiant <?php echo strtoupper($_SESSION['NOM_CONNECT']).' '.$_SESSION['PRENOM_CONNECT'];?> vous pouvez rechercher l’adresse e-mail de n’importe quel membre et l'inverse </H2>       
 <input id="recherche_input"  class="input_de_recherche" type="text" name="" placeholder="Recherchez par email,telephone,nom complet" title="Le nom et le prénom ne doivent être séparés que par un seul espace ">
 <button class="button_de_recherche" type="button" onclick="FunctionValue1()">Recherche</button>
  <div class="div_de_resultat">  
                   
              <?php

              $Nom="";
              $Prenom="";
              $Email="";
              $Description="";
              $Type="";
               if (isset($_GET['MOT_RECHERCHE']))
           {
      

            $mot=$_GET['MOT_RECHERCHE'];
            if ($mot=="") {
              
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
               
                   $query2 = "SELECT * FROM etudiant where ET_EMAIL='$mot'  or (ET_NOM='$nom' and ET_PRENOM='$prenom') or (ET_NOM='$prenom' and ET_PRENOM='$nom') ";  
                   $result2 = mysqli_query($connexion, $query2);
                   
                   $query3 = "SELECT * FROM Fonctionnaire where F_EMAIL='$mot'  or (F_NOM='$nom' and F_PRENOM='$prenom') or (F_NOM='$prenom' and F_PRENOM='$nom') ";  
                   $result3 = mysqli_query($connexion, $query3);
                   
                   $query4 = "SELECT * FROM Enseignant where EN_EMAIL='$mot'  or (EN_NOM='$nom' and EN_PRENOM='$prenom') or (EN_NOM='$prenom' and EN_PRENOM='$nom') ";
                   $result4 = mysqli_query($connexion, $query4);
                      if($row = mysqli_fetch_array($result2)){  
                      $Nom=$row["ET_NOM"];
                      $Prenom=$row["ET_PRENOM"];
                      $Email=$row["ET_EMAIL"];
                      $Description=$row["ET_DESCRIPTION"];
                      $Type="Etudiant";
                    }
                    else  if($row = mysqli_fetch_array($result3)){  
                      $Nom=$row["F_NOM"];
                      $Prenom=$row["F_PRENOM"];
                      $Email=$row["F_EMAIL"];
                      $Description=$row["F_DESCRIPTION"];
                      $Type="Fonctionnaire";
                    }
                    else  if($row = mysqli_fetch_array($result4)){  
                      $Nom=$row["EN_NOM"];
                      $Prenom=$row["EN_PRENOM"];
                      $Email=$row["EN_EMAIL"];
                      $Description=$row["EN_DESCRIPTION"];
                      $Type="Enseiganat";
                    }

                    else{
                      echo "<script type='text/javascript'>
                             alert('Aucun résultat trouvé !');
                            </script>";

                      header('Refresh: 0; url=EtudiantAccueil.php');
                      
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
       <td class="colonne_bar">Type:</td>
       <td class="colonne_simple"><?php echo $Type ;?></td>
     </tr>
      <tr class="tr_resultat">
       <td class="colonne_bar">Description:</td>
       <td class="colonne_simple"><?php echo $Description ;?></td>
     </tr>
   </TABLE>

  

   
 </div>

</div>
   
<?php require'../Accueil/footer.php'  ?>
    

</body>
</html>