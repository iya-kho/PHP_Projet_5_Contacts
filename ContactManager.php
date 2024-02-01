<?php

//Manage interactions with the database
class ContactManager
{
  private PDO $pdo;

  public function __construct() 
  {
    $this->pdo = DBConnect::getInstance()->getPDO();;
  }

  /**
   * Get all the contacts
   * @return array of objects Contact
   */

  public function getAll(): array 
  {
    $req = $this->pdo->query('SELECT * FROM contacts ORDER BY id ASC');
    $data = $req->fetchAll();
    $contacts = [];
    foreach ($data as $row) {
      $contacts[] = Contact::fromArray($row);
    }
    return $contacts;
  }

  /*Get one contact by its id
    * @param int $id
    * @return Contact|null
  */
  public function findById(int $id): Contact|null  
  {
    $req = $this->pdo->prepare('SELECT * FROM contacts WHERE id = :id');
    $req->execute(['id' => $id]);
    $data = $req->fetch();

    if ($data === false) {
      return null;
    }

    $contact = Contact::fromArray($data);

    return $contact;
  }

  /*Create a new contact
   * @param Contact $contact
  */
  public function insertContact(Contact $contact): void 
  {
    $req = $this->pdo->prepare('INSERT INTO contacts (name, email, phone_number) VALUES (:name, :email, :phone_number)');
    $req->execute([
      'name' => $contact->getName(),
      'email' => $contact->getEmail(),
      'phone_number' => $contact->getPhone()
    ]);
  }

  /*Delete a contact by its id
   * @param int $id
  */
  public function deleteById(int $id): bool
  {
    $req = $this->pdo->prepare('DELETE FROM contacts WHERE id = :id');
    $req->execute(['id' => $id]);
    $result = $req->rowCount();

    if ($result === 0) {
      return false;
    }

    return true;
  }

  /*Modify a contact
   * @param Contact $contact
  */
  public function updateContact(Contact $contact): void 
  {
    $req = $this->pdo->prepare('UPDATE contacts SET name = :name, email = :email, phone_number = :phone_number WHERE id = :id');
    $req->execute([
      'id' => $contact->getId(),
      'name' => $contact->getName(),
      'email' => $contact->getEmail(),
      'phone_number' => $contact->getPhone()
    ]);
  }
}

