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

    <div >
     
     <form method="POST"  class="formADMIN">  
     <?php 

     $EMAIL=$_SESSION['EMAIL_CONNECT'];
     
     $query_admin = "SELECT * FROM administrateur WHERE EMAIL='$EMAIL'";
     $result_admin = mysqli_query($connexion, $query_admin);
     if ($result_admin->num_rows > 0) {
      if ($row  = $result_admin->fetch_assoc()) {
      
      ?> 
                        <H1 align="center">Mon profil</H1>
                      <table>
                            <tr >
                              <td>
                                <label for="Nom">Nom :</label><br>
                                <input type="text" name="NOM"  value="<?php echo $row["NOM"];  ?>" required class="input_Profil_ADMIN" >
                              </td>
                              <td>
                                <label for="Prénom">Prénom :</label><br>
                                <input type="text" name="PRENOM"  value="<?php echo $row["PRENOM"];  ?>" required class="input_Profil_ADMIN" >
                              </td>
                          </tr>
                            <tr>
                              <td>
                                <label for="CNE"> CNE:</label><br>
                                <input type="text" name="CNE"  value="<?php echo $row["CNE"];  ?>" required class="input_Profil_ADMIN" readonly >
                              </td>
                              <td>
                               <label for="email">Email :</label><br>
                               <input type="email" name="EMAIL"  value="<?php echo $row["EMAIL"];  ?>" required class="input_Profil_ADMIN" readonly>
                              </td>
                            </tr>
                            <tr>
                              <td>
                                <input type="hidden" name="PASSWORD" value="<?php echo $row["PASSWORD"];  ?>" >
                                <label for="password1">Mot de passe (Obligatoire) :</label><br>
                            <input type="password" required name="PASSWORD1"  class="input_Profil_ADMIN" >
                              </td>

                               <td>
                                <label for="password2">Nouveau mot de passe (Optionnel) :</label><br>
                            <input type="password"  name="PASSWORD2" class="input_Profil_ADMIN" >

                              </td>
                            </tr>                        
                            <tr collspan="2">
                              <td>
                                
                            <button type="submit"  name="MODIFIER_ADMIN_PROFIL" class="submit"  id="submit" style="left: 55%; top: 30px;">Modifier</button>
                              </td>
                              <td>
                                <button type="button"   class="reset"  id="reset" onclick="javascript:history.back();" style="left: -35px; top: 30px;">Retour</button>  
                              </td>
                            </tr>
                        </table>
                        <span  style=" left: 10px; position: relative; top: -50px; color: red;" ><?php include ('../accueil/errors.php'); ?></span>
                      <?php }} ?>
                    </form>
                     <img src="../images/admin.png" class="Image_Profil">
                    
  
    </div>
<?php require'../Accueil/footer.php'  ?>
  1

</body>
</html>