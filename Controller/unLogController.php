<?php
require_once("./services/response.php");
session_start();

$_SESSION = [];

session_destroy();

redirect("Logs");
exit();