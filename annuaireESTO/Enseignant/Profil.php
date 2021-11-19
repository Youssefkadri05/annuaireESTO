<?php include ('../accueil/ScriptPHP.php'); ?>
<!DOCTYPE html>
<html>
<head>
    <title>Profil</title>
    <link rel="stylesheet" type="text/css" href="../css/main.css">
</head>
<body>
 <header>
        <nav class="nav" id="menu">
            <img src="../images/logo_tiltle.png" class="logo">

          <ul>
  <li><a href="EnseignantAccueil.php">Accueil</a></li>
  <li><a href="Profil.php">Profil</a></li>
  <li><a href="../Accueil/deconnexion.php">Déconnexion</a></li>
</ul>
        </nav>
    </header>
    <div >
     
     <form method="POST"  class="formModifierEn">  
     <?php 
     $EN_EMAIL=$_SESSION['EMAIL_CONNECT'];
     $query_admin = "SELECT * FROM enseignant WHERE EN_EMAIL='$EN_EMAIL'";
     $result_admin = mysqli_query($connexion, $query_admin);
     if ($result_admin->num_rows > 0) {
      if ($row  = $result_admin->fetch_assoc()) {
      
      ?> 
                        <H1 align="center">Profil</H1>
                      <table>
                            <tr >
                              <td>
                                <label for="Nom">Nom :</label><br>
                                <input type="text" name="EN_NOM"  value="<?php echo $row["EN_NOM"];  ?>" required class="input_profileEN" >
                              </td>
                          </tr>
                          <tr>
                              <td>
                                <label for="Prénom">Prénom :</label><br>
                                <input type="text" name="EN_PRENOM"  value="<?php echo $row["EN_PRENOM"];  ?>" required class="input_profileEN" >
                              </td>
                                
                            </tr>
                            <tr>
                              <td>
                                <label for="CNE"> PPR:</label><br>
                                <input type="text" name="EN_PPR"  value="<?php echo $row["EN_PPR"];  ?>" required readonly class="input_profileEN" >
                              </td>
                            </tr>
                            <tr>
                              <td>
                               <label for="email">Email :</label><br>
                               <input type="email" name="EN_EMAIL"  value="<?php echo $row["EN_EMAIL"];  ?>" readonly required class="input_profileEN" >
                              </td>
                            </tr>
                            <tr>
                              <td>
                               <label for="Telephone">Telephone :</label><br>
                                <input type="tel" maxlength="10" pattern="[0-9]{10}" title="0-(5,6,7)-0000000" minlenght="10"  value="<?php echo $row["EN_TELEPHONE"];  ?>" name="EN_TELEPHONE" required class="input_profileEN" >
                                
                              </td>
                            </tr>
                            <tr>
                              <td  colspan="2">
                             <label for="password2">Description :</label><br>
                             <textarea required name="EN_DESCRIPTION"  style=" border: solid 1px #0ED5C9;  width: 500PX; height: 120px;"><?php echo $row["EN_DESCRIPTION"];  ?></textarea>
                              </td>
                            </tr>
                            <tr>
                              <td>
                                <input type="hidden" name="EN_PASSWORD" value="<?php echo $row["EN_PASSWORD"];  ?>">
                                <label for="password1">Nouveau Mot de passe(Optionnel) :</label><br>
                            <input type="password"  name="EN_PASSWORD1"  class="input_profileEN" >
                              </td>
                            </tr>
                            <tr>
                              <td>
                                <label for="password2">Confirmer le mot de passe :</label><br>
                            <input type="password"  name="EN_PASSWORD2" class="input_profileEN" >
                              </td>
                            </tr>
                            
                            <tr collspan="2">
                              <td>
                                
                            <button type="submit"  name="MODIFIER_PROFIL_ENSEIGANAT" class="submit"  id="submit" style="left: 20%; top: 30px;">Modifier</button>
                              </td>
                              <td>
                                <button type="button"   class="reset"  id="reset" onclick="javascript:history.back();" style="left: -340px; top: 30px;">Retour</button>  
                              </td>
                            </tr>
                        </table>
                         <span  style=" left: 10px; position: relative; top: -50px; color: red;" ><?php include ('../accueil/errors.php'); }}?></span>
                    </form>
                    <img src="../images/LOGOEN.PNG" style="position: absolute; bottom: 10px; left: 700px; width: 500px;height: 500px;">
                    
                    
  
    </div>
<?php require'../Accueil/footer.php'  ?>
    

</body>
</html>