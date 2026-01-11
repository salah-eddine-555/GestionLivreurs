<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détail de la commande - Livreur</title>
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
                    <a href="dashboard-livreur.html" class="text-indigo-600 hover:text-indigo-800 mr-4">
                        <i class="fas fa-arrow-left"></i>
                    </a>
                    <h1 class="text-2xl font-bold text-indigo-600">LivraisonApp</h1>
                </div>
                <div class="flex items-center space-x-4">
                    <div class="relative">
                        <select id="dashboardSelector" class="px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 text-sm">
                            <option value="client">Dashboard Client</option>
                            <option value="livreur" selected>Dashboard Livreur</option>
                            <option value="admin">Dashboard Admin</option>
                        </select>
                    </div>
                    <a href="profil.html" class="text-gray-700 hover:text-indigo-600 transition">Martin Dubois</a>
                    <button class="text-gray-600 hover:text-indigo-600 transition">
                        <i class="fas fa-sign-out-alt"></i>
                    </button>
                </div>
            </div>
        </div>
    </nav>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Header -->
        <div class="mb-8">
            <div class="flex justify-between items-start">
                <div>
                    <h2 class="text-3xl font-bold text-gray-800 mb-2">Commande #001</h2>
                    <p class="text-gray-600">Détails de la commande et envoi d'offre</p>
                </div>
                <span class="px-4 py-2 bg-yellow-100 text-yellow-800 rounded-lg font-semibold">
                    En attente d'offres
                </span>
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
            <span class="text-gray-600">Titre</span>
            <span class="text-gray-800 font-medium"><?= htmlspecialchars($commande->getTitreCommande()) ?></span>
        </div>
        <div class="flex justify-between py-2 border-b">
            <span class="text-gray-600">Description</span>
            <span class="text-gray-800 font-medium"><?= htmlspecialchars($commande->getDescriptionCommande()) ?></span>
        </div>
        <div class="flex justify-between py-2 border-b">
            <span class="text-gray-600">Date de création</span>
            <span class="text-gray-800 font-medium"><?= date('d/m/Y à H:i', strtotime($commande->getCreatedAt())) ?></span>
        </div>
        <div class="flex justify-between py-2">
            <span class="text-gray-600">Statut</span>
            <span class="px-3 py-1 
                <?= $commande->getStatut() === 'cree' ? 'bg-yellow-100 text-yellow-800' : 
                    ($commande->getStatut() === 'en_cours' ? 'bg-blue-100 text-blue-800' : 
                    ($commande->getStatut() === 'livree' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800')) ?>
                rounded-full text-sm font-semibold">
                <?= ucfirst(str_replace('_', ' ', $commande->getStatut())) ?>
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
        <p class="text-gray-800"><strong>Adresse Depart: </strong><?= htmlspecialchars($commande->getAdresseDepart()) ?></p>
        <p class="text-gray-800"><strong>Adresse d'arrivee: </strong><?= htmlspecialchars($commande->getAdresseArrive()) ?></p>
    </div>
</div>
                <!-- Offres des autres livreurs -->
                <div class="bg-white rounded-lg shadow p-6">
                    <h3 class="text-xl font-bold text-gray-800 mb-4">Offres des autres livreurs</h3>
                    <p class="text-sm text-gray-600 mb-4">Vous pouvez voir les offres des autres livreurs, mais pas leurs prix</p>
                    <div class="space-y-4">
                        <div class="border border-gray-200 rounded-lg p-4">
                            <div class="flex justify-between items-start mb-3">
                                <div>
                                    <p class="font-semibold text-gray-800">Livreur: Sophie Martin</p>
                                    <p class="text-sm text-gray-600">
                                        <i class="fas fa-star text-yellow-500 mr-1"></i>4.5/5
                                    </p>
                                </div>
                                <span class="px-3 py-1 bg-gray-200 text-gray-600 rounded-full text-sm font-semibold">
                                    Prix masqué
                                </span>
                            </div>
                            <div class="grid grid-cols-2 gap-4 text-sm text-gray-600">
                                <div>
                                    <i class="fas fa-clock mr-2"></i>Durée: 1h30
                                </div>
                                <div>
                                    <i class="fas fa-motorcycle mr-2"></i>Véhicule: Moto
                                </div>
                            </div>
                        </div>
                        <div class="border border-gray-200 rounded-lg p-4">
                            <div class="flex justify-between items-start mb-3">
                                <div>
                                    <p class="font-semibold text-gray-800">Livreur: Pierre Durand</p>
                                    <p class="text-sm text-gray-600">
                                        <i class="fas fa-star text-yellow-500 mr-1"></i>4.2/5
                                    </p>
                                </div>
                                <span class="px-3 py-1 bg-gray-200 text-gray-600 rounded-full text-sm font-semibold">
                                    Prix masqué
                                </span>
                            </div>
                            <div class="grid grid-cols-2 gap-4 text-sm text-gray-600">
                                <div>
                                    <i class="fas fa-clock mr-2"></i>Durée: 2h
                                </div>
                                <div>
                                    <i class="fas fa-car mr-2"></i>Véhicule: Voiture
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Colonne latérale - Formulaire d'offre -->
            <div class="space-y-6">
        <!-- Formulaire pour envoyer une offre -->
            <div class="bg-white rounded-lg shadow p-6">
                <h3 class="text-xl font-bold text-gray-800 mb-4">Envoyer une offre</h3>

                <form id="offerForm" class="space-y-4" method="POST" action="index.php?action=offre.creer">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Prix (€)</label>
                        <input type="number" name="prixOffre" step="0.01" min="0" required
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500"
                               placeholder="45.00">
                    </div>

        
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Option</label>
                        <select name="optionOffre" required
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500">
                            <option value="">Sélectionnez une option</option>
                            <option value="Express">Express</option>
                            <option value="Fragile">Fragile</option>
                            <option value="Assurance">Assurance</option>
                        </select>
                    </div>

       
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Type de véhicule</label>
                        <select name="typeVehicule" required
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500">
                            <option value="">Sélectionnez un véhicule</option>
                            <option value="moto">Moto</option>
                            <option value="voiture">Voiture</option>
                            <option value="camion">Camion</option>
                        </select>
                    </div>

                    <!-- Durée estimée (INT en minutes) -->
                    <!-- Durée estimée (string) -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Durée estimée</label>
                        <select name="dureeEstimee" required
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500">
                            <option value="">Sélectionnez une durée</option>
                            <option value="30 minutes">30 minutes</option>
                            <option value="2 heures">2 heures</option>
                            <option value="5 heures">5 heures</option>
                            <option value="1 jour">1 jour</option>
                            <option value="3 jours">3 jours</option>
                        </select>
                    </div>

                    <input type="hidden" name="idCommande" value="<?= $commande->getIdCommande() ?>">

                   
                    <input type="hidden" name="id_livreur" value="<?= $_SESSION['id'] ?>">
            
                    <button type="submit" class="w-full px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition">
                        <i class="fas fa-paper-plane mr-2"></i>Envoyer l'offre
                    </button>
                </form>
            </div>


                <!-- Mon offre actuelle (si existe) -->
                <div class="bg-indigo-50 rounded-lg shadow p-6 border border-indigo-200">
                    <h3 class="text-lg font-bold text-gray-800 mb-3">Mon offre</h3>
                    <div class="space-y-2 text-sm">
                        <div class="flex justify-between">
                            <span class="text-gray-600">Prix:</span>
                            <span class="font-semibold text-gray-800">45€</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Durée:</span>
                            <span class="font-semibold text-gray-800">2h</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Véhicule:</span>
                            <span class="font-semibold text-gray-800">Camionnette</span>
                        </div>
                        <div class="mt-3">
                            <span class="px-2 py-1 bg-blue-100 text-blue-800 rounded text-xs">Express</span>
                            <span class="px-2 py-1 bg-purple-100 text-purple-800 rounded text-xs ml-1">Fragile</span>
                        </div>
                        <button class="mt-4 w-full px-4 py-2 border border-indigo-600 text-indigo-600 rounded-lg hover:bg-indigo-100 transition text-sm">
                            Modifier l'offre
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- <script src="assets/js/commande-livreur-detail.js"></script> -->
    <script src="../js/dashboard-selector.js"></script>
</body>
</html>

