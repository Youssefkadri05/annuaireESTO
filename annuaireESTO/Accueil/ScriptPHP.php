<?php
include ('connexion.php');
session_start();
$errors = array();


/*************************************************** Iscription Etudiant *************************************/

$ET_NOM = "";
$ET_PRENOM = "";
$ET_EMAIL = "";
$ET_CNE = "";
$ET_TELEPHONE = "";
$ID_FILIERE = "";
$ET_PASSWORD1 = "";
$ET_PASSWORD2 = "";
$ET_DESCRIPTION= "";

if (isset($_POST['Inscription']))
{
   $ET_NOM = mysqli_real_escape_string($connexion, $_POST['ET_NOM']);
   $ET_EMAIL = mysqli_real_escape_string($connexion, $_POST['ET_EMAIL']);
   $ET_CNE = mysqli_real_escape_string($connexion, $_POST['ET_CNE']);
   $ET_TELEPHONE = mysqli_real_escape_string($connexion, $_POST['ET_TELEPHONE']);
   $ID_FILIERE = mysqli_real_escape_string($connexion, $_POST['ID_FILIERE']);
   $ET_PASSWORD1 = mysqli_real_escape_string($connexion, $_POST['ET_PASSWORD1']);
   $ET_PASSWORD2 = mysqli_real_escape_string($connexion, $_POST['ET_PASSWORD2']);
   $ET_PRENOM = mysqli_real_escape_string($connexion, $_POST['ET_PRENOM']);
   $ET_DESCRIPTION = mysqli_real_escape_string($connexion, $_POST['ET_DESCRIPTION']);
   $FORM = mysqli_real_escape_string($connexion, $_POST['FORM']);
   
//Validation Du password
if($ET_PASSWORD1 != $ET_PASSWORD2 ){
   array_push($errors, "Erreur à la confirmation de mot de passe !");
    }
//verifier si il exist le mème nom d'utilisateur (ou l'email) exister sur la base de donnees
$user_verifier1 = "SELECT * FROM etudiant WHERE ET_EMAIL = '$ET_EMAIL' LIMIT 1 ";
$results1= mysqli_query($connexion, $user_verifier1);
$user1 = mysqli_fetch_assoc($results1);

if ($user1){
   
   if($user1['ET_EMAIL']=== $ET_EMAIL){array_push($errors,"Ce email déjat utiliser par un auter utilisateur !");}
}

$user_verifier2 = "SELECT * FROM fonctionnaire WHERE F_EMAIL = '$ET_EMAIL' LIMIT 1 ";
$results2= mysqli_query($connexion, $user_verifier2);
$user2 = mysqli_fetch_assoc($results2);

if ($user2){
   
   if($user2['F_EMAIL']=== $ET_EMAIL){array_push($errors,"Cet email déjat utilisé par un auter utilisateur !");}
}

$user_verifier3 = "SELECT * FROM enseignant WHERE EN_EMAIL = '$ET_EMAIL' LIMIT 1 ";
$results3= mysqli_query($connexion, $user_verifier3);
$user3 = mysqli_fetch_assoc($results3);

if ($user3){
   
   if($user3['EN_EMAIL']=== $ET_EMAIL){array_push($errors,"Cet email déjat utilisé par un auter utilisateur !");}
}

$user_verifier4 = "SELECT * FROM administrateur WHERE EMAIL = '$ET_EMAIL' LIMIT 1 ";
$results4= mysqli_query($connexion, $user_verifier4);
$user4 = mysqli_fetch_assoc($results4);

if ($user4){
   
   if($user4['EMAIL']=== $ET_EMAIL){array_push($errors,"Cet email déjat utilisé par un auter utilisateur !");}
}

$user_verifier5 = "SELECT * FROM etudiant WHERE ET_CNE = '$ET_CNE' LIMIT 1 ";
$results5= mysqli_query($connexion, $user_verifier5);
$user5 = mysqli_fetch_assoc($results5);

if ($user5){
   
   if($user5['ET_CNE']=== $ET_CNE){array_push($errors,"Cet CNE déjat utilisé par un auter utilisateur !");}
}

$user_verifier6 = "SELECT * FROM filiere WHERE ID_FILIERE = '$ID_FILIERE' LIMIT 1 ";
$results6= mysqli_query($connexion, $user_verifier6);
$user6 = mysqli_fetch_assoc($results6);

if ($user6){
   
   $ET_FILIERE=$user6['FILIERE'];
}

     if($ID_FILIERE==0 )
         {
           array_push($errors, "SVP selectionner un filière!");
         }

//crier le compte (pas d'ereur)
if(count($errors)==0){
   if ($FORM=="ajouter") {

     $ET_PASSWORD1 =md5($ET_PASSWORD2);//md5 crypter le mot de passe 
   $query = "INSERT INTO ETUDIANT (ET_PASSWORD,ET_EMAIL,ET_NOM,ET_PRENOM,ET_TELEPHONE,ID_FILIERE,ET_CNE,ET_DESCRIPTION,ET_FILIERE,ET_ETAT_INSCRIPTION) VALUES ('$ET_PASSWORD1','$ET_EMAIL','$ET_NOM','$ET_PRENOM','$ET_TELEPHONE','$ID_FILIERE','$ET_CNE','$ET_DESCRIPTION','$ET_FILIERE','admis')";
    mysqli_query($connexion,$query);

     echo "<script type='text/javascript'>
      alert('Compte ajoutée avec succès !');
   </script>";
   header('Refresh: 0; url=../admin/GestionDesEtudiants.php');
   }
   
   else{
         $ET_PASSWORD1 =md5($ET_PASSWORD2);//md5 crypter le mot de passe 
         $query = "INSERT INTO ETUDIANT (ET_PASSWORD,ET_EMAIL,ET_NOM,ET_PRENOM,ET_TELEPHONE,ID_FILIERE,ET_CNE,ET_DESCRIPTION,ET_FILIERE,ET_ETAT_INSCRIPTION) VALUES ('$ET_PASSWORD1','$ET_EMAIL','$ET_NOM','$ET_PRENOM','$ET_TELEPHONE','$ID_FILIERE','$ET_CNE','$ET_DESCRIPTION','$ET_FILIERE','En cours de vérification')";
          mysqli_query($connexion,$query);

         echo "<script type='text/javascript'>
            alert('Compte créé avec succès et envoyer à l administrateur pour le valider !');
               </script>";
        header('Refresh: 0; url=../index.php');
 } 
      


}
}

