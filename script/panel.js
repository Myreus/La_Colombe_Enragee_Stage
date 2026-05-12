document.querySelectorAll('.tab-button').forEach(button => {
    button.addEventListener('click', () => {
        const tabId = button.getAttribute('data-tab');
        // Désactiver tous les contenus et tous les boutons
        document.querySelectorAll('.tab-content').forEach(tab => tab.classList.remove('active'));
        document.querySelectorAll('.tab-button').forEach(btn => btn.classList.remove('active'));
        // Activer l'onglet sélectionné
        document.getElementById(tabId).classList.add('active');
        button.classList.add('active');
    });
});