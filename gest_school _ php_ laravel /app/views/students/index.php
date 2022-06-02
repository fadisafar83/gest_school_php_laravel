<?php
   require APPROOT . '/views/includes/head.php';
?>

<div class="navbar dark">
    <?php
       require APPROOT . '/views/includes/navigation_4.php';
    ?>
</div>

<div class="container">
    <?php if(isLoggedIn()): ?>

        <a class="btn green" href="<?php echo URLROOT . "/spacestudents"  ?>">
                    Consulter vos notes          
        </a>

    <?php endif; ?>

    <?php foreach($data['utilisateurs'] as $utilisateur): ?>
      
        
        <div class="container-item">
        <?php if(null !==($_SESSION['id_utilisateur'] &&  $_SESSION['fonction'] =='etudiant' )): ?>
  
                <a
                    class="btn orange"
                    href="<?php echo URLROOT . "/students/update/" . $utilisateur->id_utilisateur ?>">
                    Update
                    
                </a>
                <form action="<?php echo URLROOT . "/students/delete/" . $utilisateur->id_utilisateur ?>" method="POST">
                    <input type="submit" name="delete" value="Delete" class="btn red">
                </form>
            <?php endif; ?>
            <h3><?= $utilisateur->nom; ?></h3>
            <h3><?= $utilisateur->prenom; ?></h3>
            <h3><?= $utilisateur->email; ?></h3>
            <h3><?= $utilisateur->mot_de_passe; ?></h3>
            <h3><?= $utilisateur->fonction; ?></h3>

        </div>
    <?php endforeach; ?>
</div>
