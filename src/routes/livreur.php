    <?php

    use Youcode\GestionLivreurs\controller\LivreurController;
    use Youcode\GestionLivreurs\Service\CommandeService;
    use Youcode\GestionLivreurs\Repository\CommandeRepository;

    $repo = new CommandeRepository();
    $service = new CommandeService($repo);
    $controller = new LivreurController($service);

    switch($action){
        case 'livreur.commandes':

            $controller->listeCommandes();
            break;

        case 'livreur.commande.detail':

            if(isset($_GET['id']) && !empty($_GET['id'])){
                $id = (int) $_GET['id'];
                $controller->detailsCommande($id);
            }else{
                echo "acune id selectionner";
            }
            break;
            
        default:
            $controller->listeCommandes();
            require __DIR__ . '/../views/livreur/livreur.php';
            break;
    }