// Détail de la commande - Client

document.addEventListener('DOMContentLoaded', function() {
    // Accepter une offre
    const acceptOfferButtons = document.querySelectorAll('button[class*="bg-indigo-600"]');
    acceptOfferButtons.forEach(button => {
        if (button.textContent.includes('Accepter')) {
            button.addEventListener('click', function() {
                const offerCard = this.closest('.border');
                const livreurName = offerCard.querySelector('.font-semibold').textContent;
                
                if (confirm(`Êtes-vous sûr de vouloir accepter l'offre de ${livreurName} ?`)) {
                    // Simulation - À remplacer par un appel API
                    console.log('Offre acceptée');
                    alert('Offre acceptée ! La commande passe en cours de traitement.');
                    // Recharger la page pour mettre à jour le statut
                    // window.location.reload();
                }
            });
        }
    });
    
    // Modifier la commande
    const modifyButtons = document.querySelectorAll('button[class*="fa-edit"]');
    modifyButtons.forEach(button => {
        button.addEventListener('click', function() {
            // Vérifier si la commande peut être modifiée (statut "Créée" ou "En attente")
            const statusElement = document.querySelector('.bg-yellow-100, .bg-green-100');
            if (statusElement) {
                const status = statusElement.textContent.trim();
                if (status === 'En attente d\'offres' || status === 'Créée') {
                    // Ouvrir un modal de modification
                    alert('Fonctionnalité de modification à implémenter');
                } else {
                    alert('Cette commande ne peut plus être modifiée');
                }
            }
        });
    });
    
    // Annuler la commande
    const cancelButtons = document.querySelectorAll('button[class*="fa-times"]');
    cancelButtons.forEach(button => {
        if (button.textContent.includes('Annuler')) {
            button.addEventListener('click', function() {
                if (confirm('Êtes-vous sûr de vouloir annuler cette commande ?')) {
                    // Simulation - À remplacer par un appel API
                    console.log('Commande annulée');
                    alert('Commande annulée');
                    // Recharger la page
                    // window.location.reload();
                }
            });
        }
    });
    
    // Valider la livraison (si la commande est expédiée)
    const validateButtons = document.querySelectorAll('button');
    validateButtons.forEach(button => {
        if (button.textContent.includes('Valider la livraison')) {
            button.addEventListener('click', function() {
                if (confirm('Confirmer la réception de votre commande ?')) {
                    // Simulation - À remplacer par un appel API
                    console.log('Livraison validée');
                    alert('Livraison validée ! La commande est maintenant terminée.');
                    // Recharger la page
                    // window.location.reload();
                }
            });
        }
    });
});

