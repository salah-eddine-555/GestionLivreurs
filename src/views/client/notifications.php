<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Historique des Notifications - Application de Livraison</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body class="bg-gray-50">
    <!-- Navigation -->
    <nav class="bg-white shadow-lg">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <a href="/GestionLivreurs/src/public/index.php?action=clientCommandes" class="text-indigo-600 hover:text-indigo-800 mr-4">
                        <i class="fas fa-arrow-left"></i>
                    </a>
                    <h1 class="text-2xl font-bold text-indigo-600">LivraisonApp</h1>
                </div>
                <div class="flex items-center space-x-4">
                    <div class="relative">
                        <select id="dashboardSelector" class="px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 text-sm">
                            <option value="client">Dashboard Client</option>
                            <option value="livreur">Dashboard Livreur</option>
                            <option value="admin">Dashboard Admin</option>
                        </select>
                    </div>
                    <div class="relative">
                        <button id="notificationBtn" class="relative p-2 text-gray-600 hover:text-indigo-600 transition">
                            <i class="fas fa-bell text-xl"></i>
                            <span id="notificationBadge" class="absolute top-0 right-0 bg-red-500 text-white text-xs rounded-full w-5 h-5 flex items-center justify-center">3</span>
                        </button>
                    </div>
                    <div class="flex items-center space-x-2">
                        <span class="text-gray-700">Jean Dupont</span>
                        <button class="text-gray-600 hover:text-indigo-600 transition">
                            <i class="fas fa-sign-out-alt"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="mb-8">
            <h2 class="text-3xl font-bold text-gray-800 mb-2">Historique des notifications</h2>
            <p class="text-gray-600">Consultez toutes vos notifications</p>
        </div>

        <div class="bg-white rounded-lg shadow">
            <div class="p-6 border-b">
                <div class="flex justify-between items-center">
                    <h3 class="text-lg font-semibold text-gray-800">Toutes les notifications</h3>
                    <button class="px-4 py-2 text-sm text-indigo-600 hover:text-indigo-800">
                        <i class="fas fa-check-double mr-2"></i>Tout marquer comme lu
                    </button>
                </div>
            </div>
            
            <div class="divide-y divide-gray-200">
                <!-- Notification non lue -->
                <div class="p-6 bg-blue-50 hover:bg-blue-100 transition cursor-pointer">
                    <div class="flex items-start justify-between">
                        <div class="flex-1">
                            <div class="flex items-center mb-2">
                                <i class="fas fa-bell text-blue-600 mr-3"></i>
                                <p class="font-semibold text-gray-800">Nouvelle offre reçue</p>
                                <span class="ml-2 w-2 h-2 bg-blue-600 rounded-full"></span>
                            </div>
                            <p class="text-sm text-gray-700 ml-8">Un livreur a envoyé une offre pour votre commande #001</p>
                            <p class="text-xs text-gray-500 mt-2 ml-8">Il y a 5 minutes</p>
                        </div>
                        <a href="commande-detail.php?id=1" class="text-indigo-600 hover:text-indigo-800 text-sm">
                            Voir <i class="fas fa-arrow-right ml-1"></i>
                        </a>
                    </div>
                </div>
                
                <!-- Notification lue -->
                <div class="p-6 hover:bg-gray-50 transition cursor-pointer">
                    <div class="flex items-start justify-between">
                        <div class="flex-1">
                            <div class="flex items-center mb-2">
                                <i class="fas fa-check-circle text-green-600 mr-3"></i>
                                <p class="font-semibold text-gray-800">Commande en cours</p>
                            </div>
                            <p class="text-sm text-gray-700 ml-8">Votre commande #002 est maintenant en cours de traitement</p>
                            <p class="text-xs text-gray-500 mt-2 ml-8">Il y a 1 heure</p>
                        </div>
                        <a href="commande-detail.php?id=2" class="text-indigo-600 hover:text-indigo-800 text-sm">
                            Voir <i class="fas fa-arrow-right ml-1"></i>
                        </a>
                    </div>
                </div>
                
                <!-- Notification lue -->
                <div class="p-6 hover:bg-gray-50 transition cursor-pointer">
                    <div class="flex items-start justify-between">
                        <div class="flex-1">
                            <div class="flex items-center mb-2">
                                <i class="fas fa-shipping-fast text-indigo-600 mr-3"></i>
                                <p class="font-semibold text-gray-800">Commande expédiée</p>
                            </div>
                            <p class="text-sm text-gray-700 ml-8">Votre commande #003 a été expédiée par le livreur</p>
                            <p class="text-xs text-gray-500 mt-2 ml-8">Il y a 2 heures</p>
                        </div>
                        <a href="commande-detail.php?id=3" class="text-indigo-600 hover:text-indigo-800 text-sm">
                            Voir <i class="fas fa-arrow-right ml-1"></i>
                        </a>
                    </div>
                </div>
                
                <!-- Notification lue -->
                <div class="p-6 hover:bg-gray-50 transition cursor-pointer">
                    <div class="flex items-start justify-between">
                        <div class="flex-1">
                            <div class="flex items-center mb-2">
                                <i class="fas fa-check-double text-green-600 mr-3"></i>
                                <p class="font-semibold text-gray-800">Commande terminée</p>
                            </div>
                            <p class="text-sm text-gray-700 ml-8">Votre commande #004 a été livrée et validée</p>
                            <p class="text-xs text-gray-500 mt-2 ml-8">Il y a 1 jour</p>
                        </div>
                        <a href="commande-detail.php" class="text-indigo-600 hover:text-indigo-800 text-sm">
                            Voir <i class="fas fa-arrow-right ml-1"></i>
                        </a>
                    </div>
                </div>
                
                <!-- Notification lue -->
                <div class="p-6 hover:bg-gray-50 transition cursor-pointer">
                    <div class="flex items-start justify-between">
                        <div class="flex-1">
                            <div class="flex items-center mb-2">
                                <i class="fas fa-bell text-yellow-600 mr-3"></i>
                                <p class="font-semibold text-gray-800">Nouvelle offre reçue</p>
                            </div>
                            <p class="text-sm text-gray-700 ml-8">Un livreur a envoyé une offre pour votre commande #005</p>
                            <p class="text-xs text-gray-500 mt-2 ml-8">Il y a 2 jours</p>
                        </div>
                        <a href="commande-detail.php?id=5" class="text-indigo-600 hover:text-indigo-800 text-sm">
                            Voir <i class="fas fa-arrow-right ml-1"></i>
                        </a>
                    </div>
                </div>
            </div>
            
            <div class="p-6 border-t bg-gray-50">
                <div class="flex justify-center">
                    <button class="px-6 py-2 text-indigo-600 hover:text-indigo-800">
                        Charger plus de notifications
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script src="../js/notifications.js"></script>
    <script src="/js/dashboard-selector.js"></script>
</body>
</html>

