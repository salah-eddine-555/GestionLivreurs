<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Livreur - Application de Livraison</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body class="bg-gray-50">
    <!-- Navigation -->
   <?php include_once __DIR__ . '/../client/navigation.php'; ?>

    <div class="flex pt-16">
        <!-- Sidebar -->
        <aside class="w-64 bg-white shadow-lg fixed left-0 top-16 bottom-0 overflow-y-auto z-30">
            <nav class="p-4 space-y-2">
                <a href="dashboard-livreur.html" class="flex items-center space-x-3 px-4 py-3 bg-indigo-50 text-indigo-600 rounded-lg font-medium">
                    <i class="fas fa-home"></i>
                    <span>Dashboard</span>
                </a>
                <a href="dashboard-livreur.html" class="flex items-center space-x-3 px-4 py-3 text-gray-700 hover:bg-gray-100 rounded-lg transition">
                    <i class="fas fa-list"></i>
                    <span>Commandes disponibles</span>
                </a>
                <a href="commandes-en-cours-livreur.html" class="flex items-center space-x-3 px-4 py-3 text-gray-700 hover:bg-gray-100 rounded-lg transition">
                    <i class="fas fa-truck"></i>
                    <span>Mes commandes en cours</span>
                </a>
                <a href="historique-notifications.html" class="flex items-center space-x-3 px-4 py-3 text-gray-700 hover:bg-gray-100 rounded-lg transition">
                    <i class="fas fa-bell"></i>
                    <span>Notifications</span>
                    <span class="ml-auto bg-red-500 text-white text-xs rounded-full px-2 py-1">2</span>
                    
                <a href="profil.html" class="flex items-center space-x-3 px-4 py-3 text-gray-700 hover:bg-gray-100 rounded-lg transition">
                    <i class="fas fa-user"></i>
                    <span>Mon profil</span>
                </a>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 ml-64 p-8">
        <!-- Header -->
        <div class="mb-8">
            <h2 class="text-3xl font-bold text-gray-800 mb-2">Commandes disponibles</h2>
            <p class="text-gray-600">Consultez et proposez des offres pour les commandes</p>
        </div>

        <!-- Statistiques rapides -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
            <div class="bg-white rounded-lg shadow p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-600 text-sm">Commandes disponibles</p>
                        <p class="text-2xl font-bold text-gray-800">8</p>
                    </div>
                    <div class="bg-blue-100 p-3 rounded-full">
                        <i class="fas fa-list text-blue-600"></i>
                    </div>
                </div>
            </div>
            <div class="bg-white rounded-lg shadow p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-600 text-sm">Mes offres</p>
                        <p class="text-2xl font-bold text-gray-800">5</p>
                    </div>
                    <div class="bg-yellow-100 p-3 rounded-full">
                        <i class="fas fa-paper-plane text-yellow-600"></i>
                    </div>
                </div>
            </div>
            <div class="bg-white rounded-lg shadow p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-600 text-sm">En cours</p>
                        <p class="text-2xl font-bold text-gray-800">2</p>
                    </div>
                    <div class="bg-indigo-100 p-3 rounded-full">
                        <i class="fas fa-truck text-indigo-600"></i>
                    </div>
                </div>
            </div>
            <div class="bg-white rounded-lg shadow p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-600 text-sm">Note moyenne</p>
                        <p class="text-2xl font-bold text-gray-800">4.8/5</p>
                    </div>
                    <div class="bg-green-100 p-3 rounded-full">
                        <i class="fas fa-star text-green-600"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Filtres -->
        <div class="mb-6 flex space-x-4">
            <select id="typeFilter" class="px-4 py-2 bg-white border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500">
                <option value="">Tous les types</option>
                <option value="standard">Standard</option>
                <option value="fragile">Fragile</option>
                <option value="express">Express</option>
                <option value="volumineux">Volumineux</option>
            </select>
            <select id="statusFilter" class="px-4 py-2 bg-white border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500">
                <option value="">Tous les statuts</option>
                <option value="creee">Créée</option>
                <option value="en_attente">En attente d'offres</option>
            </select>
        </div>

        <!-- Liste des commandes -->
  <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">    

    <?php foreach($commandes as $commande): ?>
    <!-- Carte commande -->
    <div class="bg-white rounded-lg shadow hover:shadow-lg transition p-6">
        <div class="flex justify-between items-start mb-4">
            <div>
                <h3 class="text-lg font-bold text-gray-800">Commande #<?= $commande['idCommande'] ?></h3>
                <p class="text-sm text-gray-600"><?= $commande['created_at'] ?></p>
            </div>
            <span class="px-2 py-1 <?= getStatusColor($commande['statut']) ?> rounded-full text-xs font-semibold">
                <?= ucfirst(str_replace('_',' ',$commande['statut'])) ?>
            </span>
        </div>
        <div class="mb-4">
            <p class="text-gray-700 mb-2"><strong>Titre:</strong></p>
            <p class="text-sm text-gray-600"><?= htmlspecialchars($commande['titreCommande']) ?></p>
        </div>
        <div class="mb-4">
            <p class="text-gray-700 mb-2"><strong>Description:</strong></p>
            <p class="text-sm text-gray-600"><?= htmlspecialchars($commande['descriptionCommande']) ?></p>
        </div>
        <div class="mb-4">
            <span class="px-2 py-1 bg-purple-100 text-purple-800 rounded text-xs">
                <?= htmlspecialchars($commande['titreCommande']) ?>
            </span>
        </div>
        <div class="mb-4 p-3 bg-gray-50 rounded">
            <p class="text-xs text-gray-600 mb-1">Offres reçues:</p>
            <p class="text-sm font-semibold text-gray-800">Aucune offre</p>
        </div>
        <div class="flex space-x-2">
            <a href="index.php?action=livreur.commande.detail&id=<?= $commande['idCommande'] ?>" class="flex-1 px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition text-center">
                Voir détails
            </a>
            <button class="px-4 py-2 border border-indigo-600 text-indigo-600 rounded-lg hover:bg-indigo-50 transition">
                <i class="fas fa-paper-plane"></i>
            </button>
        </div>
    </div>
    <?php endforeach; ?>

