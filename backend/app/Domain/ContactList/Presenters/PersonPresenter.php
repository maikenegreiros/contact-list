<?php
namespace App\Domain\ContactList\Presenters;

class PersonPresenter {
  public int $id;
  public string $name;
  public string $lastname;
  public ContactPresenterCollection $contacts;

  public function __construct(
    int $id,
    string $name,
    string $lastname,
    ContactPresenterCollection $contacts
  ) {
    $this->id = $id;
    $this->name = $name;
    $this->lastname = $lastname;
    $this->contacts = $contacts;
  }
}