/*************************************************** Iscription Enseignat *************************************/

$EN_NOM = "";
$EN_PRENOM = "";
$EN_EMAIL = "";
$EN_PPR = "";
$EN_TELEPHONE = "";
$EN_PASSWORD1 = "";
$EN_PASSWORD2 = "";
$EN_DESCRIPTION= "";


 

if (isset($_POST['InscriptionEN']))
{
   $EN_NOM = mysqli_real_escape_string($connexion, $_POST['EN_NOM']);
   $EN_EMAIL = mysqli_real_escape_string($connexion, $_POST['EN_EMAIL']);
   $EN_PPR = mysqli_real_escape_string($connexion, $_POST['EN_PPR']);
   $EN_TELEPHONE = mysqli_real_escape_string($connexion, $_POST['EN_TELEPHONE']);
   $EN_PASSWORD1 = mysqli_real_escape_string($connexion, $_POST['EN_PASSWORD1']);
   $EN_PASSWORD2 = mysqli_real_escape_string($connexion, $_POST['EN_PASSWORD2']);
   $EN_PRENOM = mysqli_real_escape_string($connexion, $_POST['EN_PRENOM']);
   $EN_DESCRIPTION = mysqli_real_escape_string($connexion, $_POST['EN_DESCRIPTION']);
   $FORM = mysqli_real_escape_string($connexion, $_POST['FORM']);
   
//Validation Du password
if($EN_PASSWORD1 != $EN_PASSWORD2 ){
   array_push($errors, "Erreur à la confirmation de mot de passe !");
    }
//verifier si il exist le mème nom d'utilisateur (ou l'email) exister sur la base de donnees
$user_verifier1 = "SELECT * FROM etudiant WHERE ET_EMAIL = '$EN_EMAIL' LIMIT 1 ";
$results1= mysqli_query($connexion, $user_verifier1);
$user1 = mysqli_fetch_assoc($results1);

if ($user1){
   
   if($user1['ET_EMAIL']=== $EN_EMAIL){array_push($errors,"Ce email déjat utiliser par un auter utilisateur !");}
}

$user_verifier2 = "SELECT * FROM fonctionnaire WHERE F_EMAIL = '$EN_EMAIL' LIMIT 1 ";
$results2= mysqli_query($connexion, $user_verifier2);
$user2 = mysqli_fetch_assoc($results2);

if ($user2){
   
   if($user2['F_EMAIL']=== $EN_EMAIL){array_push($errors,"Cet email déjat utilisé par un auter utilisateur !");}
}

$user_verifier3 = "SELECT * FROM enseignant WHERE EN_EMAIL = '$EN_EMAIL' LIMIT 1 ";
$results3= mysqli_query($connexion, $user_verifier3);
$user3 = mysqli_fetch_assoc($results3);

if ($user3){
   
   if($user3['EN_EMAIL']=== $EN_EMAIL){array_push($errors,"Cet email déjat utilisé par un auter utilisateur !");}
}

$user_verifier4 = "SELECT * FROM administrateur WHERE EMAIL = '$EN_EMAIL' LIMIT 1 ";
$results4= mysqli_query($connexion, $user_verifier4);
$user4 = mysqli_fetch_assoc($results4);

if ($user4){
   
   if($user4['EMAIL']=== $EN_EMAIL){array_push($errors,"Cet email déjat utilisé par un auter utilisateur !");}
}

$user_verifier5 = "SELECT * FROM enseignant WHERE EN_PPR = '$EN_PPR' LIMIT 1 ";
$results5= mysqli_query($connexion, $user_verifier5);
$user5 = mysqli_fetch_assoc($results5);

if ($user5){
   
   if($user5['EN_PPR']=== $EN_PPR){array_push($errors,"Cet PPR déjat utilisé par un auter utilisateur !");}
}

$user_verifier6 = "SELECT * FROM fonctionnaire WHERE F_PPR = '$EN_PPR' LIMIT 1  ";
$results6= mysqli_query($connexion, $user_verifier6);
$user6 = mysqli_fetch_assoc($results6);

if ($user6){
   
   if($user6['F_PPR']=== $EN_PPR){array_push($errors,"Cet PPR déjat utilisé par un auter utilisateur !");}
}


//crier le compte (pas d'ereur)
if(count($errors)==0){
  if ($FORM=="ajouter") {
   $EN_PASSWORD1 =md5($EN_PASSWORD2);//md5 crypter le mot de passe 
   $query = "INSERT INTO enseignant (EN_PASSWORD,EN_EMAIL,EN_NOM,EN_PRENOM,EN_TELEPHONE,EN_PPR,EN_DESCRIPTION,EN_ETAT_INSCRIPTION) VALUES ('$EN_PASSWORD1','$EN_EMAIL','$EN_NOM','$EN_PRENOM','$EN_TELEPHONE','$EN_PPR','$EN_DESCRIPTION','admis')";
   mysqli_query($connexion,$query);

   echo "<script type='text/javascript'>
      alert('Compte ajoutée avec succès !');
   </script>";
   header('Refresh: 0; url=../admin/GestionDesEnseigant.php');
 }
   else {

    $EN_PASSWORD1 =md5($EN_PASSWORD2);//md5 crypter le mot de passe 
   $query = "INSERT INTO enseignant (EN_PASSWORD,EN_EMAIL,EN_NOM,EN_PRENOM,EN_TELEPHONE,EN_PPR,EN_DESCRIPTION,EN_ETAT_INSCRIPTION) VALUES ('$EN_PASSWORD1','$EN_EMAIL','$EN_NOM','$EN_PRENOM','$EN_TELEPHONE','$EN_PPR','$EN_DESCRIPTION','En cours de vérification')";
   mysqli_query($connexion,$query);

   echo "<script type='text/javascript'>
            alert('Compte créé avec succès et envoyer à l administrateur pour le valider !');
               </script>";
        header('Refresh: 0; url=../index.php');
   } 

}
}

