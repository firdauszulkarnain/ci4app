<?php

namespace App\Controllers;

use App\Models\BukuModel;

class Buku extends BaseController
{
    protected $bukuModel;
    protected $mRequest;
    public function __construct()
    {
        $this->bukuModel = new BukuModel();
        $this->mRequest = service("request");
    }
    public function index()
    {
        $data = [
            'title' => 'Daftar Buku',
            'buku' => $this->bukuModel->getBuku()
        ];

        return view('buku/index', $data);
    }

    public function detail($slug)
    {
        $data = [
            'title' => 'Detail Buku',
            'buku' =>  $this->bukuModel->getBuku($slug)
        ];

        if (empty($data['buku'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Judul Buku ' . $slug . 'Tidak Ditemukan');
        }

        return view('buku/detail', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Buku',
            'validation' => \Config\Services::validation()
        ];

        return view('buku/create', $data);
    }

    public function save()
    {

        // Validasi Input
        if (!$this->validate([
            // 'judul' => 'is_unique[buku.judul]|required'
            'judul' => [
                'rules' => 'is_unique[buku.judul]|required',
                'errors' => [
                    'required' => '{field} Harus Diisi',
                    'is_unique' => '{field} Sudah Ada'
                ]
            ]
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('/buku/create')->withInput()->with('validation', $validation);
        }
        $slug = url_title($this->mRequest->getVar('judul'), '-', true);
        $this->bukuModel->save([
            'judul' => $this->mRequest->getVar('judul'),
            'slug' => $slug,
            'penulis' => $this->mRequest->getVar('penulis'),
            'penerbit' => $this->mRequest->getVar('penerbit'),
            'cover' => $this->mRequest->getVar('cover'),
        ]);

        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan');
        return redirect()->to('/buku');
    }
}
