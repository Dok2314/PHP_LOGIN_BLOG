<?php
include "core.php";

unset($_SESSION['id']);
unset($_SESSION['name']);
unset($_SESSION['is_admin']);

header('Location: ' . '/');