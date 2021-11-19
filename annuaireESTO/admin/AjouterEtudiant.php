<?php include ('../ACCUEIL/ScriptPHP.php'); ?>
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
    <div style="position: relative;  margin-bottom: 70px; background-image: url('../images/Etudiant.jpg'); background-repeat: round;">
     
     <form method="POST"  >  
      <input type="hidden" name="FORM" value="ajouter">
     <?php include ('../ACCUEIL/errors.php'); ?> 
                        <H1 align="center">Ajouter un étudiant</H1>
                      <table>
                            <tr >
                              <td>
                                <label for="Nom">Nom :</label><br>
                                <input type="text" name="ET_NOM"  value="<?php echo $ET_NOM;  ?>" required class="input_profile" >
                              </td>
                              <td>
                                <label for="Prénom">Prénom :</label><br>
                                <input type="text" name="ET_PRENOM"  value="<?php echo $ET_PRENOM;  ?>" required class="input_profile" >
                              </td>
                                
                            </tr>
                            <tr class="tr">
                              <td>
                                <label for="CNE"> CNE:</label><br>
                                <input type="text" name="ET_CNE"  value="<?php echo $ET_CNE;  ?>" required class="input_profile" >
                              </td>
                              <td>
                                <label for="FILIERE"> Filière:</label><br>
                               <select name="ID_FILIERE"  required class="input_profile" >
                                    <option value="0" selected="" >--selectionner--</option>
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
                               <input type="email" name="ET_EMAIL"  value="<?php echo $ET_EMAIL;  ?>" required class="input_profile" >
                                
                              </td>
                              <td>
                                <label for="Telephone">Telephone :</label><br>
                                <input type="tel" maxlength="10" pattern="[0-9]{10}" title="0-(5,6,7)-0000000" minlenght="10"  value="<?php echo $ET_TELEPHONE;  ?>" name="ET_TELEPHONE" required class="input_profile" >
                              </td>
                            </tr>
                         
                            <tr>
                              <td>
                                <label for="password1">Mot de passe :</label><br>
                            <input type="password" required name="ET_PASSWORD1"  class="input_profile" >
                              </td>
                              <td>
                                <label for="password2">Confirmer le mot de passe :</label><br>
                            <input type="password" required name="ET_PASSWORD2" class="input_profile" >
                              </td>
                            </tr>
                            <tr>
                              <td  colspan="2">
                             <label for="password2">Description :</label><br>
                             <textarea required name="ET_DESCRIPTION"  style=" border: solid 1px #0ED5C9;  width: 690PX; height: 120px;"><?php echo $ET_DESCRIPTION;  ?></textarea>
                              </td>
                            </tr>
                            <tr collspan="2">
                              <td>
                                
                            <button type="submit"  name="Inscription" class="submit"  id="submit">Ajouter</button>
                              </td>
                            </tr>
                            
                        
                        
                        </table>
                    </form>
                    
  
    </div>
<?php require'../Accueil/footer.php'  ?>
    

</body>
</html>