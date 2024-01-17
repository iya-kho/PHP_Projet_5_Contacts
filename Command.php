<?php
//Gérer les commandes de l'utilisateur
class Command 
{
    private $contactManager;
    
    public function __construct()
    {
        $this->contactManager = new ContactManager;
    }

    //Afficher la liste des contacts
    public function list()
    {
        $contacts = $this->contactManager->getAll();
        if (empty($contacts)) {
            echo 'Aucun contact' . "\n";
            return;
        }
        echo 'Liste des contacts :' . "\n";
        echo 'id, name, email, phone' . "\n";
        foreach ($contacts as $contact) {
            echo $contact . "\n";
        }
    }

    //Afficher le détail d'un contact
    public function detail($id)
    {
        $contact = $this->contactManager->findById($id);

        if ($contact === null) {
            echo 'Contact introuvable' . "\n";
            return;
        }

        echo $contact . "\n";
    }

    //Créer un nouveau contact
    public function create($contact) {
        $this->contactManager->insertContact($contact);
        echo 'Contact créé avec succès !' . "\n";
    }

    //Supprimer un contact
    public function delete($id) {
        $this->contactManager->deleteById($id);

        echo 'Contact supprimé avec succès !' . "\n";
    }

    //Modifier un contact
    public function modify($contact) {
        $this->contactManager->updateContact($contact);

        echo 'Contact modifié avec succès !' . "\n";
    }
}

?>