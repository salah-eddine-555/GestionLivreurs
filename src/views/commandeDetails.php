<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détail de la commande - Application de Livraison</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body class="bg-gray-50">

<!-- Navigation -->
<?php include_once __DIR__ . '/client/navigation.php'; ?>


<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <!-- Header -->
    <div class="mb-8">
        <div class="flex justify-between items-start">
            <div>
                <h2 class="text-3xl font-bold text-gray-800 mb-2">
                    Commande #<?= $commande->getIdCommande(); ?>
                </h2>
                <p class="text-gray-600">Détails et suivi de votre commande</p>
            </div>

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

            <span class="px-4 py-2 rounded-lg font-semibold <?= $class ?>">
                <?= ucfirst(str_replace('_', ' ', $statut)); ?>
            </span>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

        <!-- Colonne principale -->
        <div class="lg:col-span-2 space-y-6">

            <!-- Informations commande -->
            <div class="bg-white rounded-lg shadow p-6">
                <h3 class="text-xl font-bold text-gray-800 mb-4">
                    Informations de la commande
                </h3>

                <div class="space-y-4">
                    <div class="flex justify-between py-2 border-b">
                        <span class="text-gray-600">Titre</span>
                        <span class="font-medium">
                            <?= htmlspecialchars($commande->getTitreCommande()); ?>
                        </span>
                    </div>

                    <div class="flex justify-between py-2 border-b">
                        <span class="text-gray-600">Description</span>
                        <span class="font-medium text-right">
                            <?= htmlspecialchars($commande->getDescriptionCommande()); ?>
                        </span>
                    </div>

                    <div class="flex justify-between py-2 border-b">
                        <span class="text-gray-600">Date de création</span>
                        <span class="font-medium">
                            <?= date('d/m/Y H:i', strtotime($commande->getCreatedAt())); ?>
                        </span>
                    </div>

                    <div class="flex justify-between py-2">
                        <span class="text-gray-600">Statut</span>
                        <span class="px-3 py-1 rounded-full text-sm font-semibold <?= $class ?>">
                            <?= ucfirst(str_replace('_', ' ', $statut)); ?>
                        </span>
                    </div>
                </div>
            </div>

            <!-- Adresses -->
            <div class="bg-white rounded-lg shadow p-6">
                <h3 class="text-xl font-bold text-gray-800 mb-4">
                    <i class="fas fa-map-marker-alt text-indigo-600 mr-2"></i>
                    Adresses
                </h3>

                <div class="space-y-3">
                    <div>
                        <p class="text-sm text-gray-600">Adresse de départ</p>
                        <p class="font-medium">
                            <?= htmlspecialchars($commande->getAdresseDepart()); ?>
                        </p>
                    </div>

                    <div>
                        <p class="text-sm text-gray-600">Adresse d’arrivée</p>
                        <p class="font-medium">
                            <?= htmlspecialchars($commande->getAdresseArrive()); ?>
                        </p>
                    </div>
                </div>
            </div>

            <!-- Offres (placeholder pour plus tard) -->
            <div class="bg-white rounded-lg shadow p-6">
                <h3 class="text-xl font-bold text-gray-800 mb-4">
                    Offres reçues
                </h3>

                <p class="text-gray-500 text-sm">
                    Aucune offre pour le moment.
                </p>
            </div>

        </div>

        <!-- Colonne latérale -->
        <div class="space-y-6">

            <!-- Suivi -->
            <div class="bg-white rounded-lg shadow p-6">
                <h3 class="text-xl font-bold text-gray-800 mb-4">
                    Suivi de la commande
                </h3>

                <ul class="space-y-4 text-sm">
                    <li class="flex items-center">
                        <span class="w-3 h-3 bg-green-500 rounded-full mr-3"></span>
                        Commande créée
                    </li>
                    <li class="flex items-center">
                        <span class="w-3 h-3 bg-yellow-500 rounded-full mr-3"></span>
                        <?= ucfirst(str_replace('_', ' ', $statut)); ?>
                    </li>
                </ul>
            </div>

            <!-- Actions -->
            <div class="bg-white rounded-lg shadow p-6">
                <h3 class="text-xl font-bold text-gray-800 mb-4">
                    Actions rapides
                </h3>

                <div class="space-y-3">
                    <a href="index.php?action=clientCommandes"
                       class="block text-center px-4 py-2 border rounded-lg hover:bg-gray-50">
                        ← Retour aux commandes
                    </a>

                    <?php if ($statut !== 'annulee'): ?>
                        <a href="index.php?action=deleteCommande&id=<?= $commande->getIdCommande(); ?>"
                           class="block text-center px-4 py-2 border border-red-300 text-red-600 rounded-lg hover:bg-red-50">
                            Annuler la commande
                        </a>
                    <?php endif; ?>
                </div>
            </div>

        </div>
    </div>
</div>

</body>
</html>
