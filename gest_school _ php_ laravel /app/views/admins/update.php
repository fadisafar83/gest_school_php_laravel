<?php
   require APPROOT . '/views/includes/head.php';
?>

<div class="navbar dark">
    <?php
       require APPROOT . '/views/includes/navigation_1.php';
    ?>
</div>

<div class="container center">
    <h1>
        Modifier un utilisateur
    </h1>
    <form action="<?php echo URLROOT; ?>/admins/update/<?php echo $data['utilisateur']->id_utilisateur ?>" method="POST">
        <div class="form-item">
            <input type="text" name="nom" value="<?php echo $data['utilisateur']->nom ?>">
            <input type="text" name="prenom" value="<?php echo $data['utilisateur']->prenom ?>">
            <input type="email" name="email" value="<?php echo $data['utilisateur']->email ?>">
            <input type="password" name="mot_de_passe" value="<?php echo $data['utilisateur']->mot_de_passe ?>">
            <input type="text" name="fonction" value="<?php echo $data['utilisateur']->fonction?>">
        </div>

        <button class="btn green" name="submit" type="submit">Submit</button>
    </form>
</div>
