<?php
namespace App\Domain\ContactList\ValueObjects;

class Contact {
  private string $contact;

  public function __construct(string $contact)
  {
    $this->contact = $contact;
  }

  public function getContact(): string
  {
    return $this->contact;
  }
}
