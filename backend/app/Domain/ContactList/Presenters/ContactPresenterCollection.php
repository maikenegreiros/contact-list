<?php
namespace App\Domain\ContactList\Presenters;

use Iterable\Iterator;

class ContactPresenterCollection extends Iterator {
  public function __construct(ContactPresenter ...$contacts)
  {
    parent::__construct($contacts);
  }
}
