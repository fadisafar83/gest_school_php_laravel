<?php
   require APPROOT . '/views/includes/head.php';
?>

<div class="navbar dark">
    <?php
       require APPROOT . '/views/includes/navigation_1.php';
    ?>
</div>

<div class="container">
    <?php if(isLoggedIn()): ?>
        <a class="btn green" href="<?php echo URLROOT; ?>/admins/insert">
            Insert nouveau Utilisateur
        </a> 
    <?php endif; ?>

    <p><h1>List des Utilisateurs</h1></p>
<table class= "tablex">
    <tr>
        <th>Nom</th>
        <th>Prenom</th>
        <th>Email</th>
        <th>Fonction</th>
        <th width="70px">Modifier</th>
        <th width="70px">Supprimer</th>

    </tr>
    <?php foreach($data['utilisateurs'] as $utilisateur): ?>
        <tr>
        <td><?= $utilisateur->nom;?></td>
        <td><?= $utilisateur->prenom;?></td>
        <td><?= $utilisateur->email;?></td>
        <td><?= $utilisateur->fonction;?></td>

        <?php if(null !==($_SESSION['id_utilisateur'] &&  $_SESSION['fonction'] =='admin' )): ?>

<td><a
    class="btn orange"
    href="<?php echo URLROOT . "/admins/update/" . $utilisateur->id_utilisateur ?>">Modifier</a></td>
<td><form action="<?php echo URLROOT . "/admins/delete/" . $utilisateur->id_utilisateur ?>" method="POST">
    <input type="submit" name="delete" value="Delete" class="btn red">
</form><td>
<?php endif; ?>
        </tr>
<?php endforeach; ?>
</table>
<br><br>
    <p><h1>List des etudiants de classe CP</h1></p>
<table class= "tablex">
    <tr>
        <th>Cursus</th>
        <th>Matière</th>
        <th>Nom professeur</th>
        <th>ID etudiant</th>
        <th>Nom</th>
        <th>Prenom</th>
        <th>Note</th>
        <th>Appréciation</th>

    </tr>
    <?php foreach($data['cpstudents'] as $cpstudents): ?>
        <tr>
        <td><?= $cpstudents->nom_cursus; ?></td>
        <td><?= $cpstudents->nom_matiere; ?></td>
        <td><?= $cpstudents->nom_professeur; ?></td>
        <td><?= $cpstudents->id_etudiant; ?></td>
        <td><?= $cpstudents->nom_etudiant; ?></td>
        <td><?= $cpstudents->prenom_etudiant; ?></td>
        <td><?= $cpstudents->note; ?></td>
        <td><?= $cpstudents->appreciation; ?></td>
    </tr>
    <?php endforeach; ?>
</table>
<br><br>

<p><h1>List des etudiants de classe CE1</h1></p>
<table class= "tablex">
    <tr>
        <th>Cursus</th>
        <th>Matière</th>
        <th>Nom professeur</th>
        <th>ID etudiant</th>
        <th>Nom</th>
        <th>Prenom</th>
        <th>Note</th>
        <th>Appréciation</th>

    </tr>
    <?php foreach($data['ce1students'] as $ce1students): ?>
        <tr>
        <td><?= $ce1students->nom_cursus;?></td>
        <td><?= $ce1students->nom_matiere;?></td>
        <td><?= $ce1students->nom_professeur;?></td>
        <td><?= $ce1students->id_etudiant;?></td>
        <td><?= $ce1students->nom_etudiant;?></td>
        <td><?= $ce1students->prenom_etudiant; ?></td>
        <td><?= $ce1students->note; ?></td>
        <td><?= $ce1students->appreciation; ?></td>
    </tr>
    <?php endforeach; ?>
</table>
<br><br>


<p><h1>List des etudiants de classe CE2</h1></p>
<table class= "tablex">
    <tr>
        <th>Cursus</th>
        <th>Matière</th>
        <th>Nom professeur</th>
        <th>ID etudiant</th>
        <th>Nom</th>
        <th>Prenom</th>
        <th>Note</th>
        <th>Appréciation</th>

    </tr>
    <?php foreach($data['ce2students'] as $ce2students): ?>
        <tr>
        <td><?= $ce2students->nom_cursus;?></td>
        <td><?= $ce2students->nom_matiere;?></td>
        <td><?= $ce2students->nom_professeur;?></td>
        <td><?= $ce2students->id_etudiant;?></td>
        <td><?= $ce2students->nom_etudiant;?></td>
        <td><?= $ce2students->prenom_etudiant; ?></td>
        <td><?= $ce2students->note; ?></td>
        <td><?= $ce2students->appreciation; ?></td>
    </tr>
    <?php endforeach; ?>
</table>
<br><br>


<p><h1>List des etudiants de classe CM1</h1></p>
<table class= "tablex">
    <tr>
        <th>Cursus</th>
        <th>Matière</th>
        <th>Nom professeur</th>
        <th>ID etudiant</th>
        <th>Nom</th>
        <th>Prenom</th>
        <th>Note</th>
        <th>Appréciation</th>

    </tr>
    <?php foreach($data['cm1students'] as $cm1students): ?>
        <tr>
        <td><?= $cm1students->nom_cursus;?></td>
        <td><?= $cm1students->nom_matiere;?></td>
        <td><?= $cm1students->nom_professeur;?></td>
        <td><?= $cm1students->id_etudiant;?></td>
        <td><?= $cm1students->nom_etudiant;?></td>
        <td><?= $cm1students->prenom_etudiant; ?></td>
        <td><?= $cm1students->note; ?></td>
        <td><?= $cm1students->appreciation; ?></td>
    </tr>
    <?php endforeach; ?>
