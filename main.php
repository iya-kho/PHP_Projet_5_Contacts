<?php
require 'DBConnect.php';
require 'ContactManager.php';
require 'Contact.php';
require 'Command.php';

$db = new DBConnect('contacts_db', '');
$pdo = $db();
$contactManager = new ContactManager($pdo);
$command = new Command($contactManager);

while (true) {
    $userCommand = readline('Entrez votre commande : ');

    if ($userCommand === 'list') {
        $command->list();
        continue;
    } 

    if (strpos($userCommand, 'detail') === 0) {
        $id = explode(' ', $userCommand)[1];
        $command->detail($id);
        continue;
    }

    if (strpos($userCommand, 'create') === 0) {
        $contactInfo = str_replace(',', '', $userCommand);
        $contactInfo = explode(' ', $contactInfo);
        $command->create(new Contact(null, $contactInfo[1], $contactInfo[2], $contactInfo[3]));
        continue;
    }

    if (strpos($userCommand, 'delete') === 0) {
        $id = explode(' ', $userCommand)[1];
        $command->delete($id);
        continue;
    }

    echo 'Commande inconnue' . "\n";
}