/*************************************************** Iscription Fonctionnaire *************************************/

$F_NOM = "";
$F_PRENOM = "";
$F_EMAIL = "";
$F_PPR = "";
$F_TELEPHONE = "";
$F_PASSWORD1 = "";
$F_PASSWORD2 = "";
$F_DESCRIPTION= "";


 

if (isset($_POST['InscriptionF']))
{
   $F_NOM = mysqli_real_escape_string($connexion, $_POST['F_NOM']);
   $F_EMAIL = mysqli_real_escape_string($connexion, $_POST['F_EMAIL']);
   $F_PPR = mysqli_real_escape_string($connexion, $_POST['F_PPR']);
   $F_TELEPHONE = mysqli_real_escape_string($connexion, $_POST['F_TELEPHONE']);
   $F_PASSWORD1 = mysqli_real_escape_string($connexion, $_POST['F_PASSWORD1']);
   $F_PASSWORD2 = mysqli_real_escape_string($connexion, $_POST['F_PASSWORD2']);
   $F_PRENOM = mysqli_real_escape_string($connexion, $_POST['F_PRENOM']);
   $F_DESCRIPTION = mysqli_real_escape_string($connexion, $_POST['F_DESCRIPTION']);
   $FORM = mysqli_real_escape_string($connexion, $_POST['FORM']);
   
//Validation Du password
if($F_PASSWORD1 != $F_PASSWORD2 ){
   array_push($errors, "Erreur à la confirmation de mot de passe !");
    }
//verifier si il exist le mème nom d'utilisateur (ou l'email) exister sur la base de donnees
$user_verifier1 = "SELECT * FROM etudiant WHERE ET_EMAIL = '$F_EMAIL' LIMIT 1 ";
$results1= mysqli_query($connexion, $user_verifier1);
$user1 = mysqli_fetch_assoc($results1);

if ($user1){
   
   if($user1['ET_EMAIL']=== $F_EMAIL){array_push($errors,"Ce email déjat utiliser par un auter utilisateur !");}
}

$user_verifier2 = "SELECT * FROM fonctionnaire WHERE F_EMAIL = '$F_EMAIL' LIMIT 1 ";
$results2= mysqli_query($connexion, $user_verifier2);
$user2 = mysqli_fetch_assoc($results2);

if ($user2){
   
   if($user2['F_EMAIL']=== $F_EMAIL){array_push($errors,"Cet email déjat utilisé par un auter utilisateur !");}
}

$user_verifier3 = "SELECT * FROM enseignant WHERE EN_EMAIL = '$F_EMAIL' LIMIT 1 ";
$results3= mysqli_query($connexion, $user_verifier3);
$user3 = mysqli_fetch_assoc($results3);

if ($user3){
   
   if($user3['EN_EMAIL']=== $F_EMAIL){array_push($errors,"Cet email déjat utilisé par un auter utilisateur !");}
}

$user_verifier4 = "SELECT * FROM administrateur WHERE EMAIL = '$F_EMAIL' LIMIT 1 ";
$results4= mysqli_query($connexion, $user_verifier4);
$user4 = mysqli_fetch_assoc($results4);

if ($user4){
   
   if($user4['EMAIL']=== $F_EMAIL){array_push($errors,"Cet email déjat utilisé par un auter utilisateur !");}
}

$user_verifier5 = "SELECT * FROM enseignant WHERE EN_PPR = '$F_PPR' LIMIT 1 ";
$results5= mysqli_query($connexion, $user_verifier5);
$user5 = mysqli_fetch_assoc($results5);

if ($user5){
   
   if($user5['EN_PPR']=== $F_PPR){array_push($errors,"Cet PPR déjat utilisé par un auter utilisateur !");}
}

$user_verifier6 = "SELECT * FROM fonctionnaire WHERE F_PPR = '$F_PPR' LIMIT 1  ";
$results6= mysqli_query($connexion, $user_verifier6);
$user6 = mysqli_fetch_assoc($results6);

if ($user6){
   
   if($user6['F_PPR']=== $F_PPR){array_push($errors,"Cet PPR déjat utilisé par un auter utilisateur !");}
}


//crier le compte (pas d'ereur)
if(count($errors)==0){
  if ($FORM=="ajouter") {
   $F_PASSWORD1 =md5($F_PASSWORD2);//md5 crypter le mot de passe 
   $query = "INSERT INTO Fonctionnaire (F_PASSWORD,F_EMAIL,F_NOM,F_PRENOM,F_TELEPHONE,F_PPR,F_DESCRIPTION,F_ETAT_INSCRIPTION) VALUES ('$F_PASSWORD1','$F_EMAIL','$F_NOM','$F_PRENOM','$F_TELEPHONE','$F_PPR','$F_DESCRIPTION','admis')";
    mysqli_query($connexion,$query);

    echo "<script type='text/javascript'>
      alert('Compte ajoutée avec succès !');
   </script>";
   header('Refresh: 0; url=../admin/GestionDesFonctionnaire.php');
 }
 else{
  $F_PASSWORD1 =md5($F_PASSWORD2);//md5 crypter le mot de passe 
   $query = "INSERT INTO Fonctionnaire (F_PASSWORD,F_EMAIL,F_NOM,F_PRENOM,F_TELEPHONE,F_PPR,F_DESCRIPTION,F_ETAT_INSCRIPTION) VALUES ('$F_PASSWORD1','$F_EMAIL','$F_NOM','$F_PRENOM','$F_TELEPHONE','$F_PPR','$F_DESCRIPTION','En cours de vérification')";
    mysqli_query($connexion,$query);

    echo "<script type='text/javascript'>
            alert('Compte créé avec succès et envoyer à l administrateur pour le valider !');
               </script>";
        header('Refresh: 0; url=../index.php');
 }
  

   

}
}
/*******************************************LOGIN****************************************/
$EMAIL = "";
$PASSWORD= "";
if(isset($_POST['LOGIN'])){

   $EMAIL = mysqli_real_escape_string($connexion, $_POST['EMAIL']);
   $PASSWORD = mysqli_real_escape_string($connexion, $_POST['PASSWORD']);
   
   if(count($errors)== 0)
   {

      $PASSWORD = md5($PASSWORD);
      $query_etudiant = "SELECT * FROM etudiant WHERE ET_EMAIL='$EMAIL' AND ET_PASSWORD='$PASSWORD'";
      $result_etudiant = mysqli_query($connexion, $query_etudiant);
      $user1 = mysqli_fetch_assoc($result_etudiant);

      $query_enseignant = "SELECT * FROM enseignant WHERE EN_EMAIL='$EMAIL' AND EN_PASSWORD='$PASSWORD'";
      $result_enseignant = mysqli_query($connexion, $query_enseignant);
      $user2 = mysqli_fetch_assoc($result_enseignant);

      $query_fonctinnaire = "SELECT * FROM fonctionnaire WHERE F_EMAIL='$EMAIL' AND F_PASSWORD='$PASSWORD'";
      $result_fonctionnaire = mysqli_query($connexion, $query_fonctinnaire);
      $user3 = mysqli_fetch_assoc($result_fonctionnaire);

      $query_admin = "SELECT * FROM administrateur WHERE EMAIL='$EMAIL' AND PASSWORD='$PASSWORD'";
      $result_admin = mysqli_query($connexion, $query_admin);

      if(mysqli_num_rows($result_admin)==1) {

         $_SESSION['EMAIL_CONNECT']= $EMAIL;
         header('location: ../Admin/AdminAccueil.php'); 
        
        
      }

      else if(mysqli_num_rows($result_etudiant)==1) {

          if ($user1["ET_ETAT_INSCRIPTION"]=="En cours de vérification") {
            
             echo "<script type='text/javascript'>
                alert('La demmande de l inscription en cours de traitement par l administrateur!');
             </script>";
            
      header('Refresh: 0; url=../index.php');
          }
          else{
         $_SESSION['PRENOM_CONNECT']= $user1["ET_PRENOM"];
         $_SESSION['NOM_CONNECT']= $user1["ET_NOM"];
         $_SESSION['EMAIL_CONNECT']= $EMAIL;
         header('location: ../etudiant/EtudiantAccueil.php'); 

         }
      }
      else if(mysqli_num_rows($result_enseignant)==1) {

          if ($user2["EN_ETAT_INSCRIPTION"]=="En cours de vérification") {
            
             echo "<script type='text/javascript'>
                alert('La demmande de l inscription en cours de traitement par l administrateur!');
             </script>";
            
      header('Refresh: 0; url=../index.php');
          }
          else{
         
         $_SESSION['PRENOM_CONNECT']= $user2["EN_PRENOM"];
         $_SESSION['NOM_CONNECT']= $user2["EN_NOM"];
         $_SESSION['EMAIL_CONNECT']= $EMAIL;
         header('location: ../enseignant/EnseignantAccueil.php');

         }        

         
      }
       else if(mysqli_num_rows($result_fonctionnaire)==1) {

           if ($user3["F_ETAT_INSCRIPTION"]=="En cours de vérification") {
            
             echo "<script type='text/javascript'>
                alert('La demmande de l inscription en cours de traitement par l administrateur!');
             </script>";
            
      header('Refresh: 0; url=../index.php');
          }
          else{
        $_SESSION['PRENOM_CONNECT']= $user3["F_PRENOM"];
        $_SESSION['NOM_CONNECT']= $user3["F_NOM"];
        $_SESSION['EMAIL_CONNECT']= $EMAIL;
         header('location: ../Fonctionnaire/FonctionnaireAccueil.php'); 
      }

         
      }

   
      else{array_push($errors,"Email ou mot de passe est incorrect");}
   }
}


