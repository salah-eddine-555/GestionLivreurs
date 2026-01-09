
    <!DOCTYPE html>
    <html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Dashboard Client - Application de Livraison</title>
        <script src="https://cdn.tailwindcss.com"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body class="bg-gray-50">
        <!-- Navigation -->
    <?php include_once __DIR__ . '/navigation.php'; ?>
        
        <div class="flex pt-16">
            <!-- Sidebar -->
            <aside class="w-64 bg-white shadow-lg fixed left-0 top-16 bottom-0 overflow-y-auto z-30">
                <nav class="p-4 space-y-2">
                    <a href="/GestionLivreurs/src/public/index.php?action=clientCommandes" class="flex items-center space-x-3 px-4 py-3 bg-indigo-50 text-indigo-600 rounded-lg font-medium">
                        <i class="fas fa-home"></i>
                        <span>Dashboard</span>
                    </a>
                    <a href="/GestionLivreurs/src/public/index.php?action=clientCommandes" class="flex items-center space-x-3 px-4 py-3 text-gray-700 hover:bg-gray-100 rounded-lg transition">
                        <i class="fas fa-shopping-cart"></i>
                        <span>Mes commandes</span>
                    </a>
                    <a href="/GestionLivreurs/src/public/index.php?action=notifications" class="flex items-center space-x-3 px-4 py-3 text-gray-700 hover:bg-gray-100 rounded-lg transition">
                        <i class="fas fa-bell"></i>
                        <span>Notifications</span>
                        <span class="ml-auto bg-red-500 text-white text-xs rounded-full px-2 py-1">3</span>
                    </a>
                    <a href="/GestionLivreurs/src/public/index.php?action=profil" class="flex items-center space-x-3 px-4 py-3 text-gray-700 hover:bg-gray-100 rounded-lg transition">
                        <i class="fas fa-user"></i>
                        <span>Mon profil</span>
                    </a>
                </nav>
            </aside>

            <!-- Main Content -->
            <main class="flex-1 ml-64 p-8">
            <!-- Header -->
            <div class="mb-8">
                <h2 class="text-3xl font-bold text-gray-800 mb-2">Mes commandes</h2>
                <p class="text-gray-600">Gérez vos commandes de livraison</p>
            </div>

            <!-- Actions -->
            <div class="mb-6 flex justify-between items-center">
                <div class="flex space-x-4">
                    <button id="filterBtn" class="px-4 py-2 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 transition">
                        <i class="fas fa-filter mr-2"></i>Filtrer
                    </button>
                    <select id="statusFilter" class="px-4 py-2 bg-white border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500">
                        <option value="">Tous les statuts</option>
                        <option value="creee">Créée</option>
                        <option value="en_attente">En attente d'offres</option>
                        <option value="en_cours">En cours de traitement</option>
                        <option value="expediee">Expédiée</option>
                        <option value="terminee">Terminée</option>
                        <option value="annulee">Annulée</option>
                    </select>
                </div>
                <button id="newOrderBtn" class="px-6 py-3 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition shadow-lg">
                    <i class="fas fa-plus mr-2"></i>Nouvelle commande
                </button>
            </div>

            <!-- Statistiques rapides -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
                <div class="bg-white rounded-lg shadow p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-600 text-sm">Total commandes</p>
                            <p class="text-2xl font-bold text-gray-800">12</p>
                        </div>
                        <div class="bg-blue-100 p-3 rounded-full">
                            <i class="fas fa-shopping-cart text-blue-600"></i>
                        </div>
                    </div>
                </div>
                <div class="bg-white rounded-lg shadow p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-600 text-sm">En attente</p>
                            <p class="text-2xl font-bold text-gray-800">3</p>
                        </div>
                        <div class="bg-yellow-100 p-3 rounded-full">
                            <i class="fas fa-clock text-yellow-600"></i>
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
                            <p class="text-gray-600 text-sm">Terminées</p>
                            <p class="text-2xl font-bold text-gray-800">7</p>
                        </div>
                        <div class="bg-green-100 p-3 rounded-full">
                            <i class="fas fa-check-circle text-green-600"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Liste des commandes -->
            <div class="bg-white rounded-lg shadow overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">titre</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Description</th>

                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Statut</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                <tbody class="bg-white divide-y divide-gray-200">

                <?php if (empty($commandes)): ?>
        <tr>
            <td colspan="8" class="text-center py-4 text-gray-500">
                Aucune commande trouvée
            </td>
        </tr>
    <?php else: ?>
        <?php foreach ($commandes as $commande): ?>
            <tr class="hover:bg-gray-50 transition">
                
                <!-- ID -->
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                    <?= $commande->getTitreCommande(); ?>
                </td>

                <!-- Description -->
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                    <?= htmlspecialchars($commande->getDescriptionCommande()); ?>
                </td>

                <!-- Statut -->
                <td class="px-6 py-4 whitespace-nowrap">
                    <?php
                        $statut = $commande->getStatut();
                        $class = match ($statut) {
                            'cree'      => 'bg-yellow-100 text-yellow-800',
                            'en_cours'  => 'bg-indigo-100 text-indigo-800',
                            'livree'    => 'bg-green-100 text-green-800',
                            'annulee'   => 'bg-red-100 text-red-800',
                            default     => 'bg-gray-100 text-gray-800',
                        };
                    ?>
                    <span class="px-2 py-1 text-xs font-semibold rounded-full <?= $class ?>">
                        <?= ucfirst(str_replace('_', ' ', $statut)); ?>
                    </span>
                </td>

                <!-- Date -->
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                    <?= date('d/m/Y', strtotime($commande->getCreatedAt())); ?>
                </td>

                <!-- Actions -->
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                    <a href="index.php?action=commandeDetail&id=<?= $commande->getIdCommande(); ?>"
                    class="text-indigo-600 hover:text-indigo-900 mr-3">
                        Voir
                    </a>
                    <a href="index.php?action=deleteCommande&id=<?= $commande->getIdCommande(); ?>"
                    class="text-red-600 hover:text-red-900">
                        Supprimer
                    </a>
                </td>

            </tr>
        <?php endforeach; ?>
    <?php endif; ?>
                </tbody>
                    </table>
                </div>
            </div>
            </main>
        </div>

        <!-- Modal Nouvelle Commande -->
        <div id="newOrderModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
            <div class="bg-white rounded-lg shadow-xl max-w-2xl w-full mx-4 max-h-[90vh] overflow-y-auto">
                <div class="p-6 border-b">
                    <h3 class="text-2xl font-bold text-gray-800">Nouvelle commande</h3>
                </div>
                <form id="newOrderForm" method = "POST" action="/GestionLivreurs/src/public/CommandeTraitement.php" class="p-6 space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Titre</label>
                        <input type="text" name="titre" 
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500"
                            placeholder="Titre Commande"
                            >
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Description</label>
                        <textarea name="description"  rows="3"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500"
                                placeholder="Décrivez votre commande..."></textarea>
                    </div>
                
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Adresse Depart</label>
                            <input type="text" name="adresseDepart" 
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Adresse Arrivee</label>
                            <input type="text" name="adresseArrivee" 
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500">
                        </div>
                    </div>
                    <div class="flex justify-end space-x-4 pt-4">
                        <button type="button" id="cancelOrderBtn" class="px-6 py-2 border border-gray-300 rounded-lg hover:bg-gray-50">
                            Annuler
                        </button>
                        <button type="submit" class="px-6 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700">
                            Créer la commande
                        </button>
                    </div>
                </form>
            </div>
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
                        <div class="p-4 bg-blue-50 border-l-4 border-blue-500 rounded">
                            <p class="text-sm text-gray-800"><strong>Nouvelle offre reçue</strong></p>
                            <p class="text-xs text-gray-600 mt-1">Un livreur a envoyé une offre pour votre commande #001</p>
                            <p class="text-xs text-gray-500 mt-2">Il y a 5 minutes</p>
                        </div>
                        <div class="p-4 bg-green-50 border-l-4 border-green-500 rounded">
                            <p class="text-sm text-gray-800"><strong>Commande en cours</strong></p>
                            <p class="text-xs text-gray-600 mt-1">Votre commande #002 est maintenant en cours de traitement</p>
                            <p class="text-xs text-gray-500 mt-2">Il y a 1 heure</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="/GestionLivreurs/src/views/js/dashboard-client.js"></script>
        <script src="/GestionLivreurs/src/views/js/dashboard-selector.js"></script>
    </body>
    </html>

