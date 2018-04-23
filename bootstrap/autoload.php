<?php

if (!session_id()) @session_start();

require __DIR__ . '/../vendor/autoload.php';

$flash = new \Plasticbrain\FlashMessages\FlashMessages();