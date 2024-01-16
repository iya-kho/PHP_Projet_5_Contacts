<?php
class Contact
{
  public function __construct(private int|null $id, private string $name, private string $email, private string $phone) {
    $this->id = $id;
    $this->name = $name;
    $this->email = $email;
    $this->phone = $phone;
  }

  public function getId(): int {
    return $this->id;
  }

  public function setId(int $id): void {
    $this->id = $id;
  }

  public function getName(): string {
    return $this->name;
  }

  public function setName(string $name): void {
    $this->name = $name;
  }

  public function getEmail(): string {
    return $this->email;
  }

  public function setEmail(string $email): void {
    $this->email = $email;
  }

  public function getPhone(): string {
    return $this->phone;
  }

  public function setPhone(string $phone): void {
    $this->phone = $phone;
  }

  public function __toString(): string {
    return "$this->id, $this->name,  $this->email,  $this->phone";
  }
}

?>