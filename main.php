<?php
require 'DBConnect.php';
require 'ContactManager.php';
require 'Contact.php';

$db = new DBConnect('contacts_db', '');
$pdo = $db();
$contactManager = new ContactManager($pdo);

while (true) {
    $command = readline("Entrez votre commande : ");
    
    switch ($command) {
        case "list":
            $contacts = $contactManager->getAll();
            foreach ($contacts as $contact) {
                echo $contact . "\n";
            }
            break;
        default:
            echo "Commande inconnue\n";
    }
}