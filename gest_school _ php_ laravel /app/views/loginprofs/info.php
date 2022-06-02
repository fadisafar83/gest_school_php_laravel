<?php
   require APPROOT . '/views/includes/head.php';
?>

<div class="navbar dark">
    <?php
       require APPROOT . '/views/includes/navigation_3.php';
    ?>
</div>
<?php if(isLoggedIn()): ?>
<div class="container"> 
    <div class="container-item">
        <?php if(null !==($_SESSION['id_utilisateur'] &&  $_SESSION['fonction'] =='professeur' )): ?>
            ID:    <h3><?= $data['profData']->id_professeur; ?></h3>
            NOM:   <h3><?= $data['profData']->nom_professeur; ?></h3>
            PRENOM:<h3><?= $data['profData']->prenom_professeur; ?></h3>
        <?php endif; ?>
    </div>
    <p> MATIERE-CURSUS </p>
    <?php foreach($data['prof_mat_curcus'] as $m ): ?>
        <a href="<?= URLROOT . '/loginprofs/profstudent/' . $m->id_cursus .'/'. $m->id_professeur .'/'. $m->id_matiere ?>">
            <?= $m->nom_matiere . ' - ' . $m->nom_cursus ?>
        </a>
        <br><br>
    <?php endforeach;?>            
</div>
<?php endif; ?>
