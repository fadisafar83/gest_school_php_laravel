<?php
   require APPROOT . '/views/includes/head.php';
?>

<div class="navbar">
    <?php
       require APPROOT . '/views/includes/navigation.php';
    ?>
</div>

<div class="container">
       <?php foreach ($data['classes'] as $classe):?>
        <div class="container-item">
          CURSUS:<h3> <?= $classe->nom_cursus; ?></h3>
          FRAIS:<h3> <?= $classe->frais_cursus; ?></h3>
          </div>
    <?php endforeach; ?>
       </div>
       
       

       