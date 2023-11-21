<?php

namespace Adexe\People\Controllers;

use Adexe\People\Models\Person;

class PersonController
{
  public function list()
  {
    $people = Person::all();
    require('../src/views/person/list.php');
  }

  public function show($id)
  {
    $people = Person::find($id);
    if ($people) require('../src/views/person/show.php');
    else $this->list();
  }

  public function delete($id)
  {
    $people = Person::find($id);
    if ($people) $people->delete();
    $this->list();
  }

  public function create()
  {
    require('../src/views/person/create.php');
  }

  public function post($data)
  {
    $person = new Person();
    $person->name = $data['name'];
    $person->save();
    $this->list();
  }
}
