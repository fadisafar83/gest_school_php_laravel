<?php
   require APPROOT . '/views/includes/head.php';
?>

<div class="navbar">
    <?php
       require APPROOT . '/views/includes/navigation_4.php';
    ?>
</div>

<div class="container-login">
    <div class="wrapper-login">
        <h2>Indiquer ID etdudiant de votre enfant pour acceder à ses informations</h2>
        <form action="<?php echo URLROOT; ?>/spacestudents/index" method ="POST">
            <input type="text" placeholder="ID etudiant *" name="id_etudiant">
            <button id="submit" type="submit" value="submit">Submit</button>
        </form>
    </div>
</div>