/******************************************************** Gestion des Etudiants *********************************************/
if (isset($_GET['CNE_VALIDER'])){

   $ET_CNE=$_GET['CNE_VALIDER'];
   $query = "UPDATE etudiant set ET_ETAT_INSCRIPTION='admis' WHERE ET_CNE='$ET_CNE'";
   mysqli_query($connexion,$query);
   
   echo "<script type='text/javascript'>
      alert('L inscription est validée avec succès !');
   </script>";
  
      header('Refresh: 0; url=../admin/GestionDesEtudiants.php');   
}

if (isset($_GET['ID_SUPPRIMER'])){

   $ET_ID=$_GET['ID_SUPPRIMER'];
   $query = "DELETE FROM etudiant  WHERE ID_ETUDIANT='$ET_ID'";
   $connexion->query($query) ;
   
   echo "<script type='text/javascript'>
      alert('L étudiant est supprimé avec succès !');
   </script>";
  
      header('Refresh: 0; url=../admin/GestionDesEtudiants.php');   
}
/******************************************************** Gestion des Enseigants *********************************************/
if (isset($_GET['EN_PPR_VALIDER'])){

   $EN_PPR=$_GET['EN_PPR_VALIDER'];
   $query = "UPDATE enseignant set EN_ETAT_INSCRIPTION='admis' WHERE EN_PPR='$EN_PPR'";
   mysqli_query($connexion,$query);
   
   echo "<script type='text/javascript'>
      alert('L inscription est validée avec succès !');
   </script>";
  
      header('Refresh: 0; url=../admin/GestionDesEnseigant.php');   
}

