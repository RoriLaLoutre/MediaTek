<div id = "home">
    <h1>Liste de nos livres :</h1>
    <div id = 'books'>
        <?php foreach($books as $book) {?>
            <div id="book">
                <h2><?= $book['title'] ?></h2>
                <p>ISBN : <?= $book['isbn'] ?></p>
                <p>Sommaire : <?= $book['summary'] ?></p>
                <p>Date de publication : <?= $book['publication_year'] ?></p>
                <?php foreach($illustrations as $illustration) {
                    if ($illustration['book_id'] == $book['id']) { ?>
                        <img src="assets/illustrations/<?= $illustration['filename'] ?>" alt="<?= $illustration['description'] ?>" class = "reduced_img">
                    <?php }
                } ?>
                <br>
                <a href="index.php?page=Ajout_illustration&id=<?= $book["id"] ?>">Ajouter Illustration</a>
                <a href="index.php?page=Modifier&id=<?= $book["id"] ?>">Modifier livre</a>
                <a href="index.php?page=Supprimer&id=<?= $book["id"] ?>" class="delete-button">Supprimer livre</a>
            </div>
        <?php } ?>

    </div>

    <div id="confirmation-box" class="hidden">
        <p>Êtes-vous sûr de vouloir supprimer cette ressource ?</p>
        <button id="confirm-delete">Oui, supprimer</button>
        <button id="cancel-delete">Annuler</button>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
        const deleteButtons = document.querySelectorAll(".delete-button");
        const confirmationBox = document.getElementById("confirmation-box");
        const confirmDelete = document.getElementById("confirm-delete");
        const cancelDelete = document.getElementById("cancel-delete");

        let deleteUrl = "";

        deleteButtons.forEach(button => {
            button.addEventListener("click", function (event) {
                event.preventDefault();
                deleteUrl = this.getAttribute("href"); // récupère le lien de suppression
                confirmationBox.style.display = "block"; // affiche la boîte de confirmation
            });
        });

        cancelDelete.addEventListener("click", function () {
            confirmationBox.style.display = "none"; // cache la boîte si l'utilisateur annule
        });

        confirmDelete.addEventListener("click", function () {
            window.location.href = deleteUrl; // redirige vers la suppression
        });
    });
</script>


</div>