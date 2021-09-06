<?php

namespace App\Models;

use CodeIgniter\Model;
use Ozdemir\Datatables\Datatables;
use Ozdemir\Datatables\DB\Codeigniter4Adapter;
use Tightenco\Collect\Support\Collection;

/**
 * This class describes a kata dasar model.
 */
class KataDasarModel extends Model
{
    protected $DBGroup              = 'default';
    protected $table                = 'kata_dasar';
    protected $primaryKey           = 'id';
    protected $useAutoIncrement     = true;
    protected $insertID             = 0;
    protected $returnType           = 'array';
    protected $useSoftDeletes       = false;
    protected $protectFields        = true;
    protected $allowedFields        = ['kata', 'arti_kata'];

    // Dates
    protected $useTimestamps        = false;



    /**
     * Mendapatkan semua kata dasar yang ada di database.
     */
    public function getAll()
    {
        $dt = new Datatables(new Codeigniter4Adapter());
        $dt->query('select id, kata, arti_kata from kata_dasar');

        $dt->add('action', function($q) {
            return '';
        });
        echo $dt->generate();
    }


    public function getKamus()
    {
        $kamus = $this->findAll();
        $collection = (new Collection($kamus))->pluck('kata')->all();
        return $collection;
    }

    public function getArti($kata)
    {
        $arti = $this->where('kata', $kata)->select('arti_kata')->get();
        $list_arti = [];
        foreach ($arti->getResultArray() as $key => $value) {
            $list_arti[] = $value['arti_kata'];
        }
        return $list_arti;
    }
}
