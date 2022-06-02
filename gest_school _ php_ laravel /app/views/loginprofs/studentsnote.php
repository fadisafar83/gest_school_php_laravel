<?php
   require APPROOT . '/views/includes/head.php';
?>

<div class="navbar dark">
    <?php
       require APPROOT . '/views/includes/navigation_3.php';
    ?>
</div>

<div class="container">
<?php
 ?>
        <div class="container-item">
            Note<h3><?= $data['studentsnote']->note; ?></h3>
            Appreciation<h3><?= $data['studentsnote']->appreciation; ?></h3>
           Semestre<h3><?= $data['studentsnote']->semestre; ?></h3>
            Année scolaire<h3><?= $data['studentsnote']->annee_scolaire; ?></h3>
            <br>
        </div>
</div>