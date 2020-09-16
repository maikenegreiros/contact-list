<?php
namespace App\Http\Controllers;

use App\Domain\ContactList\Services\ContactList;
use App\Repositories\ContactListEloquentRepository;
use Illuminate\Http\Request;

class PersonsController extends Controller
{
  private ContactList $contactList;

  public function __construct()
  {
    $this->contactList = new ContactList(new ContactListEloquentRepository);
  }

  public function index()
  {
    $personsPresenters = $this->contactList->listAll();
    return response()->json($personsPresenters, 200);
  }

  public function show($id)
  {
    $personPresenter = $this->contactList->getOnePerson($id);
    return response()->json($personPresenter, 200);
  }

  public function store(Request $request)
  {
    $this->validate($request, [
      'name' => 'required|string',
      'lastname' => 'required|string',
      'contacts' => 'required|array',
    ]);

    $this->contactList->store($request->all());
  }
}
