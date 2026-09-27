<?php

// Clean user input
function clean_input($data) {
    return htmlspecialchars(trim($data));
}

// Check if a field is empty
function is_empty($data) {
    return empty(trim($data));
}

// Validate email
function is_valid_email($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

?>