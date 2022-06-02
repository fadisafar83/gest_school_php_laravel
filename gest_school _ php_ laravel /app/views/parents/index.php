<?php
   require APPROOT . '/views/includes/head.php';
?>

<div class="navbar dark">
    <?php
       require APPROOT . '/views/includes/navigation_2.php';
    ?>
</div>

<div class="container">
<?php if(isLoggedIn()): ?>
        <a class="btn green" href="<?php echo URLROOT; ?>/parents/insert">
            Créer un compte pour votre enfant
        </a><br><br><br>
        <a class="btn green" href="<?php echo URLROOT . "/parentstudents"  ?>">
                    Consulter les notes de votre/vos enfant(s)          
        </a>
    <?php endif; ?>

    <?php foreach($data['utilisateurs'] as $utilisateur): ?>
      
        
        <div class="container-item">
        <?php if(null !==($_SESSION['id_utilisateur'] &&  $_SESSION['fonction'] =='parent')): ?>
  
                <a
                    class="btn orange"
                    href="<?php echo URLROOT . "/parents/update/" . $utilisateur->id_utilisateur ?>">
                    Update
                    
                </a>
                <form action="<?php echo URLROOT . "/parents/delete/" . $utilisateur->id_utilisateur ?>" method="POST">
                    <input type="submit" name="delete" value="Delete" class="btn red">
                </form>
            <?php endif; ?>
            <h3>
                <?php echo $utilisateur->nom; ?>
            </h3>
            <h3>
                <?php echo $utilisateur->prenom; ?>
            </h3>
            <h3>
                <?php echo $utilisateur->email; ?>
            </h3>
            <h3>
                <?php echo $utilisateur->mot_de_passe; ?>
            </h3>
            <h3>
                <?php echo $utilisateur->fonction; ?>
            </h3>

        </div>
    <?php endforeach; ?>
</div>
