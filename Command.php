<?php
//Manage user's commands
class Command 
{
    private $contactManager;
    
    public function __construct()
    {
        $this->contactManager = new ContactManager;
    }

    //Show the list of contacts
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

    //Show the details of a contact
    public function detail($id)
    {
        $contact = $this->contactManager->findById($id);

        if ($contact === null) {
            echo 'Contact introuvable' . "\n";
            return;
        }

        echo $contact . "\n";
    }

    //Create a contact
    public function create($contact) {
        $this->contactManager->insertContact($contact);
        echo 'Contact créé avec succès !' . "\n";
    }

    //Delete a contact
    public function delete($id) {
        $result = $this->contactManager->deleteById($id);

        if ($result === false) {
            echo 'Contact introuvable' . "\n";
            return;
        }

        echo 'Contact supprimé avec succès !' . "\n";
    }

    //Modify a contact
    public function modify($contact) {
        $this->contactManager->updateContact($contact);

        echo 'Contact modifié avec succès !' . "\n";
    }
}