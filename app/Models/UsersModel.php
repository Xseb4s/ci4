<?php 
namespace App\Models;

use CodeIgniter\Model;

class UsersModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'email', 'age'];
    protected $returnType = 'array';

    protected $useTimestamps = true;
    protected $dateFormat = 'datetime';
    protected $createdField = 'date_create';
    protected $updatedField = 'date_update';
}
?>