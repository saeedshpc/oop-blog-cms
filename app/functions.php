<?php

function old($field) {
    return isset($_POST[$field]) ? $_POST[$field] : "";
}