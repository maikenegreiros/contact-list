<?php
namespace App\Domain\ContactList\Entities;

use App\Domain\ContactList\ValueObjects\ContactCollection;

class Person {
  private string $name;
  private string $lastname;
  private ContactCollection $contacts;
  private int $id;

  public function __construct(
    string $name,
    string $lastname,
    ContactCollection $contacts,
    $id = 0
  ) {
    $this->name = $name;
    $this->lastname = $lastname;
    $this->contacts = $contacts;
    $this->id = $id;
  }

  public function setId(int $id)
  {
    $this->id = $id;
  }

  public function getId(): int
  {
    return $this->id;
  }

  public function getName(): string
  {
    return $this->name;
  }

  public function getLastName(): string
  {
    return $this->lastname;
  }

  public function getContacts(): ContactCollection
  {
    return $this->contacts;
  }
}
