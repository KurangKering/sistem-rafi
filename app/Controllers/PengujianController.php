<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use App\Models\DataUjiModel;
use App\Models\KataDasarModel;
use KurangKering\GayoStemmer\Stemmer;
use Tightenco\Collect\Support\Collection;
class PengujianController extends ResourceController
{


    public function __construct()
    {
        $this->modelDataUji = new DataUjiModel();
    }
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {
        return view('pengujian/index');
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null)
    {
    	echo 'cicak';
    }

    /**
     * Return data kata dasar.
     *
     * @return JSON datatables
     */
    public function show_all()
    {   
        $dt = $this->modelDataUji->getAllDataUji();
        echo $dt;
    }
    public function show_all_data_uji_menu_pengujian()
    {   
        $dt = $this->modelDataUji->getAllDataUjiMenuPengujian();
        echo $dt;
    }

    /**
     * Return a new resource object, with default properties
     *
     * @return mixed
     */
    public function new()
    {
        //
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        //
    }

    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */
    public function edit($id = null)
    {
        //
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null)
    {
        //
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        //
    }

    public function pengujian_tunggal()
    {

        return view('pengujian/pengujian_tunggal');

    }

    public function pengujian_data_uji()
    {
        $summary_pengujian = $this->modelDataUji->getTotalDataTelahDiuji();
        $total_uji = $summary_pengujian->total_uji;
        $total_benar = $summary_pengujian->total_benar;
        $total_salah = $summary_pengujian->total_salah;
        $akurasi = 0;
        if ($total_uji > 0) {
            $akurasi = $total_benar / $total_uji * 100;
        }

        $response = array(
            'total_uji' => $total_uji,
            'total_benar' => $total_benar,
            'total_salah' => $total_salah,
            'akurasi' => round($akurasi, 2) . "%",
        );

        return view('pengujian/pengujian_data_uji', $response);

    }

    public function proses_pengujian_tunggal()
    {
        $kata_dasar_model = new KataDasarModel();
        $array_kata_dasar = $kata_dasar_model->getKamus();

        $factory = new Stemmer\StemmerFactory();
        $stemmer = $factory->createGayoStemmer($array_kata_dasar);
        $input = $this->request->getPost('data_uji');

        $stemmed = $stemmer->detailStem($input);
        $arti = [];
        if ($stemmed['ketemu']) {
            $arti = $kata_dasar_model->getArtiKataDasar($stemmed['hasil']);

        }
        $stemmed['arti'] = $arti;
        $response = [
            'success' => true,
            'data' => [
                'hasil_data_uji' => $stemmed,
            ]

        ];

        return $this->response->setJSON($response);

    }

    public function proses_pengujian_data_uji()
    {
        $kata_dasar_model = new KataDasarModel();
        $data_uji_model = new DataUjiModel();
        $array_kata_dasar = $kata_dasar_model->getKamus();

        $factory = new Stemmer\StemmerFactory();
        $stemmer = $factory->createGayoStemmer($array_kata_dasar);

        $data_uji = $data_uji_model->findAll();
        $hasil_stem = array();
        $updated_data = array();

        foreach ($data_uji as $key => $data) {
            $input = $data['kata'];
            $result = $stemmer->detailStem($input);
            $updated_data[$key]['id'] = $data['id'];
            $updated_data[$key]['kata_stemmed'] = $result['hasil'];

            $ketemu = -1;
            if ($result['ketemu'] && count($result['rules']) > 0) {
                $ketemu = 1;
            } elseif ($result['ketemu']) {
                $ketemu = 0;
            }
            
            $update_model = array(
                'kata_stemmed' => $result['hasil'],
                'ketemu' => $ketemu,
            );
            $data_uji_model->update($data['id'], $update_model);
            $hasil_stem[$key] = $result;

        }
        $summary_pengujian = $this->modelDataUji->getTotalDataTelahDiuji();
        $total_uji = $summary_pengujian->total_uji;
        $total_benar = $summary_pengujian->total_benar;
        $total_salah = $summary_pengujian->total_salah;
        $akurasi = 0;
        if ($total_uji > 0) {
            $akurasi = $total_benar / $total_uji * 100;
        }

        $response = array(
            'success' => true,
            
            'total_uji' => $total_uji,
            'total_benar' => $total_benar,
            'total_salah' => $total_salah,
            'akurasi' => round($akurasi, 2) . "%",
        );

      

        return $this->response->setJSON($response);

    }
}
