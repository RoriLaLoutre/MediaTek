<?php
function redirect(string $page): void {
    header("Location: http://localhost/MVC-site/index.php?page=home");
    exit;
}
?>