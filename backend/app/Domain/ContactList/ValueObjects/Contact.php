<?php
namespace App\Domain\ContactList\ValueObjects;

class Contact {
  private int $id;
  private string $contact;

  public function __construct(string $contact, $id = 0)
  {
    $this->contact = $contact;
    $this->id = $id;
  }

  public function getId(): int
  {
    return $this->id;
  }

  public function getContact(): string
  {
    return $this->contact;
  }
}
