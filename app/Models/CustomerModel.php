<?php namespace App\Models;

    use CodeIgniter\Model;

    class CustomerModel extends Model
    {
        protected $table            = 'customers';
        protected $primaryKey       = 'id';
        protected $useAutoIncrement = true;
        protected $useSoftDeletes   = false;
        protected $protectedFields  = true;
        protected $allowedFields    = [
            'name', 'email', 'no_phone', 'soft_delete', 'skillset', 'hobby', 'created_at'
        ];

        protected $useTimestamps    = false;
        protected $dataFormat       = 'datatime';
        protected $createdField     = 'created_at';
        protected $updatedField     = 'updated_at';
        protected $deletedField     = 'deleted_at';

        protected $validationRules  = [];

    }

?>