// Attendre que le document HTML soit complètement chargé et analysé
document.addEventListener('DOMContentLoaded', function () {
    // Sélectionner l'élément de saisie de recherche par son ID
    const searchInput = document.getElementById('search-input');
    // Sélectionner le corps du tableau des utilisateurs
    const userTable = document.getElementById('user-table').getElementsByTagName('tbody')[0];

    // Ajouter un écouteur d'événement pour détecter les changements dans l'input de recherche
    searchInput.addEventListener('input', function () {
        // Récupérer la valeur de l'input et la convertir en minuscules
        const filter = searchInput.value.toLowerCase();
        // Récupérer toutes les lignes du tableau
        const rows = userTable.getElementsByTagName('tr');

        // Parcourir chaque ligne du tableau
        for (let i = 0; i < rows.length; i++) {
            // Récupérer toutes les cellules de la ligne actuelle
            const cells = rows[i].getElementsByTagName('td');
            let match = false;

            // Parcourir chaque cellule de la ligne
            for (let j = 0; j < cells.length; j++) {
                // Vérifier si le texte de la cellule contient le filtre de recherche
                if (cells[j].innerText.toLowerCase().includes(filter)) {
                    match = true;
                    break;
                }
            }

            // Afficher ou masquer la ligne en fonction de la correspondance
            rows[i].style.display = match ? '' : 'none';
        }
    });
});