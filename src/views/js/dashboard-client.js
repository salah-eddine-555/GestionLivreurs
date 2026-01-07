// Dashboard Client - Gestion des interactions

document.addEventListener('DOMContentLoaded', function() {
    // Modal nouvelle commande
    const newOrderBtn = document.getElementById('newOrderBtn');
    const newOrderModal = document.getElementById('newOrderModal');
    const cancelOrderBtn = document.getElementById('cancelOrderBtn');
    const newOrderForm = document.getElementById('newOrderForm');
    
    if (newOrderBtn && newOrderModal) {
        newOrderBtn.addEventListener('click', function() {
            newOrderModal.classList.remove('hidden');
        });
    }
    
    if (cancelOrderBtn && newOrderModal) {
        cancelOrderBtn.addEventListener('click', function() {
            newOrderModal.classList.add('hidden');
        });
    }
    
    // Fermer le modal en cliquant en dehors
    if (newOrderModal) {
        newOrderModal.addEventListener('click', function(e) {
            if (e.target === newOrderModal) {
                newOrderModal.classList.add('hidden');
            }
        });
    }
    
    // // Soumission du formulaire de nouvelle commande
    // if (newOrderForm) {
    //     newOrderForm.addEventListener('submit', function(e) {
    //         e.preventDefault();
            
    //         const formData = new FormData(newOrderForm);
    //         const data = Object.fromEntries(formData);
            
    //         // Simulation - À remplacer par un appel API
    //         console.log('Nouvelle commande:', data);
            
    //         alert('Commande créée avec succès !');
    //         newOrderModal.classList.add('hidden');
    //         newOrderForm.reset();
            
    //         // Recharger la page pour afficher la nouvelle commande
    //         // window.location.reload();
    //     });
    // }
    
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
    
    // Filtrage par statut
    const statusFilter = document.getElementById('statusFilter');
    if (statusFilter) {
        statusFilter.addEventListener('change', function() {
            const selectedStatus = this.value;
            // Simulation de filtrage - À remplacer par un appel API
            console.log('Filtrage par statut:', selectedStatus);
            // Ici, vous filtreriez les commandes affichées
        });
    }
    
    // Gestion de la suppression de commande
    const deleteButtons = document.querySelectorAll('button[class*="text-red-600"]');
    deleteButtons.forEach(button => {
        if (button.textContent.includes('Supprimer')) {
            button.addEventListener('click', function() {
                if (confirm('Êtes-vous sûr de vouloir supprimer cette commande ?')) {
                    // Simulation - À remplacer par un appel API
                    console.log('Suppression de commande');
                    alert('Commande supprimée (soft delete)');
                    // Recharger ou masquer l'élément
                }
            });
        }
    });
});

