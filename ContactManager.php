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

  // public function add(Contact $contact): void {
  //   $req = $this->pdo->prepare('INSERT INTO contacts (name, email, phone) VALUES (:name, :email, :phone)');
  //   $req->execute([
  //     'name' => $contact->getName(),
  //     'email' => $contact->getEmail(),
  //     'phone' => $contact->getPhone()
  //   ]);
  // }

  // public function get(int $id): Contact {
  //   $req = $this->pdo->prepare('SELECT * FROM contacts WHERE id = :id');
  //   $req->execute(['id' => $id]);
  //   $data = $req->fetch();
  //   return new Contact($data['id'], $data['name'], $data['email'], $data['phone']);
  // }

  // public function update(Contact $contact): void {
  //   $req = $this->pdo->prepare('UPDATE contacts SET name = :name, email = :email, phone = :phone WHERE id = :id');
  //   $req->execute([
  //     'id' => $contact->getId(),
  //     'name' => $contact->getName(),
  //     'email' => $contact->getEmail(),
  //     'phone' => $contact->getPhone()
  //   ]);
  // }

  // public function delete(int $id): void {
  //   $req = $this->pdo->prepare('DELETE FROM contacts WHERE id = :id');
  //   $req->execute(['id' => $id]);
  // }
}

?>

