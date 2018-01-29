<?php

require_once 'connect.php';

if (!function_exists('displayMessage')) {
    function displayMessage()
    {
        $output = '';
        if (isset($_SESSION['success'])) {
            $output .= '<div class="alert alert-success">';
            $output .= ucfirst(strtolower($_SESSION['success']));
            $output .= '</div>';
            unset($_SESSION['success']);
        } else if (isset($_SESSION['fail'])) {
            $output .= '<div class="alert alert-danger">';
            $output .= ucfirst(strtolower($_SESSION['fail']));
            $output .= '</div>';
            unset($_SESSION['fail']);
        }
        return $output;
    }
}
