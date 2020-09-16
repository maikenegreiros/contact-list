<?php
namespace App\Domain\ContactList\Presenters;

use Iterable\Iterator;

class PersonPresenterCollection extends Iterator {
  public function __construct(PersonPresenter ...$persons)
  {
    parent::__construct($persons);
  }
}
