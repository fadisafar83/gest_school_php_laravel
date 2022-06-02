<?php
   require APPROOT . '/views/includes/head.php';
?>

<div class="navbar">
    <?php
       require APPROOT . '/views/includes/navigation_2.php';
    ?>
</div>

<div class="container">

    <?php foreach($data['data'] as $data): ?>
           Nom:<h3><?= $data->nom_etudiant; ?></h3>
          Prenom:<h3><?= $data->prenom_etudiant; ?></h3>

        </div>
    <?php endforeach; ?>
</div>