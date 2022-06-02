<?php
   require APPROOT . '/views/includes/head.php';
?>

<div class="navbar dark">
    <?php
       require APPROOT . '/views/includes/navigation_3.php';
    ?>
</div>

<div class="container">

<?php if(isLoggedIn()): ?>
      
    <a class="btn green" href="<?php echo URLROOT . "/loginprofs"  ?>">
                    Connectez vous avotre espace professeur            
    </a>

   
    <?php endif; ?>

    <?php foreach($data['utilisateurs'] as $utilisateur): ?>
        
        <div class="container-item">
        <?php if(null !==($_SESSION['id_utilisateur'] &&  $_SESSION['fonction'] =='professeur' )): ?>
  
                <a
                    class="btn orange"
                    href="<?php echo URLROOT . "/professeurs/update/" . $utilisateur->id_utilisateur ?>">
                    Update
                    
                </a>

                <form action="<?php echo URLROOT . "/professeurs/delete/" . $utilisateur->id_utilisateur ?>" method="POST">
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
