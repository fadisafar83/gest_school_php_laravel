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
        <h2>Se connecter</h2>

        <form action="<?php echo URLROOT; ?>/utilisateurs/login" method ="POST">
            <input type="text" placeholder="email *" name="email">
            <input type="password" placeholder="Password *" name="mot_de_passe">
            <button id="submit" type="submit" value="submit">Valider</button>

            <p class="options">Vous n'avez pas encore un compte? <a href="<?php echo URLROOT; ?>/utilisateurs/register">Créer un compte!</a></p>
        </form>
    </div>
</div>