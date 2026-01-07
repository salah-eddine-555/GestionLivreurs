// Historique des notifications

document.addEventListener('DOMContentLoaded', function() {
    const dashboardSelector = document.getElementById('dashboardSelector');
    const notificationBtn = document.getElementById('notificationBtn');
    const markAllReadBtn = document.querySelector('button[class*="fa-check-double"]');
    
    // Sélecteur de dashboard
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
    }
    
    // Marquer toutes les notifications comme lues
    if (markAllReadBtn) {
        markAllReadBtn.addEventListener('click', function() {
            // Simulation - À remplacer par un appel API
            console.log('Marquer toutes les notifications comme lues');
            alert('Toutes les notifications ont été marquées comme lues');
            
            // Retirer les badges "non lues"
            document.querySelectorAll('.bg-blue-50').forEach(notif => {
                notif.classList.remove('bg-blue-50');
                notif.classList.add('bg-white');
            });
        });
    }
});