if (isset($_GET['EN_ID_SUPPRIMER'])){

   $EN_ID=$_GET['EN_ID_SUPPRIMER'];
   $query = "DELETE FROM enseignant  WHERE   ID_ENSEIGNANT='$EN_ID'";
   $connexion->query($query) ;
   
   echo "<script type='text/javascript'>
      alert('L étudiant est supprimé avec succès !');
   </script>";
  
      header('Refresh: 0; url=../admin/GestionDesEnseigant.php');   
}
/******************************************************** Gestion des Fonctionnaires *********************************************/
if (isset($_GET['F_PPR_VALIDER'])){

   $F_PPR=$_GET['F_PPR_VALIDER'];
   $query = "UPDATE Fonctionnaire set F_ETAT_INSCRIPTION='admis' WHERE F_PPR='$F_PPR'";
   mysqli_query($connexion,$query);
   
   echo "<script type='text/javascript'>
      alert('L inscription est validée avec succès !');
   </script>";
  
      header('Refresh: 0; url=../admin/GestionDesFonctionnaire.php');   
}

if (isset($_GET['F_ID_SUPPRIMER'])){

   $F_ID=$_GET['F_ID_SUPPRIMER'];
   $query = "DELETE FROM FONCTIONNAIRE  WHERE   ID_FONCTIOONNAIRE='$F_ID'";
   $connexion->query($query) ;
   
   echo "<script type='text/javascript'>
      alert('Le fonctionnaire est supprimé avec succès !');
   </script>";
  
      header('Refresh: 0; url=../admin/GestionDesFonctionnaire.php');   
}

