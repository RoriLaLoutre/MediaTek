# Projet « MediaTek »
pour faire fonctionner utiliser la base sql donnée en mail
+
creer un env.php à la racine du projet contenant les variables suivantes avec les noms adaptés à vos besoins:

 const db = '';
 const host = '';
 const port = '';
 const dbname = '';
 const username = '';
 const password = '';

## État d'avancement
- TPs 01 à 03
- [x] CR(U)D `Book` avec validation / *sanitization*
- [x] CR(U)D `Illustration` avec validation / *sanitization*
- [x] CR(U)D `User` avec validation / *sanitization*
- [x] Authentification standard
- [x] MFA simple (au moyen de la fonction `fakeMailSend()`)
- [x] *Refactoring*
- [x] Script `env.php` protégé
- [x] Script `utils/db_connect.php`
- [ ] Gestion des autorisations côté *front*
- [ ] Gestion des autorisations côté *back*
- Complément (**obligatoire**)
- [x] Validation et *sanitization* via la fonction `filter_input()`
- [ ] Protection CSRF
- [ ] Gestion des exceptions liées à MySQL
- [ ] Journalisation des erreurs *« techniques »*
- [ ] Journalisation des accès non autorisés
