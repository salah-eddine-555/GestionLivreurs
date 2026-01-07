<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détail de la commande - Application de Livraison</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body class="bg-gray-50">
    <!-- Navigation -->
    <?php include_once './navigation.php'; ?>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Header -->
        <div class="mb-8">
            <div class="flex justify-between items-start">
                <div>
                    <h2 class="text-3xl font-bold text-gray-800 mb-2">Commande #001</h2>
                    <p class="text-gray-600">Détails et suivi de votre commande</p>
                </div>
                <div class="flex space-x-3">
                    <span class="px-4 py-2 bg-yellow-100 text-yellow-800 rounded-lg font-semibold">
                        En attente d'offres
                    </span>
                    <button class="px-4 py-2 border border-gray-300 rounded-lg hover:bg-gray-50">
                        <i class="fas fa-edit mr-2"></i>Modifier
                    </button>
                    <button class="px-4 py-2 border border-red-300 text-red-600 rounded-lg hover:bg-red-50">
                        <i class="fas fa-times mr-2"></i>Annuler
                    </button>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Colonne principale -->
            <div class="lg:col-span-2 space-y-6">
                <!-- Informations de la commande -->
                <div class="bg-white rounded-lg shadow p-6">
                    <h3 class="text-xl font-bold text-gray-800 mb-4">Informations de la commande</h3>
                    <div class="space-y-4">
                        <div class="flex justify-between py-2 border-b">
                            <span class="text-gray-600">Description</span>
                            <span class="text-gray-800 font-medium">Colis fragile - Électronique</span>
                        </div>
                        <div class="flex justify-between py-2 border-b">
                            <span class="text-gray-600">Type de colis</span>
                            <span class="text-gray-800 font-medium">Fragile</span>
                        </div>
                        <div class="flex justify-between py-2 border-b">
                            <span class="text-gray-600">Date de création</span>
                            <span class="text-gray-800 font-medium">15/01/2024 à 14:30</span>
                        </div>
                        <div class="flex justify-between py-2">
                            <span class="text-gray-600">Statut</span>
                            <span class="px-3 py-1 bg-yellow-100 text-yellow-800 rounded-full text-sm font-semibold">
                                En attente d'offres
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Adresse de livraison -->
                <div class="bg-white rounded-lg shadow p-6">
                    <h3 class="text-xl font-bold text-gray-800 mb-4">
                        <i class="fas fa-map-marker-alt text-indigo-600 mr-2"></i>Adresse de livraison
                    </h3>
                    <div class="space-y-2">
                        <p class="text-gray-800">123 Rue Example</p>
                        <p class="text-gray-800">75001 Paris</p>
                        <p class="text-gray-600 text-sm mt-4">
                            <i class="fas fa-phone mr-2"></i>06 12 34 56 78
                        </p>
                    </div>
                </div>

                <!-- Offres reçues -->
                <div class="bg-white rounded-lg shadow p-6">
                    <h3 class="text-xl font-bold text-gray-800 mb-4">Offres reçues</h3>
                    <div class="space-y-4">
                        <div class="border border-gray-200 rounded-lg p-4 hover:border-indigo-300 transition">
                            <div class="flex justify-between items-start mb-3">
                                <div>
                                    <p class="font-semibold text-gray-800">Livreur: Martin Dubois</p>
                                    <p class="text-sm text-gray-600">
                                        <i class="fas fa-star text-yellow-500 mr-1"></i>4.8/5 (24 avis)
                                    </p>
                                </div>
                                <span class="px-3 py-1 bg-green-100 text-green-800 rounded-full text-sm font-semibold">
                                    45€
                                </span>
                            </div>
                            <div class="grid grid-cols-2 gap-4 text-sm text-gray-600 mb-3">
                                <div>
                                    <i class="fas fa-clock mr-2"></i>Durée estimée: 2h
                                </div>
                                <div>
                                    <i class="fas fa-car mr-2"></i>Véhicule: Camionnette
                                </div>
                            </div>
                            <div class="flex flex-wrap gap-2 mb-3">
                                <span class="px-2 py-1 bg-blue-100 text-blue-800 rounded text-xs">Express</span>
                                <span class="px-2 py-1 bg-purple-100 text-purple-800 rounded text-xs">Fragile</span>
                            </div>
                            <button class="w-full px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition">
                                Accepter cette offre
                            </button>
                        </div>

                        <div class="border border-gray-200 rounded-lg p-4 hover:border-indigo-300 transition">
                            <div class="flex justify-between items-start mb-3">
                                <div>
                                    <p class="font-semibold text-gray-800">Livreur: Sophie Martin</p>
                                    <p class="text-sm text-gray-600">
                                        <i class="fas fa-star text-yellow-500 mr-1"></i>4.5/5 (18 avis)
                                    </p>
                                </div>
                                <span class="px-3 py-1 bg-green-100 text-green-800 rounded-full text-sm font-semibold">
                                    52€
                                </span>
                            </div>
                            <div class="grid grid-cols-2 gap-4 text-sm text-gray-600 mb-3">
                                <div>
                                    <i class="fas fa-clock mr-2"></i>Durée estimée: 1h30
                                </div>
                                <div>
                                    <i class="fas fa-motorcycle mr-2"></i>Véhicule: Moto
                                </div>
                            </div>
                            <div class="flex flex-wrap gap-2 mb-3">
                                <span class="px-2 py-1 bg-blue-100 text-blue-800 rounded text-xs">Express</span>
                            </div>
                            <button class="w-full px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition">
                                Accepter cette offre
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Colonne latérale -->
            <div class="space-y-6">
                <!-- Suivi de la commande -->
                <div class="bg-white rounded-lg shadow p-6">
                    <h3 class="text-xl font-bold text-gray-800 mb-4">Suivi de la commande</h3>
                    <div class="space-y-4">
                        <div class="flex items-start">
                            <div class="flex-shrink-0">
                                <div class="w-8 h-8 bg-green-500 rounded-full flex items-center justify-center">
                                    <i class="fas fa-check text-white text-sm"></i>
                                </div>
                            </div>
                            <div class="ml-4">
                                <p class="font-semibold text-gray-800">Commande créée</p>
                                <p class="text-sm text-gray-600">15/01/2024 à 14:30</p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <div class="flex-shrink-0">
                                <div class="w-8 h-8 bg-yellow-500 rounded-full flex items-center justify-center">
                                    <i class="fas fa-clock text-white text-sm"></i>
                                </div>
                            </div>
                            <div class="ml-4">
                                <p class="font-semibold text-gray-800">En attente d'offres</p>
                                <p class="text-sm text-gray-600">En cours...</p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <div class="flex-shrink-0">
                                <div class="w-8 h-8 bg-gray-300 rounded-full flex items-center justify-center">
                                    <i class="fas fa-circle text-white text-xs"></i>
                                </div>
                            </div>
                            <div class="ml-4">
                                <p class="text-gray-500">En cours de traitement</p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <div class="flex-shrink-0">
                                <div class="w-8 h-8 bg-gray-300 rounded-full flex items-center justify-center">
                                    <i class="fas fa-circle text-white text-xs"></i>
                                </div>
                            </div>
                            <div class="ml-4">
                                <p class="text-gray-500">Expédiée</p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <div class="flex-shrink-0">
                                <div class="w-8 h-8 bg-gray-300 rounded-full flex items-center justify-center">
                                    <i class="fas fa-circle text-white text-xs"></i>
                                </div>
                            </div>
                            <div class="ml-4">
                                <p class="text-gray-500">Terminée</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Actions rapides -->
                <div class="bg-white rounded-lg shadow p-6">
                    <h3 class="text-xl font-bold text-gray-800 mb-4">Actions rapides</h3>
                    <div class="space-y-3">
                        <button class="w-full px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition">
                            <i class="fas fa-edit mr-2"></i>Modifier la commande
                        </button>
                        <button class="w-full px-4 py-2 border border-red-300 text-red-600 rounded-lg hover:bg-red-50 transition">
                            <i class="fas fa-times mr-2"></i>Annuler la commande
                        </button>
                        <button class="w-full px-4 py-2 border border-gray-300 rounded-lg hover:bg-gray-50 transition">
                            <i class="fas fa-trash mr-2"></i>Supprimer la commande
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="../js/commande-detail.js"></script>
    <script src="../js/dashboard-selector.js"></script>
</body>
</html>

