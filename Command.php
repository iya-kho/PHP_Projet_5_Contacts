<?php
class Command 
{
    private $contactManager;
    
    public function __construct($contactManager)
    {
        $this->contactManager = $contactManager;
    }

    public function list()
    {
        $contacts = $this->contactManager->getAll();
        foreach ($contacts as $contact) {
            echo $contact . "\n";
        }
    }

    public function detail($id)
    {
        $contact = $this->contactManager->findById($id);

        if ($contact === null) {
            echo 'Contact introuvable' . "\n";
            return;
        }

        echo $contact . "\n";
    }

    public function create($contact) {
        $this->contactManager->insertContact($contact);
        echo 'Contact créé avec succès !' . "\n";
    }

    public function delete($id) {
        $this->contactManager->deleteById($id);

        echo 'Contact supprimé avec succès !' . "\n";
    }
}

?>