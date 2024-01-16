<?php

class ContactManager
{
  public function __construct(private PDO $pdo) {
    $this->pdo = $pdo;
  }

  public function getAll(): array {
    $req = $this->pdo->query('SELECT * FROM contacts ORDER BY id ASC');
    $data = $req->fetchAll();
    $contacts = [];
    foreach ($data as $contact) {
      $contacts[] = new Contact($contact['id'], $contact['name'], $contact['email'], $contact['phone_number']);
    }
    return $contacts;
  }

  public function findById(int $id): Contact|null  {
    $req = $this->pdo->prepare('SELECT * FROM contacts WHERE id = :id');
    $req->execute(['id' => $id]);
    $data = $req->fetch();

    if ($data === false) {
      return null;
    }

    return new Contact($data['id'], $data['name'], $data['email'], $data['phone_number']);
  }

  public function insertContact(Contact $contact): void {
    $req = $this->pdo->prepare('INSERT INTO contacts (name, email, phone_number) VALUES (:name, :email, :phone_number)');
    $req->execute([
      'name' => $contact->getName(),
      'email' => $contact->getEmail(),
      'phone_number' => $contact->getPhone()
    ]);
  }

  public function deleteById(int $id): void {
    $req = $this->pdo->prepare('DELETE FROM contacts WHERE id = :id');
    $req->execute(['id' => $id]);
  }
}

?>

