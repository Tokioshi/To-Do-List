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
        return $this->select('id, nama, judul, prioritas, status, tenggat_waktu')
                    ->orderBy("FIELD(prioritas, 'Tinggi', 'Sedang', 'Rendah')")
                    ->findAll();
    }

    public function getData($parameter)
    {
        if (!$parameter) {
            return null;
        }

        return $this->find($parameter);
    }

    public function getKeyword($parameter)
    {
        if (empty($parameter)) {
            return [];
        }

        $builder = $this->table($this->table)
                        ->select('id, nama, judul, prioritas, status, tenggat_waktu')
                        ->like('nama', $parameter)
                        ->orderBy("FIELD(prioritas, 'Tinggi', 'Sedang', 'Rendah')");

        return $builder->get()->getResultArray();
    }
}
