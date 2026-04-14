<?php

/**
 * Check if user is admin
 *
 * @return void
 */
function requireAdmin() {
    if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
        header("Location: /TOUCHE_PAS_AU_KLAXON/");
        exit;
    }
}

/**
 * Check if user is logged in
 *
 * @return void
 */
function requireLogin() {
    if (!isset($_SESSION['user'])) {
        header("Location: /TOUCHE_PAS_AU_KLAXON/login");
        exit;
    }
}