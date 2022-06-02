<nav class="top-nav">
    <ul>
        <li>
            <a href="<?= URLROOT; ?>/index">Accueil</a>
        </li>
        <li>
            <a href="<?= URLROOT; ?>/classes">Cursus</a>
        </li>
        <li>
        <li class="btn-login">
            <?php if(isset($_SESSION['id_utilisateur'])) : ?>
                <a href="<?= URLROOT; ?>/utilisateurs/logout">Log out</a>
            <?php else : ?>
                <a href="<?= URLROOT; ?>/utilisateurs/login">Login</a>
            <?php endif; ?>
        </li>
    </ul>
</nav>
