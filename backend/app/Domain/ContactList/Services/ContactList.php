<?php
namespace App\Domain\ContactList\Services;

use App\Domain\ContactList\Entities\Person;
use App\Domain\ContactList\Presenters\ContactPresenter;
use App\Domain\ContactList\Presenters\ContactPresenterCollection;
use App\Domain\ContactList\Presenters\PersonPresenter;
use App\Domain\ContactList\Presenters\PersonPresenterCollection;
use App\Domain\ContactList\Repositories\ContactListRepository;
use App\Domain\ContactList\ValueObjects\Contact;
use App\Domain\ContactList\ValueObjects\ContactCollection;

class ContactList {
  private ContactListRepository $repository;

  public function __construct(ContactListRepository $repository)
  {
    $this->repository = $repository;
  }

  public function store(array $person)
  {
    $contacts = $person['contacts'];
    $personEntity = new Person(
      $person['name'],
      $person['lastname'],
      $this->createContactCollectionEntityFromArray($contacts)
    );
    $this->repository->store($personEntity);
  }

  private function createContactCollectionEntityFromArray($contacts): ContactCollection
  {
    $contactsArray = [];
    foreach ($contacts as $contact) {
      $contactsArray[] = new Contact($contact);
    }
    return new ContactCollection(...$contactsArray);
  }

  public function listAll(): PersonPresenterCollection
  {
    $personEntities = $this->repository->getAllPersons();
    $presenters = [];
    foreach ($personEntities as $personEntity) {
      $presenters[] = new PersonPresenter(
        $personEntity->getId(),
        $personEntity->getName(),
        $personEntity->getLastName(),
        $this->getContactsPresenterFromEntity($personEntity->getContacts())
      );
    }

    return new PersonPresenterCollection(...$presenters);
  }

  private function getContactsPresenterFromEntity(ContactCollection $contacts): ContactPresenterCollection
  {
    $presenters = [];
    foreach ($contacts as $contact) {
      $presenters[] = new ContactPresenter(
        $contact->getId(),
        $contact->getContact()
      );
    }
    return new ContactPresenterCollection(...$presenters);
  }

  public function getOnePerson(int $id)
  {
    $personEntity = $this->repository->getPersonById($id);
    return new PersonPresenter(
      $personEntity->getId(),
      $personEntity->getName(),
      $personEntity->getLastName(),
      $this->getContactsPresenterFromEntity($personEntity->getContacts())
    );
  }
}
