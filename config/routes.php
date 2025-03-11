<?php

const AVLAIBLE_ROUTES = [
	"home" => ["template" => "homeController.php",
                "seo" => [
                    "title" => "Home",
                    "description" => "Page home"
                ]],
    "about" => ["template" => "aboutController.php",
                "seo" => [
                    "title" => "about",
                    "description" => "Page about"
                ]],
    "404" => ["template" => "404Controller.php",
                "seo" => [
                    "title" => "404",
                    "description" => "Page 404"
                ]],
    "contact" => ["template" => "contactController.php",
                "seo" => [
                    "title" => "contact",
                    "description" => "Page contact"
                ]],
    "info" => ["template" => "infoController.php",
                "seo" => [
                    "title" => "info",
                    "description" => "Page info"
                ]],
    "Ajouter" => ["template" => "ajoutController.php",
                "seo" => [
                    "title" => "Ajout",
                    "description" => "Permet d'écrire de nouveaux articles"
                ]],
    "Modifier" => ["template" => "modifierController.php",
                "seo" => [
                    "title" => "Modifier",
                    "description" => "Permet de choisir l'article à modifier"
    ]],
    "Modifier-Article" => ["template" => "modifierArticleController.php",
                "seo" => [
                    "title" => "Modifier-Article",
                    "description" => "Permet de modifier les articles"
]],


];

const DEFAULT_ROUTE = AVLAIBLE_ROUTES['404'];