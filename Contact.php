<?php

//Represent a contact
class Contact
{
  private ?int $id;
  private ?string $name;
  private ?string $email;
  private ?string $phone;

  /**
   * @param int|null $id
   * @param string|null $name
   * @param string|null $email
   * @param string|null $phone
   */
  public function __construct(int $id = null, string $name = null, string $email = null, string $phone = null) 
  {
    $this->id = $id;
    $this->name = $name;
    $this->email = $email;
    $this->phone = $phone;
  }

  //Create a contact from an array
  public static function fromArray(array $data): Contact 
  {
    return new Contact($data['id'], $data['name'], $data['email'], $data['phone_number']);
  }

  //Getters and setters
  public function getId(): ?int 
  {
    return $this->id;
  }

  public function setId(?int $id): void 
  {
    $this->id = $id;
  }

  public function getName(): ?string 
  {
    return $this->name;
  }

  public function setName(?string $name): void 
  {
    $this->name = $name;
  }

  public function getEmail(): ?string 
  {
    return $this->email;
  }

  public function setEmail(?string $email): void 
  {
    $this->email = $email;
  }

  public function getPhone(): ?string 
  {
    return $this->phone;
  }

  public function setPhone(?string $phone): void 
  {
    $this->phone = $phone;
  }

  public function __toString(): string 
  {
    return "id: $this->id, name: $this->name,  email: $this->email,  phone: $this->phone";
  }
}