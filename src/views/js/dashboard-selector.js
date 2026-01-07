// Sélecteur de dashboard - Navigation entre les dashboards

document.addEventListener('DOMContentLoaded', function() {
    const dashboardSelector = document.getElementById('dashboardSelector');
    
    if (dashboardSelector) {
        dashboardSelector.addEventListener('change', function() {
            const selectedDashboard = this.value;
            
            switch(selectedDashboard) {
                case 'client':
                    window.location.href = 'dashboard-client.html';
                    break;
                case 'livreur':
                    window.location.href = 'dashboard-livreur.html';
                    break;
                case 'admin':
                    window.location.href = 'dashboard-admin.html';
                    break;
            }
        });
        
        // Définir la valeur actuelle selon la page
        const currentPath = window.location.pathname;
        if (currentPath.includes('dashboard-client') || currentPath.includes('commande-detail') || currentPath.includes('profil') || currentPath.includes('historique-notifications') || currentPath.includes('chat')) {
            dashboardSelector.value = 'client';
        } else if (currentPath.includes('dashboard-livreur') || currentPath.includes('commande-livreur') || currentPath.includes('commandes-en-cours')) {
            dashboardSelector.value = 'livreur';
        } else if (currentPath.includes('dashboard-admin')) {
            dashboardSelector.value = 'admin';
        }
    }
});

