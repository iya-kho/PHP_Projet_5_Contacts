<?php
require_once 'DBConnect.php';
require_once 'ContactManager.php';
require_once 'Contact.php';
require_once 'Command.php';
require_once 'config.php';

//Object that manages the user's commands
$command = new Command();

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

    if (strpos($userCommand, 'modify') === 0) {
        $contactInfo = str_replace(',', '', $userCommand);
        $contactInfo = explode(' ', $contactInfo);
        $command->modify(new Contact($contactInfo[1], $contactInfo[2], $contactInfo[3], $contactInfo[4]));
        continue;
    }

    if ($userCommand === 'help') {
        echo 'Liste des commandes disponibles :' . "\n";
        echo 'list : Affiche la liste des contacts' . "\n";
        echo 'detail [id] : Affiche le détail d\'un contact' . "\n";
        echo 'create [name], [email], [phone] : Crée un nouveau contact' . "\n";
        echo 'delete [id] : Supprime un contact' . "\n";
        echo 'modify [id], [name], [email], [phone] : Modifie un contact' . "\n";
        echo 'exit : Quitte l\'application' . "\n";
        continue;
    }

    if ($userCommand === 'exit') {
        echo 'Au revoir !' . "\n";
        break;
    }

    echo 'Commande inconnue' . "\n";
}