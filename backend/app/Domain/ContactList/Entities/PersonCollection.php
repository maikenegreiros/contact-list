<?php
namespace App\Domain\ContactList\Entities;

use Iterable\Iterator;

class PersonCollection extends Iterator {
  public function __construct(Person ...$persons)
  {
    parent::__construct($persons);
  }
}
