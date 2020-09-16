<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Contact;

class Person extends Model
{
  protected $table = "persons";
  protected $fillable = [
    'name', 'lastname',
  ];

  public function contacts()
  {
    return $this->hasMany(Contact::class);
  }
}
