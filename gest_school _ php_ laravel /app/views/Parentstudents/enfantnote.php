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
           Cursus:<h3><?= $data->nom_cursus; ?></h3>
           Matiere:<h3><?= $data->nom_matiere; ?></h3>
           Note:<h3><?= $data->note; ?></h3>
           Appreciation:<h3><?= $data->appreciation; ?></h3>
           Semestre:<h3><?= $data->semestre; ?></h3>
           Année scolaire<h3><?= $data->annee_scolaire; ?></h3>
        </div>
    <?php endforeach; ?>
</div>