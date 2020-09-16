<?php
namespace App\Domain\ContactList\Presenters;

class ContactPresenter {
  public int $id;
  public string $contact;

  public function __construct(int $id, string $contact) {
    $this->id = $id;
    $this->contact = $contact;
  }
}