/******************************************************** Profil Admin *********************************************/
  if (isset($_POST['MODIFIER_ADMIN_PROFIL']))
    {
        
        $NOM = mysqli_real_escape_string($connexion, $_POST['NOM']);
        $PRENOM = mysqli_real_escape_string($connexion, $_POST['PRENOM']);
        $EMAIL = mysqli_real_escape_string($connexion, $_POST['EMAIL']);
        $PASSWORD = mysqli_real_escape_string($connexion, $_POST['PASSWORD']);
        $PASSWORD1 = mysqli_real_escape_string($connexion, $_POST['PASSWORD1']);
        $PASSWORD2 = mysqli_real_escape_string($connexion, $_POST['PASSWORD2']);
        
        $PASSWORD1 = md5($PASSWORD1);

          if (empty($_POST['PASSWORD2'])) {
             $PASSWORD2 = $PASSWORD;
          }
          else{
            $PASSWORD2 = md5($PASSWORD2);
          }
         
          if($PASSWORD1 != $PASSWORD )
         {
           array_push($errors, "le  mot de passe est incorrect!");
         }

        if(count($errors)==0)
          {     
    
           $query_modifier_Profil = "UPDATE administrateur SET NOM='$NOM' , PRENOM='$PRENOM' , PASSWORD='$PASSWORD2'  WHERE EMAIL='$EMAIL'";
            mysqli_query($connexion,$query_modifier_Profil);
           
            echo "<script type='text/javascript'>
                     alert('les informations sont modifieés avec succès !');
                  </script>";
                
            header('Refresh: 0; url= ../Admin/Profil.php?');
      
          }
        

    }

    /******************************************************** Modifier ETUDIANT admin *********************************************/
  if (isset($_POST['MODIFIER_ADMIN_ETUDIANT']))
    {
        
        $ET_NOM = mysqli_real_escape_string($connexion, $_POST['ET_NOM']);
        $ET_PRENOM = mysqli_real_escape_string($connexion, $_POST['ET_PRENOM']);
        $ET_CNE = mysqli_real_escape_string($connexion, $_POST['ET_CNE']);
        $ID_FILIERE = mysqli_real_escape_string($connexion, $_POST['ID_FILIERE']);
        $ET_EMAIL = mysqli_real_escape_string($connexion, $_POST['ET_EMAIL']);
        $ET_DESCRIPTION = mysqli_real_escape_string($connexion, $_POST['ET_DESCRIPTION']);
        $ET_TELEPHONE = mysqli_real_escape_string($connexion, $_POST['ET_TELEPHONE']);
        $ET_PASSWORD = mysqli_real_escape_string($connexion, $_POST['ET_PASSWORD']);
        $ET_PASSWORD1 = mysqli_real_escape_string($connexion, $_POST['ET_PASSWORD1']);
        $ET_PASSWORD2 = mysqli_real_escape_string($connexion, $_POST['ET_PASSWORD2']);
        $ET_FILIERE="";
        

        


             if (!empty($_POST['ET_PASSWORD1'] && !empty($_POST['ET_PASSWORD2']))) {
          
           $ET_PASSWORD1 = md5($ET_PASSWORD1);
           $ET_PASSWORD2 = md5($ET_PASSWORD2);
         
          if($ET_PASSWORD1 != $ET_PASSWORD2 )
         {
           array_push($errors, "Erreur à la confirmation de mot de passe !");
         }
        }

        else {
            if($ET_PASSWORD1 != $ET_PASSWORD2 )
         {
           array_push($errors, "Erreur à la confirmation de mot de passe !");
         }
          else{
          $ET_PASSWORD2 = $ET_PASSWORD;
          $ET_PASSWORD1= $ET_PASSWORD;
          
              }
        }


         $user_verifier6 = "SELECT * FROM filiere WHERE ID_FILIERE = '$ID_FILIERE' LIMIT 1 ";
         $results6= mysqli_query($connexion, $user_verifier6);
         $user6 = mysqli_fetch_assoc($results6);

          if ($user6){
             
             $ET_FILIERE=$user6['FILIERE'];
          }


        if(count($errors)==0)
          {     
    
           $query_modifier_Profil = "UPDATE etudiant SET ET_NOM='$ET_NOM' ,ET_PRENOM='$ET_PRENOM' ,ID_FILIERE='$ID_FILIERE' ,ET_DESCRIPTION='$ET_DESCRIPTION' ,ET_TELEPHONE='$ET_TELEPHONE' , ET_FILIERE='$ET_FILIERE' , ET_PASSWORD='$ET_PASSWORD2'  WHERE ET_CNE='$ET_CNE'";
            mysqli_query($connexion,$query_modifier_Profil);
           
            echo "<script type='text/javascript'>
                     alert('les informations sont modifieés avec succès !');
                  </script>";
                
            header('Refresh: 0; url= ../Admin/ModifierEtudiant.php?CNE_MODIFIER='.$ET_CNE);
      
          }
        

    }


    /******************************************************** Modifier ENSEIGNAT admin *********************************************/
  if (isset($_POST['MODIFIER_ADMIN_ENSEIGANAT']))
    {
        
        $EN_NOM = mysqli_real_escape_string($connexion, $_POST['EN_NOM']);
        $EN_PRENOM = mysqli_real_escape_string($connexion, $_POST['EN_PRENOM']);
        $EN_PPR = mysqli_real_escape_string($connexion, $_POST['EN_PPR']);
        $EN_EMAIL = mysqli_real_escape_string($connexion, $_POST['EN_EMAIL']);
        $EN_DESCRIPTION = mysqli_real_escape_string($connexion, $_POST['EN_DESCRIPTION']);
        $EN_TELEPHONE = mysqli_real_escape_string($connexion, $_POST['EN_TELEPHONE']);
        $EN_PASSWORD = mysqli_real_escape_string($connexion, $_POST['EN_PASSWORD']);
        $EN_PASSWORD1 = mysqli_real_escape_string($connexion, $_POST['EN_PASSWORD1']);
        $EN_PASSWORD2 = mysqli_real_escape_string($connexion, $_POST['EN_PASSWORD2']);
        
        

             if (!empty($_POST['EN_PASSWORD1'] && !empty($_POST['EN_PASSWORD2']))) {
          
           $EN_PASSWORD1 = md5($EN_PASSWORD1);
           $EN_PASSWORD2 = md5($EN_PASSWORD2);
         
          if($EN_PASSWORD1 != $EN_PASSWORD2 )
         {
           array_push($errors, "Erreur à la confirmation de mot de passe !");
         }
        }

        else {
            if($EN_PASSWORD1 != $EN_PASSWORD2 )
         {
           array_push($errors, "Erreur à la confirmation de mot de passe !");
         }
          else{
          $EN_PASSWORD2 = $EN_PASSWORD;
          $EN_PASSWORD1= $EN_PASSWORD;
          
              }
        }


        if(count($errors)==0)
          {     
    
           $query_modifier_Profil = "UPDATE enseignant SET EN_NOM='$EN_NOM' ,EN_PRENOM='$EN_PRENOM'  ,EN_DESCRIPTION='$EN_DESCRIPTION' ,EN_TELEPHONE='$EN_TELEPHONE' , EN_PASSWORD='$EN_PASSWORD2'  WHERE EN_PPR='$EN_PPR'";
            mysqli_query($connexion,$query_modifier_Profil);
           
            echo "<script type='text/javascript'>
                     alert('les informations sont modifieés avec succès !');
                  </script>";
                
            header('Refresh: 0; url= ../Admin/ModifierEnseigant.php?EN_PPR_MODIFIER='.$EN_PPR);
      
          }
        

    }


    /******************************************************** Modifier FONCTIONNAIRE admin *********************************************/
  if (isset($_POST['MODIFIER_ADMIN_FONCTIONNAIRE']))
    {
        
        $F_NOM = mysqli_real_escape_string($connexion, $_POST['F_NOM']);
        $F_PRENOM = mysqli_real_escape_string($connexion, $_POST['F_PRENOM']);
        $F_PPR = mysqli_real_escape_string($connexion, $_POST['F_PPR']);
        $F_EMAIL = mysqli_real_escape_string($connexion, $_POST['F_EMAIL']);
        $F_DESCRIPTION = mysqli_real_escape_string($connexion, $_POST['F_DESCRIPTION']);
        $F_TELEPHONE = mysqli_real_escape_string($connexion, $_POST['F_TELEPHONE']);
        $F_PASSWORD = mysqli_real_escape_string($connexion, $_POST['F_PASSWORD']);
        $F_PASSWORD1 = mysqli_real_escape_string($connexion, $_POST['F_PASSWORD1']);
        $F_PASSWORD2 = mysqli_real_escape_string($connexion, $_POST['F_PASSWORD2']);
        
        

             if (!empty($_POST['F_PASSWORD1'] && !empty($_POST['F_PASSWORD2']))) {
          
           $F_PASSWORD1 = md5($F_PASSWORD1);
           $F_PASSWORD2 = md5($F_PASSWORD2);
         
          if($F_PASSWORD1 != $F_PASSWORD2 )
         {
           array_push($errors, "Erreur à la confirmation de mot de passe !");
         }
        }

        else {
            if($F_PASSWORD1 != $F_PASSWORD2 )
         {
           array_push($errors, "Erreur à la confirmation de mot de passe !");
         }
          else{
          $F_PASSWORD2 = $F_PASSWORD;
          $F_PASSWORD1= $F_PASSWORD;
          
              }
        }


        if(count($errors)==0)
          {     
    
           $query_modifier_Profil = "UPDATE FONCTIONNAIRE SET F_NOM='$F_NOM' ,F_PRENOM='$F_PRENOM'  ,F_DESCRIPTION='$F_DESCRIPTION' ,F_TELEPHONE='$F_TELEPHONE' , F_PASSWORD='$F_PASSWORD2'  WHERE F_PPR='$F_PPR'";
            mysqli_query($connexion,$query_modifier_Profil);
           
            echo "<script type='text/javascript'>
                     alert('les informations sont modifieés avec succès !');
                  </script>";
                
            header('Refresh: 0; url= ../Admin/ModifierFonctionnaire.php?F_PPR_MODIFIER='.$F_PPR);
      
          }
        

    }

        /******************************************************** Profil ETUDIANT  *********************************************/
  if (isset($_POST['MODIFIER_PROFIL_ETUDIANT']))
    {
        
        $ET_NOM = mysqli_real_escape_string($connexion, $_POST['ET_NOM']);
        $ET_PRENOM = mysqli_real_escape_string($connexion, $_POST['ET_PRENOM']);
        $ET_CNE = mysqli_real_escape_string($connexion, $_POST['ET_CNE']);
        $ID_FILIERE = mysqli_real_escape_string($connexion, $_POST['ID_FILIERE']);
        $ET_EMAIL = mysqli_real_escape_string($connexion, $_POST['ET_EMAIL']);
        $ET_DESCRIPTION = mysqli_real_escape_string($connexion, $_POST['ET_DESCRIPTION']);
        $ET_TELEPHONE = mysqli_real_escape_string($connexion, $_POST['ET_TELEPHONE']);
        $ET_PASSWORD = mysqli_real_escape_string($connexion, $_POST['ET_PASSWORD']);
        $ET_PASSWORD1 = mysqli_real_escape_string($connexion, $_POST['ET_PASSWORD1']);
        $ET_PASSWORD2 = mysqli_real_escape_string($connexion, $_POST['ET_PASSWORD2']);
        $ET_FILIERE="";
        

        


             if (!empty($_POST['ET_PASSWORD1'] && !empty($_POST['ET_PASSWORD2']))) {
          
           $ET_PASSWORD1 = md5($ET_PASSWORD1);
           $ET_PASSWORD2 = md5($ET_PASSWORD2);
         
          if($ET_PASSWORD1 != $ET_PASSWORD2 )
         {
           array_push($errors, "Erreur à la confirmation de mot de passe !");
         }
        }

        else {
            if($ET_PASSWORD1 != $ET_PASSWORD2 )
         {
           array_push($errors, "Erreur à la confirmation de mot de passe !");
         }
          else{
          $ET_PASSWORD2 = $ET_PASSWORD;
          $ET_PASSWORD1= $ET_PASSWORD;
          
              }
        }


         $user_verifier6 = "SELECT * FROM filiere WHERE ID_FILIERE = '$ID_FILIERE' LIMIT 1 ";
         $results6= mysqli_query($connexion, $user_verifier6);
         $user6 = mysqli_fetch_assoc($results6);

          if ($user6){
             
             $ET_FILIERE=$user6['FILIERE'];
          }


        if(count($errors)==0)
          {     
    
           $query_modifier_Profil = "UPDATE etudiant SET ET_NOM='$ET_NOM' ,ET_PRENOM='$ET_PRENOM' ,ID_FILIERE='$ID_FILIERE' ,ET_DESCRIPTION='$ET_DESCRIPTION' ,ET_TELEPHONE='$ET_TELEPHONE' , ET_FILIERE='$ET_FILIERE' , ET_PASSWORD='$ET_PASSWORD2'  WHERE ET_CNE='$ET_CNE'";
            mysqli_query($connexion,$query_modifier_Profil);
           
            echo "<script type='text/javascript'>
                     alert('les informations sont modifieés avec succès !');
                  </script>";
               
            header('Refresh: 0; url= ../ETUDIANT/Profil.php');
      
          }
        

    }

        /******************************************************** Profil FONCTIONNAIRE  *********************************************/
  if (isset($_POST['MODIFIER_PROFIL_FONCTIONNAIRE']))
    {
        
        $F_NOM = mysqli_real_escape_string($connexion, $_POST['F_NOM']);
        $F_PRENOM = mysqli_real_escape_string($connexion, $_POST['F_PRENOM']);
        $F_PPR = mysqli_real_escape_string($connexion, $_POST['F_PPR']);
        $F_EMAIL = mysqli_real_escape_string($connexion, $_POST['F_EMAIL']);
        $F_DESCRIPTION = mysqli_real_escape_string($connexion, $_POST['F_DESCRIPTION']);
        $F_TELEPHONE = mysqli_real_escape_string($connexion, $_POST['F_TELEPHONE']);
        $F_PASSWORD = mysqli_real_escape_string($connexion, $_POST['F_PASSWORD']);
        $F_PASSWORD1 = mysqli_real_escape_string($connexion, $_POST['F_PASSWORD1']);
        $F_PASSWORD2 = mysqli_real_escape_string($connexion, $_POST['F_PASSWORD2']);
        
        

             if (!empty($_POST['F_PASSWORD1'] && !empty($_POST['F_PASSWORD2']))) {
          
           $F_PASSWORD1 = md5($F_PASSWORD1);
           $F_PASSWORD2 = md5($F_PASSWORD2);
         
          if($F_PASSWORD1 != $F_PASSWORD2 )
         {
           array_push($errors, "Erreur à la confirmation de mot de passe !");
         }
        }

        else {
            if($F_PASSWORD1 != $F_PASSWORD2 )
         {
           array_push($errors, "Erreur à la confirmation de mot de passe !");
         }
          else{
          $F_PASSWORD2 = $F_PASSWORD;
          $F_PASSWORD1= $F_PASSWORD;
          
              }
        }


        if(count($errors)==0)
          {     
    
           $query_modifier_Profil = "UPDATE FONCTIONNAIRE SET F_NOM='$F_NOM' ,F_PRENOM='$F_PRENOM'  ,F_DESCRIPTION='$F_DESCRIPTION' ,F_TELEPHONE='$F_TELEPHONE' , F_PASSWORD='$F_PASSWORD2'  WHERE F_PPR='$F_PPR'";
            mysqli_query($connexion,$query_modifier_Profil);
           
            echo "<script type='text/javascript'>
                     alert('les informations sont modifieés avec succès !');
                  </script>";
                
            header('Refresh: 0; url= ../fonctionnaire/Profil.php');
      
          }
        

    }

      /******************************************************** Modifier ENSEIGNAT PROFIL *********************************************/
  if (isset($_POST['MODIFIER_PROFIL_ENSEIGANAT']))
    {
        
        $EN_NOM = mysqli_real_escape_string($connexion, $_POST['EN_NOM']);
        $EN_PRENOM = mysqli_real_escape_string($connexion, $_POST['EN_PRENOM']);
        $EN_PPR = mysqli_real_escape_string($connexion, $_POST['EN_PPR']);
        $EN_EMAIL = mysqli_real_escape_string($connexion, $_POST['EN_EMAIL']);
        $EN_DESCRIPTION = mysqli_real_escape_string($connexion, $_POST['EN_DESCRIPTION']);
        $EN_TELEPHONE = mysqli_real_escape_string($connexion, $_POST['EN_TELEPHONE']);
        $EN_PASSWORD = mysqli_real_escape_string($connexion, $_POST['EN_PASSWORD']);
        $EN_PASSWORD1 = mysqli_real_escape_string($connexion, $_POST['EN_PASSWORD1']);
        $EN_PASSWORD2 = mysqli_real_escape_string($connexion, $_POST['EN_PASSWORD2']);
        
        

             if (!empty($_POST['EN_PASSWORD1'] && !empty($_POST['EN_PASSWORD2']))) {
          
           $EN_PASSWORD1 = md5($EN_PASSWORD1);
           $EN_PASSWORD2 = md5($EN_PASSWORD2);
         
          if($EN_PASSWORD1 != $EN_PASSWORD2 )
         {
           array_push($errors, "Erreur à la confirmation de mot de passe !");
         }
        }

        else {
            if($EN_PASSWORD1 != $EN_PASSWORD2 )
         {
           array_push($errors, "Erreur à la confirmation de mot de passe !");
         }
          else{
          $EN_PASSWORD2 = $EN_PASSWORD;
          $EN_PASSWORD1= $EN_PASSWORD;
          
              }
        }


        if(count($errors)==0)
          {     
    
           $query_modifier_Profil = "UPDATE enseignant SET EN_NOM='$EN_NOM' ,EN_PRENOM='$EN_PRENOM'  ,EN_DESCRIPTION='$EN_DESCRIPTION' ,EN_TELEPHONE='$EN_TELEPHONE' , EN_PASSWORD='$EN_PASSWORD2'  WHERE EN_PPR='$EN_PPR'";
            mysqli_query($connexion,$query_modifier_Profil);
           
            echo "<script type='text/javascript'>
                     alert('les informations sont modifieés avec succès !');
                  </script>";
                
            header('Refresh: 0; url= ../Enseignant/Profil.php');
      
          }
        

    }