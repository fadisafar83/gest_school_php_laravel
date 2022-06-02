<?php
    session_start();

    function isLoggedIn() {
        if (isset($_SESSION['id_utilisateur'])) {
            return true;
        } else {
            return false;
        }
    }
