<?php
const AVLAIBLE_ROUTES = [
	"home" => ["template" => "homeController.php",
                "seo" => [
                    "title" => "Home",
                    "description" => "Page home"
                ]],
    "404" => ["template" => "404Controller.php",
                "seo" => [
                    "title" => "404",
                    "description" => "Page 404"
                ]],
    "Ajouter" => ["template" => "ajoutController.php",
                "seo" => [
                    "title" => "Ajout livre",
                    "description" => "Permet d'ajouter de nouveaux livres"
                ]],
    "Ajout_illustration" => ["template" => "illustrationController.php",
                "seo" => [
                    "title" => "Ajout d'une illustration",
                    "description" => "Permet d'ajouter de nouvelles illustrations"
                ]],         
    "Modifier" => ["template" => "modifierBookController.php",
                "seo" => [
                    "title" => "Modifier",
                    "description" => "Permet de choisir le livre à modifier"
                ]
    ],
    "Supprimer" => ["template" => "SupprimerBookController.php",
    "seo" => [
        "title" => "Supprimer",
        "description" => "Permet de choisir le livre à supprimer"
        ]
    ],
    "Logs" => ["template" => "logsController.php",
    "seo" => [
        "title" => "Logs",
        "description" => "Page de choix connexion ou inscription"
        ]
    ],
    "Login" => ["template" => "loginController.php",
    "seo" => [
        "title" => "Login",
        "description" => "Page de connexion"
        ]
    ],
    "SignIn" => ["template" => "signInController.php",
    "seo" => [
        "title" => "Inscription",
        "description" => "Page d'inscription"
        ]
    ],
    "Mailsign" => ["template" => "signMailController.php",
    "seo" => [
        "title" => "Mail",
        "description" => "Page de code mail pour s'inscrire"
        ]
    ],
    "Maillog" => ["template" => "logMailController.php",
    "seo" => [
        "title" => "Mail",
        "description" => "Page de code mail pour se connecter"
        ]
    ],
    "Deconnexion" => ["template" => "unLogController.php",
    "seo" => [
        "title" => "deconnexion",
        "description" => "Page de deconnexion"
        ]
    ],

];

const DEFAULT_ROUTE = AVLAIBLE_ROUTES['404'];