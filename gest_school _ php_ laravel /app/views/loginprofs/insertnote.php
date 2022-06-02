<?php
   require APPROOT . '/views/includes/head.php';
?>

<div class="navbar">
    <?php
       require APPROOT . '/views/includes/navigation_3.php';
    ?>
</div>

<div class="container-login">
    <div class="wrapper-login">
        <h2>Register</h2>

            <form
                id="insertnote-form"
                method="POST"
                action="<?= URLROOT . '/loginprofs/insert_note/'.$data['id_etudiant'] .'/'. $data['id_professeur'] .'/'. $data['id_cursus'] .'/'. $data['id_matiere']?>"
                >
      <input type="text"name="note" placeholder="Note" required />
      <input type="text"  name="appreciation" placeholder="Appreciation" required />
      <input type="text" name="semestre" placeholder="Semestre" required />
      <input type="text"  name="annee_scolaire" placeholder="Année scolaire" required />
      <button id="submit" type="submit" value="submit">Valider</button>
        </form>
    </div>
</div>

