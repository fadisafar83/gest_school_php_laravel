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
        Insert un nouveau utilisateur
    </h1>

    <form action="<?php echo URLROOT; ?>/admins/insert" method="POST">
        <div class="form-item">
            <input type="text" name="nom" placeholder="nom">
            <input type="text" name="prenom" placeholder="prenom">
            <input type="email" name="email" placeholder="email">
            <input type="password" name="mot_de_passe" placeholder="mot_de_passe">
            <input type="text" name="fonction" placeholder="fonction">
        </div>

        <button class="btn green" name="submit" type="submit">Submit</button>
    </form>
</div>
