<?php include ('../accueil/ScriptPHP.php'); ?>
<!DOCTYPE html>
<html>
<head>
    <title>Accueil</title>
    <link rel="stylesheet" type="text/css" href="../css/main.css">
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
    <div style="position: relative;  margin-bottom: 70px; background-image: url('../images/Fonctionnaire.jpg'); background-repeat: round;">
     
     <form method="POST"  class="formEN">  
      <input type="hidden" name="FORM" value="ajouter">
     <?php include ('../accueil/errors.php'); ?> 
                        <H1 align="center">Ajouter fonctionnaire</H1>
                      <table>
                            <tr >
                              <td>
                                <label for="Nom">Nom :</label><br>
                                <input type="text" name="F_NOM"  value="<?php echo $F_NOM;  ?>" required class="input_profileEN" >
                              </td>
                          </tr>
                          <tr>
                              <td>
                                <label for="Prénom">Prénom :</label><br>
                                <input type="text" name="F_PRENOM"  value="<?php echo $F_PRENOM;  ?>" required class="input_profileEN" >
                              </td>
                                
                            </tr>
                            <tr>
                              <td>
                                <label for="CNE"> PPR:</label><br>
                                <input type="text" name="F_PPR"  value="<?php echo $F_PPR;  ?>" required class="input_profileEN" >
                              </td>
                            </tr>
                            <tr>
                              <td>
                               <label for="email">Email :</label><br>
                               <input type="email" name="F_EMAIL"  value="<?php echo $F_EMAIL;  ?>" required class="input_profileEN" >
                              </td>
                            </tr>
                            <tr>
                              <td>
                               <label for="Telephone">Telephone :</label><br>
                                <input type="tel" maxlength="10" pattern="[0-9]{10}" title="0-(5,6,7)-0000000" minlenght="10"  value="<?php echo $F_TELEPHONE;  ?>" name="F_TELEPHONE" required class="input_profileEN" >
                                
                              </td>
                            </tr>

                            <tr>
                              <td>
                                <label for="password1">Mot de passe :</label><br>
                            <input type="password" required name="F_PASSWORD1"  class="input_profileEN" >
                              </td>
                            </tr>
                            <tr>
                              <td>
                                <label for="password2">Confirmer le mot de passe :</label><br>
                            <input type="password" required name="F_PASSWORD2" class="input_profileEN" >
                              </td>
                            </tr>
                            <tr>
                              <td  colspan="2">
                             <label for="password2">Description :</label><br>
                             <textarea required name="F_DESCRIPTION"  style=" border: solid 1px #0ED5C9;  width: 500PX; height: 120px;"><?php echo $ET_DESCRIPTION;  ?></textarea>
                              </td>
                            </tr>
                            <tr collspan="2">
                              <td>
                                
                            <button type="submit"  name="InscriptionF" class="submit"  id="submit" style="left: 40%;">je m'inscris</button>
                              </td>
                            </tr>
                            
                        
                        
                        </table>
                    </form>
                    
  
    </div>
<?php require'../Accueil/footer.php'  ?>
    

</body>
</html>