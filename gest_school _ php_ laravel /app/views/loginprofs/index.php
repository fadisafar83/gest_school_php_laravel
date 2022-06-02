<?php
   require APPROOT . '/views/includes/head.php';
?>

<div class="navbar">
    <?php
       require APPROOT . '/views/includes/navigation_3.php';
    ?>
</div>

<div class="container-login">
    <div class="wrapper-login">
        <h2>Sign in</h2>

        <form action="<?php echo URLROOT; ?>/loginprofs/index" method ="POST">
            <input type="text" placeholder="ID Professeur *" name="id_professeur">
            <button id="submit" type="submit" value="submit">Submit</button>
         
        </form>
    </div>
</div>




