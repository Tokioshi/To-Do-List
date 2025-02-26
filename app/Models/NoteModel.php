<?php

namespace App\Models;

use CodeIgniter\Model;

class NoteModel extends Model
{
    protected $table            = 'todo';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['nama', 'judul', 'prioritas', 'tenggat_waktu', 'tanggal_dibuat', 'status', 'deskripsi'];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    protected array $casts = [];
    protected array $castHandlers = [];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function listData()
    {
        return $this->orderBy("FIELD(prioritas, 'Tinggi', 'Sedang', 'Rendah')")->findAll();
    }

    public function getData($parameter)
    {
        $builder = $this->table($this->table);
        $builder->where('id=', $parameter);
        $query = $builder->get();
        return $query->getRowArray();
    }

    public function getKeyword($parameter)
    {
        $builder = $this->table($this->table);

        if ($parameter) {
            $builder->groupStart();
            $builder->where('nama', $parameter);
            $builder->orLike('nama', $parameter);
            $builder->groupEnd();
        }

        // Urutkan berdasarkan prioritas secara custom
        $builder->orderBy("
        CASE 
            WHEN prioritas = 'Tinggi' THEN 1
            WHEN prioritas = 'Sedang' THEN 2
            WHEN prioritas = 'Rendah' THEN 3
        END
    ");

        $query = $builder->get();
        return $query->getResultArray();
    }
}
