<?php

namespace App\Models;

use CodeIgniter\Model;
use Ozdemir\Datatables\Datatables;
use Ozdemir\Datatables\DB\Codeigniter4Adapter;

class DataUjiModel extends Model
{
    protected $DBGroup              = 'default';
    protected $table                = 'data_uji';
    protected $primaryKey           = 'id';
    protected $useAutoIncrement     = true;
    protected $insertID             = 0;
    protected $returnType           = 'array';
    protected $useSoftDeletes       = false;
    protected $protectFields        = true;
    protected $allowedFields        = ['kata', 'arti_kata', 'kata_stemmed', 'kata_pakar', 'ketemu'];


// Dates
    protected $useTimestamps        = false;


    /**
    * Mendapatkan semua data uji yang ada di database.
    */
    public function getAll()
    {
        $dt = new Datatables(new Codeigniter4Adapter());
        $dt->query('select id, kata, kata_pakar from data_uji');

        $dt->add('action', function($q) {
            return '';
        });
        echo $dt->generate();
    }


    public function getAllMenuPengujian()
    {
        $dt = new Datatables(new Codeigniter4Adapter());
        $dt->query('select id, kata, kata_stemmed, kata_pakar, ketemu from data_uji');

        $dt->add('action', function($q) {
            return '';
        });
        echo $dt->generate();
    }


    public function getAllDataTelahDiuji()

    {
        $db      = \Config\Database::connect();
        $string_query = 'SELECT * FROM data_uji WHERE kata_stemmed IS NOT NULL AND ketemu IS NOT NULL';
        $query = $db->query($string_query);
        $result = $query->getResult();
        return $result;

    }

    public function getTotalDataTelahDiuji()
    {
        $db      = \Config\Database::connect();
        $string_query = "SELECT COUNT(a.id) AS total_uji, SUM(if(a.ketemu IN (1,0), 1,0)) AS total_benar, SUM(if(a.ketemu = -1, 1, 0)) AS total_salah FROM data_uji a WHERE a.ketemu IS NOT NULL AND a.kata_stemmed IS NOT NULL";
        $query = $db->query($string_query);
        $result = $query->getRow();
        return $result;
    }
}
