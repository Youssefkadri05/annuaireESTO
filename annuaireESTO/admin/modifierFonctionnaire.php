<?php include ('../accueil/ScriptPHP.php'); ?>
<!DOCTYPE html>
<html>
<head>
    <title>Modifier : Fonctionnaire</title>
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
     
     <form method="POST"  class="formModifierEn">  

     	 <?php 

     $F_PPR=$_GET['F_PPR_MODIFIER'];
     
     $query_admin = "SELECT * FROM Fonctionnaire WHERE F_PPR='$F_PPR'";
     $result_admin = mysqli_query($connexion, $query_admin);
     if ($result_admin->num_rows > 0) {
      if ($row  = $result_admin->fetch_assoc()) {
      
      ?> 
                        <H1 align="center">Modifier(Fonctionnaire)</H1>
                      <table>
                            <tr >
                              <td>
                                <label for="Nom">Nom :</label><br>
                                <input type="text" name="F_NOM"  value="<?php echo $row["F_NOM"];  ?>" required class="input_profileEN" >
                              </td>
                          </tr>
                          <tr>
                              <td>
                                <label for="Prénom">Prénom :</label><br>
                                <input type="text" name="F_PRENOM"  value="<?php echo $row["F_PRENOM"];  ?>" required class="input_profileEN" >
                              </td>
                                
                            </tr>
                            <tr>
                              <td>
                                <label for="CNE"> PPR:</label><br>
                                <input type="text" name="F_PPR"  value="<?php echo $row["F_PPR"];  ?>" required readonly class="input_profileEN" >
                              </td>
                            </tr>
                            <tr>
                              <td>
                               <label for="email">Email :</label><br>
                               <input type="email" name="F_EMAIL"  value="<?php echo $row["F_EMAIL"];  ?>" readonly required class="input_profileEN" >
                              </td>
                            </tr>
                            <tr>
                              <td>
                               <label for="Telephone">Telephone :</label><br>
                                <input type="tel" maxlength="10" pattern="[0-9]{10}" title="0-(5,6,7)-0000000" minlenght="10"  value="<?php echo $row["F_TELEPHONE"];  ?>" name="F_TELEPHONE" required class="input_profileEN" >
                                
                              </td>
                            </tr>
                            <tr>
                              <td  colspan="2">
                             <label for="password2">Description :</label><br>
                             <textarea required name="F_DESCRIPTION"  style=" border: solid 1px #0ED5C9;  width: 500PX; height: 120px;"><?php echo $row["F_DESCRIPTION"];  ?></textarea>
                              </td>
                            </tr>
                            <tr>
                              <td>
                              	<input type="hidden" name="F_PASSWORD" value="<?php echo $row["F_PASSWORD"];  ?>">
                                <label for="password1">Nouveau Mot de passe(Optionnel) :</label><br>
                            <input type="password"  name="F_PASSWORD1"  class="input_profileEN" >
                              </td>
                            </tr>
                            <tr>
                              <td>
                                <label for="password2">Confirmer le mot de passe :</label><br>
                            <input type="password"  name="F_PASSWORD2" class="input_profileEN" >
                              </td>
                            </tr>
                            
                            <tr collspan="2">
                              <td>
                                
                            <button type="submit"  name="MODIFIER_ADMIN_FONCTIONNAIRE" class="submit"  id="submit" style="left: 20%; top: 30px;">Modifier</button>
                              </td>
                              <td>
                                <button type="button"   class="reset"  id="reset" onclick="javascript:history.back();" style="left: -340px; top: 30px;">Retour</button>  
                              </td>
                            </tr>
                        </table>
                         <span  style=" left: 10px; position: relative; top: -50px; color: red;" ><?php include ('../accueil/errors.php'); }}?></span>
                    </form>
                    <img src="../images/LOGOF.PNG" style="position: absolute; bottom: 10px; left: 700px; width: 400px;height: 500px;">
                    
  
    </div>
<?php require'../Accueil/footer.php'  ?>
    

</body>
</html>