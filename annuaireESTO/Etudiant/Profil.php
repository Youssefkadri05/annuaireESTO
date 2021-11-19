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
  <li><a href="EtudiantAccueil.php">Accueil</a></li>
  <li><a href="Profil.php">Profil</a></li>
  <li><a href="../Accueil/deconnexion.php">Déconnexion</a></li>
</ul>
        </nav>
    </header>
    <div >
     
     <form method="POST" class="FormModifierEtudiant" >   
      <?php 
     $ET_EMAIL=$_SESSION['EMAIL_CONNECT'];
     $query_admin = "SELECT * FROM Etudiant WHERE ET_EMAIL='$ET_EMAIL'";
     $result_admin = mysqli_query($connexion, $query_admin);
     if ($result_admin->num_rows > 0) {
      if ($row  = $result_admin->fetch_assoc()) {
      
      ?> 
                        <H1 align="center">Profil</H1>
                      <table>
                            <tr >
                              <td>
                                <label for="Nom">Nom :</label><br>
                                <input type="text" name="ET_NOM"  value="<?php echo $row["ET_NOM"];  ?>" required class="input_profile" >
                              </td>
                              <td>
                                <label for="Prénom">Prénom :</label><br>
                                <input type="text" name="ET_PRENOM"  value="<?php echo $row["ET_PRENOM"];  ?>" required class="input_profile" >
                              </td>
                                
                            </tr>
                            <tr class="tr">
                              <td>
                                <label for="CNE"> CNE:</label><br>
                                <input type="text" name="ET_CNE"  value="<?php echo $row["ET_CNE"];  ?>" required readonly class="input_profile" >
                              </td>
                              <td>
                                <label for="FILIERE"> Filière:</label><br>
                                <select name="ID_FILIERE"  required class="input_profile" >
                                    <option value="<?php echo $row["ID_FILIERE"];  ?>" selected><?php echo $row["ET_FILIERE"];  ?></option>
                                    <optgroup label="-------------------------------------------------------------------------------------">
                                  </optgroup>
                                    <optgroup label="DUT">
                                      <?php $query_admin1 = "SELECT * FROM Filiere order by ID_FILIERE asc limit 16 ";
                                         $result_admin1 = mysqli_query($connexion, $query_admin1);
                                         if ($result_admin1->num_rows > 0) {
                                          while ($row1  = $result_admin1->fetch_assoc()) {
                                         ?> 
                                    <option value="<?php echo $row1["ID_FILIERE"];  ?>" ><?php echo $row1["FILIERE"];  ?></option>
                                 <?php }} ?>
                                  </optgroup>
                                   <optgroup label="LP">
                                   <?php $query_admin2 = "SELECT * FROM Filiere WHERE ID_FILIERE > 16 order by ID_FILIERE  ";
                                         $result_admin2 = mysqli_query($connexion, $query_admin2);
                                         if ($result_admin2->num_rows > 0) {
                                          while ($row2  = $result_admin2->fetch_assoc()) {
                                         ?> 
                                    <option value="<?php echo $row2["ID_FILIERE"];  ?>" ><?php echo $row2["FILIERE"];  ?></option>
                                 <?php }} ?>
                                  </optgroup>
                                </select>
                              </td>
                            </tr>
                            <tr>
                              <td>
                               <label for="email">Email :</label><br>
                               <input type="email" name="ET_EMAIL"  value="<?php echo $row["ET_EMAIL"];  ?>" required readonly class="input_profile" >
                                
                              </td>
                              <td>
                                <label for="Telephone">Telephone :</label><br>
                                <input type="tel" maxlength="10" pattern="[0-9]{10}" title="0-(5,6,7)-0000000" minlenght="10"  value="<?php echo $row["ET_TELEPHONE"];  ?>" name="ET_TELEPHONE" required class="input_profile" >
                              </td>
                            </tr>
                         
                            <tr>
                              <td>
                                <input type="hidden" name="ET_PASSWORD" value="<?php echo $row["ET_PASSWORD"];  ?>">
                                <label for="password1">Mot de passe :</label><br>
                            <input type="password"  name="ET_PASSWORD1"  class="input_profile" >
                              </td>
                              <td>
                                <label for="password2">Confirmer le mot de passe :</label><br>
                            <input type="password"  name="ET_PASSWORD2" class="input_profile" >
                              </td>
                            </tr>
                            <tr>
                              <td  colspan="2">
                             <label for="password2">Description :</label><br>
                             <textarea required name="ET_DESCRIPTION"  style=" border: solid 1px #0ED5C9;  width: 690PX; height: 120px;"><?php echo $row["ET_DESCRIPTION"];  ?></textarea>
                              </td>
                            </tr>
                            <tr collspan="2">
                              <td>
                                
                            <button type="submit"  name="MODIFIER_PROFIL_ETUDIANT" class="submit"  id="submit" style="left: 55%; top: 30px;">Modifier</button>
                              </td>
                              <td>
                                <button type="button"   class="reset"  id="reset" onclick="javascript:history.back();" style="left: -35px; top: 30px;">Retour</button>  
                              </td>
                            </tr>
                        </table>
                         <span  style=" left: 10px; position: relative; top: -50px; color: red;" ><?php include ('../accueil/errors.php'); }}?></span>
                      
                    </form>
                  <img src="../images/LOGOET.PNG" style="position: absolute; bottom: 50px; left: 800px;">
                    
  
    </div>
<?php require'../Accueil/footer.php'  ?>
    

</body>
</html>