<?php
   require APPROOT . '/views/includes/head.php';
?>

<div class="navbar">
    <?php
       require APPROOT . '/views/includes/navigation.php';
    ?>
</div>

<div class="container-login">
    <div class="wrapper-login">
        <h2>Créer un compte</h2>

            <form
                id="register-form"
                method="POST"
                action="<?php echo URLROOT; ?>/utilisateurs/register"
                >
                <input type="text"name="nom" placeholder="Nom" required />
      <input type="text"  name="prenom" placeholder="Prenom" required />
      <input type="email" name="email" placeholder="Email" required />
      <input type="password"  name="mot_de_passe" placeholder="Mot de passe" required />
      <div >
          <select id="inputGroupSelect01" name="fonction">
            <option selected>Fonction</option>
            <option value="parent">Parent</option>
            <option value="professeur">Professeur</option>
            <option value="professeur & parent">Parent & professeur</option>
            <option value="etudiant">etudiant</option>
          </select>
    </div><br><br>
          
            <button id="submit" type="submit" value="submit">Valider</button>

            <p class="options">Vous n'avez pas encore un compte? <a href="<?php echo URLROOT; ?>/utilisateurs/register">Créer un compte!</a></p>
        </form>
    </div>
</div>

