<?php
namespace App\Domain\ContactList\ValueObjects;

use Iterable\Iterator;

class ContactCollection extends Iterator {
  public function __construct(Contact ...$contacts)
  {
    parent::__construct($contacts);
  }
}
