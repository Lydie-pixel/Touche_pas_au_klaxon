<?php

function requireAdmin() {
    if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
        header("Location: /TOUCHE_PAS_AU_KLAXON/");
        exit;
    }
}