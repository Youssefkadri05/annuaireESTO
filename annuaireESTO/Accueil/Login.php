<?php include ('ScriptPHP.php'); ?>
<!DOCTYPE html>
<html>
<head>
    <title>Accueil</title>
    <link rel="stylesheet" type="text/css" href="../css/main.css">
</head>
<body>
    <header>
        <nav class="nav" id="menu">
            <img src="../images/logo_tiltle.png" class="logo">

          <ul>
  <li><a href="../index.php">Accueil</a></li>
  <li><a href="#">Inscription</a>
    <ul>
      <li><a href="InscriptionEtudiant.php">Etudiant</a></li>
      <li><a href="InscriptionEnseignant.php">Enseignant</a></li>
      <li><a href="InscriptionFonctionnaire.php">Fonctionnaire</a></li>
    </ul>
  </li>
  <li><a href="Login.php">Connexion</a></li>
</ul>
        </nav>
    </header>
    <div style="position: relative;  margin-bottom: 70px; background-repeat: round; ">
     <img src="../images/login.png" style="width: 300px; height: 300px; position: absolute; left: 20%;">
     <form method="POST"  class="formLg">  
         <?php include ('errors.php'); ?> 
                        <H1 align="center">Connexion</H1>

                      <table>
                                       
                            <tr>
                              <td>
                               <label for="email">Email :</label><br>
                               <input type="email" name="EMAIL"  value="<?php echo $EN_EMAIL;  ?>" required class="input_profileEN" >
                              </td>
                            </tr>
                            <tr>
                              <td>
                                <label for="password1">Mot de passe :</label><br>
                            <input type="password" required name="PASSWORD"  class="input_profileEN" >
                              </td>
                            </tr>
                            <tr >
                              <td>
                                <button type="reset"  name="InscriptionEN" class="reset"  id="reset" style="left: 40%;">Réinstialiser</button>  
                                <button type="submit"  name="LOGIN" class="submit"  id="submit" style="left: 40%;">Je me connecte</button>
                              </td>
                            </tr>                      
                      </table>
       </form>
     </div>
<?php require'../Accueil/footer.php'  ?>
    

</body>
</html>