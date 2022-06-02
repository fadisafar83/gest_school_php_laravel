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
    <?php foreach($data as $ps): ?>
    
        <div class="container-item">
            <h3><?= $ps->nom_etudiant; ?></h3>
            <h3><?= $ps->prenom_etudiant; ?></h3>
            <br>
            <a class="btn green" href="<?= URLROOT . '/loginprofs/get_students_note/' .$ps->id_etudiant .'/'. $ps->id_professeur .'/'. $ps->id_cursus .'/'. $ps->id_matiere ?>">
            Afficher les notes de cet etudiant
            </a> 
            <br><br><br>
            <a class="btn green" href="<?= URLROOT . '/loginprofs/insert_note/' .$ps->id_etudiant .'/'. $ps->id_professeur .'/'. $ps->id_cursus .'/'. $ps->id_matiere ?>">
            Insert note pour l'étudiant
            </a> 
        </div>
    <?php endforeach; ?>

</div>
