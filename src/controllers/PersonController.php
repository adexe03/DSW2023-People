<?php

namespace Adexe\People\Controllers;

use Adexe\People\Models\Person;

class PersonController
{
  private $messages = [];

  public function list()
  {
    $people = Person::all();
    require('../src/views/template/head.php');
    require('../src/views/person/list.php');
    require('../src/views/template/foot.php');
  }

  public function show($id)
  {
    $people = Person::find($id);
    if ($people) {
      require('../src/views/template/head.php');
      require('../src/views/person/show.php');
      require('../src/views/template/foot.php');
    } else {
      $this->messages[] = [
        'type' => 'error',
        'text' => "No se encuentra la persona con el id: $id"
      ];
      $this->list();
    }
  }

  public function delete($id)
  {
    $people = Person::find($id);
    if ($people) {
      $this->messages[] = [
        'type' => 'success',
        'text' => "Se ha borrado la persona con el id: $id"
      ];
      $people->delete();
    } else {
      $this->messages[] = [
        'type' => 'error',
        'text' => "No se encuentra la persona con el id: $id"
      ];
    }
    $this->list();
  }

  public function create()
  {
    require('../src/views/template/head.php');
    require('../src/views/person/create.php');
    require('../src/views/template/foot.php');
  }

  public function post($data)
  {
    $people = new Person();
    $people->name = $data['name'];
    $people->save();
    $this->list();
    // header('Location', 'http://localhost/DSW/DSW2023-People/public/index.php');
  }

  public function edit($id)
  {
    $people = Person::find($id);
    if ($people) {
      require('../src/views/template/head.php');
      require('../src/views/person/edit.php');
      require('../src/views/template/foot.php');
    } else {
      $this->messages[] = [
        'type' => 'error',
        'text' => "No se encuentra la persona con el id: $id"
      ];
      $this->list();
    }
  }

  public function update($id, $data)
  {
    $people = Person::find($id);
    if ($people) {
      if (!empty($data['name'])) {
        $people->name = $data['name'];
        $people->save();
        $this->list();
        $this->messages[] = [
          'type' => 'success',
          'text' => "Se ha actualizado correctamente la persona con id: $people->id"
        ];
      } else {
        $this->messages[] = [
          'type' => 'error',
          'text' => "El nombre no puede estar vacío"
        ];
        $this->edit($id);
      }
    } else {
      $this->messages[] = [
        'type' => 'error',
        'text' => "No se encuentra la persona con el id: $id"
      ];
    }
    $this->list();
  }
}
