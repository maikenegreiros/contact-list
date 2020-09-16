<?php
namespace App\Domain\ContactList\Services;

use App\Domain\ContactList\Entities\Person;
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

  public function listAll(): array
  {
    $personEntities = $this->repository->getAllPersons();
    $presenters = [];
    foreach ($personEntities as $personEntity) {
      $presenters[] = [
        'id' => $personEntity->getId(),
        'name' => $personEntity->getName(),
        'lastname' => $personEntity->getLastName(),
        'contacts' => $this->getContactsPresenterFromEntity($personEntity->getContacts())
      ];
    }

    return $presenters;
  }

  private function getContactsPresenterFromEntity(ContactCollection $contacts): array
  {
    $presenters = [];
    foreach ($contacts as $contact) {
      $presenters[] = $contact->getContact();
    }
    return $presenters;
  }

  public function getOnePerson(int $id): array
  {
    $personEntity = $this->repository->getPersonById($id);
    return [
      'id' => $personEntity->getId(),
      'name' => $personEntity->getName(),
      'lastname' => $personEntity->getLastName(),
      'contacts' => $this->getContactsPresenterFromEntity($personEntity->getContacts())
    ];
  }
}
