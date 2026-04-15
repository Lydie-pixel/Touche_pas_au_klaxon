<?php

/**
 * Check if user is admin
 *
 * @return void
 */
function requireAdmin() {
    if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
        throw new Exception("Not admin");
    }
}

/**
 * Check if user is logged in
 *
 * @return void
 */
function requireLogin() {
    if (!isset($_SESSION['user'])) {
        throw new Exception("Not logged in");
    }
}