<?php
namespace App\Repositories;

use App\Domain\ContactList\Entities\Person;
use App\Domain\ContactList\Entities\PersonCollection;
use App\Domain\ContactList\ValueObjects\Contact;
use App\Domain\ContactList\ValueObjects\ContactCollection;
use App\Domain\ContactList\Repositories\ContactListRepository;
use App\Models\Person as PersonModel;
use App\Models\Contact as ContactModel;

class ContactListEloquentRepository implements ContactListRepository {
  public function store(Person $person) {
    $personInserterId = $this->insertPerson($person);
    $person->setId($personInserterId);
    $this->insertPersonContacts($person);
  }

  private function insertPerson(Person $person): int
  {
    $personModel = new PersonModel;
    $personModel->name = $person->getName();
    $personModel->lastname = $person->getLastName();
    $personModel->save();
    return $personModel->id;
  }

  private function insertPersonContacts(Person $person)
  {
    foreach ($person->getContacts() as $contact) {
      $contactModel = new ContactModel;
      $contactModel->contact = $contact->getContact();
      $contactModel->id_person = $person->getId();
      $contactModel->save();
    }
  }

  public function getAllPersons(): PersonCollection
  {
    $personsArray = PersonModel::with('contacts')->all();
    $personEntityArray = [];
    foreach ($personsArray as $onePersonArray) {
      $personEntityArray[] = new Person(
        $onePersonArray['name'],
        $onePersonArray['lastname'],
        $this->getContactCollectionFromArray($onePersonArray['contact'])
      );
    }
    return new PersonCollection(...$personEntityArray);
  }

  private function getContactCollectionFromArray(array $contacts): ContactCollection
  {
    $dataToContactObject = fn($c) => new Contact($c['contact']);
    $contactsEntitiesArray = array_map($dataToContactObject, $contacts);
    return new ContactCollection(...$contactsEntitiesArray);
  }

  public function getPersonById(int $id): Person
  {
    $personArray = PersonModel::findOrFail($id);
    return new Person(
      $personArray['name'],
      $personArray['lastname'],
      $this->getContactCollectionFromArray($personArray)
    );
  }
}
