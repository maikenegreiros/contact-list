<?php
namespace App\Repositories;

use App\Domain\ContactList\Entities\Person;
use App\Domain\ContactList\Entities\PersonCollection;
use App\Domain\ContactList\ValueObjects\Contact;
use App\Domain\ContactList\ValueObjects\ContactCollection;
use App\Domain\ContactList\Repositories\ContactListRepository;
use App\Models\Person as PersonModel;
use App\Models\Contact as ContactModel;
use Illuminate\Database\Eloquent\Collection as EloquentCollection;

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
    $personsEloquent = PersonModel::with('contacts')->get();
    $personEntityArray = [];
    foreach ($personsEloquent as $onePersonEloquent) {
      $personEntity = new Person(
        $onePersonEloquent->name,
        $onePersonEloquent->lastname,
        $this->getContactCollectionFromArray($onePersonEloquent->contacts)
      );
      $personEntity->setId($onePersonEloquent->id);
      $personEntityArray[] = $personEntity;
    }
    return new PersonCollection(...$personEntityArray);
  }

  private function getContactCollectionFromArray(EloquentCollection $contacts): ContactCollection
  {
    $contactsEntitiesArray = [];
    foreach ($contacts as $contact) {
      $contactsEntitiesArray[] = new Contact($contact->contact, $contact->id);
    }
    return new ContactCollection(...$contactsEntitiesArray);
  }

  public function getPersonById(int $id): Person
  {
    $personEloquent = PersonModel::findOrFail($id);
    $person = new Person(
      $personEloquent->name,
      $personEloquent->lastname,
      $this->getContactCollectionFromArray($personEloquent->contacts)
    );
    $person->setId($personEloquent->id);
    return $person;
  }
}
