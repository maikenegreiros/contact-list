<?php
namespace App\Domain\ContactList\Repositories;

use App\Domain\ContactList\Entities\Person;
use App\Domain\ContactList\Entities\PersonCollection;

interface ContactListRepository {
  public function store(Person $person);
  public function getAllPersons(): PersonCollection;
  public function getPersonById(int $id): Person;
}
