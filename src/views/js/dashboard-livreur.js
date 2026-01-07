// Dashboard Livreur - Gestion des interactions

document.addEventListener('DOMContentLoaded', function() {
    // Modal notifications
    const notificationBtn = document.getElementById('notificationBtn');
    const notificationModal = document.getElementById('notificationModal');
    const closeNotificationModal = document.getElementById('closeNotificationModal');
    
    if (notificationBtn && notificationModal) {
        notificationBtn.addEventListener('click', function() {
            notificationModal.classList.remove('hidden');
            // Masquer le badge après ouverture
            const badge = document.getElementById('notificationBadge');
            if (badge) {
                badge.classList.add('hidden');
            }
        });
    }
    
    if (closeNotificationModal && notificationModal) {
        closeNotificationModal.addEventListener('click', function() {
            notificationModal.classList.add('hidden');
        });
    }
    
    // Fermer le modal notifications en cliquant en dehors
    if (notificationModal) {
        notificationModal.addEventListener('click', function(e) {
            if (e.target === notificationModal) {
                notificationModal.classList.add('hidden');
            }
        });
    }
    
    // Filtrage
    const typeFilter = document.getElementById('typeFilter');
    const statusFilter = document.getElementById('statusFilter');
    
    if (typeFilter) {
        typeFilter.addEventListener('change', function() {
            const selectedType = this.value;
            console.log('Filtrage par type:', selectedType);
            // Filtrer les commandes affichées
        });
    }
    
    if (statusFilter) {
        statusFilter.addEventListener('change', function() {
            const selectedStatus = this.value;
            console.log('Filtrage par statut:', selectedStatus);
            // Filtrer les commandes affichées
        });
    }
    
    // Bouton d'envoi rapide d'offre
    const quickOfferButtons = document.querySelectorAll('button[class*="fa-paper-plane"]');
    quickOfferButtons.forEach(button => {
        button.addEventListener('click', function() {
            // Rediriger vers la page de détail pour envoyer une offre
            const commandeCard = this.closest('.bg-white');
            const commandeId = commandeCard.querySelector('h3').textContent.match(/#(\d+)/)[1];
            window.location.href = `commande-livreur-detail.html?id=${commandeId}`;
        });
    });
});

