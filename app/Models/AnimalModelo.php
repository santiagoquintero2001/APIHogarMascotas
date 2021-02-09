<?php namespace App\Models;

use CodeIgniter\Model;

class AnimalModelo extends Model {

    protected $table = 'animal';
    protected $primaryKey = 'idAnimal';
    protected $allowedFields = ['idAnimal', 'nombreAnimal','edadAnimal','tipoAnimal', 'descripcionAnimal','comidaAnimal'];

}