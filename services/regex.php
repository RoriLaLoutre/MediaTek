<?php

$validPatterns = array(
    "isbn"           => "/^[0-9]{13}$/",
    "year"           => "/^[0-9]{4}$/", // TODO: Refine this regex
    "mail"           => "/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/",
);