</div>

<?php
// Fonction pour colorer le statut
function getStatusColor($statut){
    return match($statut){
        'cree' => 'bg-yellow-100 text-yellow-800',
        'en_cours' => 'bg-blue-100 text-blue-800',
        'livree' => 'bg-green-100 text-green-800',
        'annulee' => 'bg-red-100 text-red-800',
        default => 'bg-gray-100 text-gray-800',
    };
}
?>
        </main>
    </div>

    <!-- Modal Notifications -->
    <div id="notificationModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
        <div class="bg-white rounded-lg shadow-xl max-w-md w-full mx-4">
            <div class="p-6 border-b flex justify-between items-center">
                <h3 class="text-xl font-bold text-gray-800">Notifications</h3>
                <button id="closeNotificationModal" class="text-gray-500 hover:text-gray-700">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="p-6 max-h-96 overflow-y-auto">
                <div class="space-y-4">
                    <div class="p-4 bg-green-50 border-l-4 border-green-500 rounded">
                        <p class="text-sm text-gray-800"><strong>Offre acceptée</strong></p>
                        <p class="text-xs text-gray-600 mt-1">Votre offre pour la commande #002 a été acceptée</p>
                        <p class="text-xs text-gray-500 mt-2">Il y a 2 heures</p>
                    </div>
                    <div class="p-4 bg-blue-50 border-l-4 border-blue-500 rounded">
                        <p class="text-sm text-gray-800"><strong>Commande en cours</strong></p>
                        <p class="text-xs text-gray-600 mt-1">La commande #002 est maintenant en cours de traitement</p>
                        <p class="text-xs text-gray-500 mt-2">Il y a 1 heure</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="../js/dashboard-livreur.js"></script>
    <script src="../js/dashboard-selector.js"></script>
</body>
</html>