</table>
<br><br>

<p><h1>List des etudiants de classe CM2</h1></p>
<table class= "tablex">
    <tr>
        <th>Cursus</th>
        <th>Matière</th>
        <th>Nom professeur</th>
        <th>ID etudiant</th>
        <th>Nom</th>
        <th>Prenom</th>
        <th>Note</th>
        <th>Appréciation</th>

    </tr>
    <?php foreach($data['cm2students'] as $cm2students): ?>
        <tr>
        <td><?= $cm2students->nom_cursus;?></td>
        <td><?= $cm2students->nom_matiere;?></td>
        <td><?= $cm2students->nom_professeur;?></td>
        <td><?= $cm2students->id_etudiant;?></td>
        <td><?= $cm2students->nom_etudiant;?></td>
        <td><?= $cm2students->prenom_etudiant; ?></td>
        <td><?= $cm2students->note; ?></td>
        <td><?= $cm2students->appreciation; ?></td>
    </tr>
    <?php endforeach; ?>
</table>
<br><br>


<p><h1>List des professeurs de classe CP</h1></p>
<table class= "tablex">
    <tr>
        <th>Cursus</th>
        <th>Matière</th>
        <th>ID professeur</th>
        <th>Nom professeur</th>
        <th>Prenom professeur</th>

    </tr>
    <?php foreach($data['cpprofesseursList'] as $cpprofesseursList): ?>
        <tr>
        <td><?= $cpprofesseursList->nom_cursus;?></td>
        <td><?= $cpprofesseursList->nom_matiere;?></td>
        <td><?= $cpprofesseursList->id_professeur;?></td>
        <td><?= $cpprofesseursList->nom_professeur;?></td>
        <td><?= $cpprofesseursList->prenom_professeur;?></td>
    </tr>
    <?php endforeach; ?>
</table>
<br><br>


<p><h1>List des professeurs de classe CE1</h1></p>
<table class= "tablex">
    <tr>
        <th>Cursus</th>
        <th>Matière</th>
        <th>ID professeur</th>
        <th>Nom professeur</th>
        <th>Prenom professeur</th>

    </tr>
    <?php foreach($data['ce1professeursList'] as $ce1professeursList): ?>
        <tr>
        <td><?= $ce1professeursList->nom_cursus;?></td>
        <td><?= $ce1professeursList->nom_matiere;?></td>
        <td><?= $ce1professeursList->id_professeur;?></td>
        <td><?= $ce1professeursList->nom_professeur;?></td>
        <td><?= $ce1professeursList->prenom_professeur;?></td>
    </tr>
    <?php endforeach; ?>
</table>
<br><br>

<p><h1>List des professeurs de classe CE2</h1></p>
<table class= "tablex">
    <tr>
        <th>Cursus</th>
        <th>Matière</th>
        <th>ID professeur</th>
        <th>Nom professeur</th>
        <th>Prenom professeur</th>

    </tr>
    <?php foreach($data['ce2professeursList'] as $ce2professeursList): ?>
        <tr>
        <td><?= $ce2professeursList->nom_cursus;?></td>
        <td><?= $ce2professeursList->nom_matiere;?></td>
        <td><?= $ce2professeursList->id_professeur;?></td>
        <td><?= $ce2professeursList->nom_professeur;?></td>
        <td><?= $ce2professeursList->prenom_professeur;?></td>
    </tr>
    <?php endforeach; ?>
</table>
<br><br>


<p><h1>List des professeurs de classe CM1</h1></p>
<table class= "tablex">
    <tr>
        <th>Cursus</th>
        <th>Matière</th>
        <th>ID professeur</th>
        <th>Nom professeur</th>
        <th>Prenom professeur</th>

    </tr>
    <?php foreach($data['cm1professeursList'] as $cm1professeursList): ?>
        <tr>
        <td><?= $cm1professeursList->nom_cursus;?></td>
        <td><?= $cm1professeursList->nom_matiere;?></td>
        <td><?= $cm1professeursList->id_professeur;?></td>
        <td><?= $cm1professeursList->nom_professeur;?></td>
        <td><?= $cm1professeursList->prenom_professeur;?></td>
    </tr>
    <?php endforeach; ?>
</table>
<br><br>

<p><h1>List des professeurs de classe CM2</h1></p>
<table class= "tablex">
    <tr>
        <th>Cursus</th>
        <th>Matière</th>
        <th>ID professeur</th>
        <th>Nom professeur</th>
        <th>Prenom professeur</th>

    </tr>
    <?php foreach($data['cm2professeursList'] as $cm2professeursList): ?>
        <tr>
        <td><?= $cm2professeursList->nom_cursus;?></td>
        <td><?= $cm2professeursList->nom_matiere;?></td>
        <td><?= $cm2professeursList->id_professeur;?></td>
        <td><?= $cm2professeursList->nom_professeur;?></td>
        <td><?= $cm2professeursList->prenom_professeur;?></td>
    </tr>
    <?php endforeach; ?>
</table>

</div>
  

