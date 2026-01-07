// Dashboard Admin - Gestion des interactions

document.addEventListener('DOMContentLoaded', function() {
    // Filtrage des utilisateurs
    const roleFilter = document.getElementById('roleFilter');
    const searchUser = document.getElementById('searchUser');
    
    if (roleFilter) {
        roleFilter.addEventListener('change', function() {
            const selectedRole = this.value;
            console.log('Filtrage par rôle:', selectedRole);
            // Filtrer les utilisateurs affichés
            filterUsers(selectedRole, searchUser ? searchUser.value : '');
        });
    }
    
    if (searchUser) {
        searchUser.addEventListener('input', function() {
            const searchTerm = this.value;
            console.log('Recherche:', searchTerm);
            // Filtrer les utilisateurs affichés
            filterUsers(roleFilter ? roleFilter.value : '', searchTerm);
        });
    }
    
    // Modification du rôle utilisateur
    const roleSelects = document.querySelectorAll('select[class*="border-gray-300"]');
    roleSelects.forEach(select => {
        select.addEventListener('change', function() {
            const userId = this.closest('tr').querySelector('td').textContent;
            const newRole = this.value;
            
            if (confirm(`Changer le rôle de l'utilisateur #${userId} en ${newRole} ?`)) {
                // Simulation - À remplacer par un appel API
                console.log('Rôle modifié:', { userId, newRole });
                alert('Rôle modifié avec succès');
            } else {
                // Annuler le changement
                this.value = this.getAttribute('data-original-value') || '';
            }
        });
    });
    
    // Activer/Désactiver un utilisateur
    const actionButtons = document.querySelectorAll('button[class*="text-red-600"], button[class*="text-green-600"]');
    actionButtons.forEach(button => {
        button.addEventListener('click', function() {
            const userId = this.closest('tr').querySelector('td').textContent;
            const action = this.textContent.trim();
            
            if (confirm(`Êtes-vous sûr de vouloir ${action.toLowerCase()} l'utilisateur #${userId} ?`)) {
                // Simulation - À remplacer par un appel API
                console.log('Action utilisateur:', { userId, action });
                alert(`Utilisateur ${action.toLowerCase()} avec succès`);
                // Recharger la page ou mettre à jour l'interface
                // window.location.reload();
            }
        });
    });
    
    // Export CSV
    const exportButtons = document.querySelectorAll('button[class*="fa-download"]');
    exportButtons.forEach(button => {
        button.addEventListener('click', function() {
            // Simulation - À remplacer par un appel API
            console.log('Export CSV');
            alert('Export CSV en cours...');
            // Télécharger le fichier CSV
        });
    });
    
    // Fonction de filtrage des utilisateurs
    function filterUsers(role, searchTerm) {
        const rows = document.querySelectorAll('tbody tr');
        rows.forEach(row => {
            const roleCell = row.querySelector('select').value;
            const nameCell = row.querySelectorAll('td')[1].textContent.toLowerCase();
            const emailCell = row.querySelectorAll('td')[2].textContent.toLowerCase();
            
            const matchesRole = !role || roleCell === role;
            const matchesSearch = !searchTerm || 
                nameCell.includes(searchTerm.toLowerCase()) || 
                emailCell.includes(searchTerm.toLowerCase());
            
            if (matchesRole && matchesSearch) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    }
});

