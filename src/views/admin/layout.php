<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - Application de Livraison</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body class="bg-gray-50">
    <!-- Navigation -->
    <nav class="bg-white shadow-lg fixed top-0 left-0 right-0 z-40">
        <div class="px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <h1 class="text-2xl font-bold text-indigo-600">LivraisonApp - Admin</h1>
                </div>
                <div class="flex items-center space-x-4">
                    <div class="relative">
                        <select id="dashboardSelector" class="px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 text-sm">
                            <option value="client">Dashboard Client</option>
                            <option value="livreur">Dashboard Livreur</option>
                            <option value="admin" selected>Dashboard Admin</option>
                        </select>
                    </div>
                    <div class="flex items-center space-x-2">
                        <a href="profil.html" class="text-gray-700 hover:text-indigo-600 transition">Admin</a>
                        <button class="text-gray-600 hover:text-indigo-600 transition">
                            <i class="fas fa-sign-out-alt"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <div class="flex pt-16">
        <!-- Sidebar -->
        <aside class="w-64 bg-white shadow-lg fixed left-0 top-16 bottom-0 overflow-y-auto z-30">
            <nav class="p-4 space-y-2">
                <a href="dashboard-admin.html" class="flex items-center space-x-3 px-4 py-3 bg-indigo-50 text-indigo-600 rounded-lg font-medium">
                    <i class="fas fa-home"></i>
                    <span>Dashboard</span>
                </a>
                <a href="dashboard-admin.html#statistiques" class="flex items-center space-x-3 px-4 py-3 text-gray-700 hover:bg-gray-100 rounded-lg transition">
                    <i class="fas fa-chart-bar"></i>
                    <span>Statistiques</span>
                </a>
                <a href="dashboard-admin.html#utilisateurs" class="flex items-center space-x-3 px-4 py-3 text-gray-700 hover:bg-gray-100 rounded-lg transition">
                    <i class="fas fa-users"></i>
                    <span>Gestion utilisateurs</span>
                </a>
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
            <h2 class="text-3xl font-bold text-gray-800 mb-2">Tableau de bord administrateur</h2>
            <p class="text-gray-600">Supervision et gestion de la plateforme</p>
        </div>

        <!-- Statistiques -->
        <div id="statistiques" class="mb-12">
            <h3 class="text-2xl font-bold text-gray-800 mb-6">Statistiques globales</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                <div class="bg-white rounded-lg shadow p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-600 text-sm">Commandes créées</p>
                            <p class="text-3xl font-bold text-gray-800">156</p>
                            <p class="text-sm text-green-600 mt-1">
                                <i class="fas fa-arrow-up"></i> +12% ce mois
                            </p>
                        </div>
                        <div class="bg-blue-100 p-4 rounded-full">
                            <i class="fas fa-shopping-cart text-blue-600 text-2xl"></i>
                        </div>
                    </div>
                </div>
                <div class="bg-white rounded-lg shadow p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-600 text-sm">Commandes terminées</p>
                            <p class="text-3xl font-bold text-gray-800">128</p>
                            <p class="text-sm text-green-600 mt-1">
                                <i class="fas fa-arrow-up"></i> +8% ce mois
                            </p>
                        </div>
                        <div class="bg-green-100 p-4 rounded-full">
                            <i class="fas fa-check-circle text-green-600 text-2xl"></i>
                        </div>
                    </div>
                </div>
                <div class="bg-white rounded-lg shadow p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-600 text-sm">Commandes annulées</p>
                            <p class="text-3xl font-bold text-gray-800">18</p>
                            <p class="text-sm text-red-600 mt-1">
                                <i class="fas fa-arrow-down"></i> -5% ce mois
                            </p>
                        </div>
                        <div class="bg-red-100 p-4 rounded-full">
                            <i class="fas fa-times-circle text-red-600 text-2xl"></i>
                        </div>
                    </div>
                </div>
                <div class="bg-white rounded-lg shadow p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-600 text-sm">Offres envoyées</p>
                            <p class="text-3xl font-bold text-gray-800">342</p>
                            <p class="text-sm text-blue-600 mt-1">
                                <i class="fas fa-arrow-up"></i> +15% ce mois
                            </p>
                        </div>
                        <div class="bg-yellow-100 p-4 rounded-full">
                            <i class="fas fa-paper-plane text-yellow-600 text-2xl"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
                <div class="bg-white rounded-lg shadow p-6">
                    <h4 class="text-lg font-bold text-gray-800 mb-4">Livreurs actifs</h4>
                    <div class="space-y-4">
                        <div class="flex items-center justify-between p-3 bg-gray-50 rounded">
                            <div class="flex items-center space-x-3">
                                <div class="w-10 h-10 bg-indigo-100 rounded-full flex items-center justify-center">
                                    <i class="fas fa-user text-indigo-600"></i>
                                </div>
                                <div>
                                    <p class="font-semibold text-gray-800">Martin Dubois</p>
                                    <p class="text-sm text-gray-600">12 commandes ce mois</p>
                                </div>
                            </div>
                            <span class="px-3 py-1 bg-green-100 text-green-800 rounded-full text-xs font-semibold">
                                Actif
                            </span>
                        </div>
                        <div class="flex items-center justify-between p-3 bg-gray-50 rounded">
                            <div class="flex items-center space-x-3">
                                <div class="w-10 h-10 bg-indigo-100 rounded-full flex items-center justify-center">
                                    <i class="fas fa-user text-indigo-600"></i>
                                </div>
                                <div>
                                    <p class="font-semibold text-gray-800">Sophie Martin</p>
                                    <p class="text-sm text-gray-600">8 commandes ce mois</p>
                                </div>
                            </div>
                            <span class="px-3 py-1 bg-green-100 text-green-800 rounded-full text-xs font-semibold">
                                Actif
                            </span>
                        </div>
                        <div class="flex items-center justify-between p-3 bg-gray-50 rounded">
                            <div class="flex items-center space-x-3">
                                <div class="w-10 h-10 bg-indigo-100 rounded-full flex items-center justify-center">
                                    <i class="fas fa-user text-indigo-600"></i>
                                </div>
                                <div>
                                    <p class="font-semibold text-gray-800">Pierre Durand</p>
                                    <p class="text-sm text-gray-600">5 commandes ce mois</p>
                                </div>
                            </div>
                            <span class="px-3 py-1 bg-yellow-100 text-yellow-800 rounded-full text-xs font-semibold">
                                Inactif
                            </span>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-lg shadow p-6">
                    <h4 class="text-lg font-bold text-gray-800 mb-4">Répartition des statuts</h4>
                    <div class="space-y-3">
                        <div>
                            <div class="flex justify-between mb-1">
                                <span class="text-sm text-gray-600">Terminées</span>
                                <span class="text-sm font-semibold text-gray-800">82%</span>
                            </div>
                            <div class="w-full bg-gray-200 rounded-full h-2">
                                <div class="bg-green-500 h-2 rounded-full" style="width: 82%"></div>
                            </div>
                        </div>
                        <div>
                            <div class="flex justify-between mb-1">
                                <span class="text-sm text-gray-600">En cours</span>
                                <span class="text-sm font-semibold text-gray-800">10%</span>
                            </div>
                            <div class="w-full bg-gray-200 rounded-full h-2">
                                <div class="bg-indigo-500 h-2 rounded-full" style="width: 10%"></div>
                            </div>
                        </div>
                        <div>
                            <div class="flex justify-between mb-1">
                                <span class="text-sm text-gray-600">Annulées</span>
                                <span class="text-sm font-semibold text-gray-800">8%</span>
                            </div>
                            <div class="w-full bg-gray-200 rounded-full h-2">
                                <div class="bg-red-500 h-2 rounded-full" style="width: 8%"></div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-6">
                        <button class="w-full px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition">
                            <i class="fas fa-download mr-2"></i>Exporter en CSV
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Gestion des utilisateurs -->
        <div id="utilisateurs" class="mb-12">
            <div class="flex justify-between items-center mb-6">
                <h3 class="text-2xl font-bold text-gray-800">Gestion des utilisateurs</h3>
                <div class="flex space-x-4">
                    <select id="roleFilter" class="px-4 py-2 bg-white border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500">
                        <option value="">Tous les rôles</option>
                        <option value="client">Client</option>
                        <option value="livreur">Livreur</option>
                        <option value="admin">Admin</option>
                    </select>
                    <input type="text" id="searchUser" placeholder="Rechercher..."
                           class="px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500">
                </div>
            </div>

            <div class="bg-white rounded-lg shadow overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nom</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Rôle</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Statut</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <tr class="hover:bg-gray-50 transition">
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">#001</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Jean Dupont</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">jean.dupont@email.com</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <select class="text-sm border border-gray-300 rounded px-2 py-1">
                                        <option value="client" selected>Client</option>
                                        <option value="livreur">Livreur</option>
                                        <option value="admin">Admin</option>
                                    </select>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">Actif</span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <button class="text-indigo-600 hover:text-indigo-900 mr-3">Modifier</button>
                                    <button class="text-red-600 hover:text-red-900">Désactiver</button>
                                </td>
                            </tr>
                            <tr class="hover:bg-gray-50 transition">
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">#002</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Martin Dubois</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">martin.dubois@email.com</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <select class="text-sm border border-gray-300 rounded px-2 py-1">
                                        <option value="client">Client</option>
                                        <option value="livreur" selected>Livreur</option>
                                        <option value="admin">Admin</option>
                                    </select>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">Actif</span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <button class="text-indigo-600 hover:text-indigo-900 mr-3">Modifier</button>
                                    <button class="text-red-600 hover:text-red-900">Désactiver</button>
                                </td>
                            </tr>
                            <tr class="hover:bg-gray-50 transition">
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">#003</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Sophie Martin</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">sophie.martin@email.com</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <select class="text-sm border border-gray-300 rounded px-2 py-1">
                                        <option value="client">Client</option>
                                        <option value="livreur" selected>Livreur</option>
                                        <option value="admin">Admin</option>
                                    </select>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 py-1 text-xs font-semibold rounded-full bg-red-100 text-red-800">Inactif</span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <button class="text-indigo-600 hover:text-indigo-900 mr-3">Modifier</button>
                                    <button class="text-green-600 hover:text-green-900">Activer</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>

    <script src="../js/dashboard-admin.js"></script>
    <script src="../js/dashboard-selector.js"></script>
</body>
</html>

