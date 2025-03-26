<?php
function redirect(string $page): void {
    header("Location: http://localhost/owasp/Template-mvc-php/index.php?page=$page");
    exit;
}
?>