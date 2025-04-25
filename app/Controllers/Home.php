<?php

namespace App\Controllers;

use App\Models\NoteModel;

class Home extends BaseController
{
    protected $note;

    function __construct()
    {
        $this->note = new NoteModel();

        helper('global_helper');
        helper('form');
    }

    public function index()
    {
        $data = [
            'note' => $this->note->listData(),
            'current' => '/',
        ];

        // print_r($this->note->listData());

        return view('main/index', $data);
    }

    public function tambah()
    {
        $data = [
            'current' => 'tambah',
            'opsi' => 'save'
        ];

        return view('main/tambah', $data);
    }

    public function edit($id_note = null)
    {
        if (is_null($id_note)) {
            session()->setFlashdata('error', 'Tugas tidak ditemukan!');

            return redirect()->to('/');
        }

        $dataNote = $this->note->getData($id_note);
        if (empty($dataNote)) {
            session()->setFlashdata('error', 'Tugas tidak ditemukan!');

            return redirect()->to('/');
        }

        $data = [
            'dataNote' => $dataNote,
            'opsi' => 'update',
            'current' => 'edit'
        ];

        return view('main/tambah', $data);
    }

    public function detail($id_note = null)
    {
        if (is_null($id_note)) {
            session()->setFlashdata('error', 'Tugas tidak ditemukan!');

            return redirect()->to('/');
        }

        $dataNote = $this->note->getData($id_note);
        if (empty($dataNote)) {
            session()->setFlashdata('error', 'Tugas tidak ditemukan!');

            return redirect()->to('/');
        }

        $data = [
            'dataNote' => $dataNote,
            'current' => 'detail'
        ];

        return view('main/detail', $data);
    }

    function save()
    {
        if (!$this->validate([
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama harus diisi!'
                ]
            ],
            'judul' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Judul harus diisi!'
                ]
            ],
            'prioritas' => [
                'rules' => 'required|in_list[Tinggi,Sedang,Rendah]',
                'errors' => [
                    'required' => 'Harap pilih prioritas tugas!',
                    'in_list' => 'Pilihan prioritas tidak valid!'
                ]
            ],
            'tenggat_waktu' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tenggat Waktu harus diisi!'
                ]
            ],
            'deskripsi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Deskripsi harus diisi!'
                ]
            ]
        ])) {
            return redirect()->to('tambah')->withInput()->with('validation', $this->validator);;
        }

        $this->note->save([
            'nama' => $this->request->getVar('nama'),
            'judul' => $this->request->getVar('judul'),
            'prioritas' => $this->request->getVar('prioritas'),
            'tenggat_waktu' => $this->request->getVar('tenggat_waktu'),
            'tanggal_dibuat' => date('Y-m-d'),
            'deskripsi' => $this->request->getVar('deskripsi'),
            'status' => 'Belum Selesai'
        ]);

        session()->setFlashdata('pesan', 'Data berhasil disimpan!');

        return redirect()->to('/');
    }

    function update($id_note)
    {
        if (!$this->validate([
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama harus diisi!'
                ]
            ],
            'judul' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Judul harus diisi!'
                ]
            ],
            'prioritas' => [
                'rules' => 'required|in_list[Tinggi,Sedang,Rendah]',
                'errors' => [
                    'required' => 'Harap pilih prioritas tugas!',
                    'in_list' => 'Pilihan prioritas tidak valid!'
                ]
            ],
            'tenggat_waktu' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tenggat Waktu harus diisi!'
                ]
            ],
            'status' => [
                'rules' => 'required|in_list[Selesai,Belum Selesai]',
                'errors' => [
                    'required' => 'Harap pilih status tugas!',
                    'in_list' => 'Pilihan status tidak valid!'
                ]
            ],
            'deskripsi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Deskripsi harus diisi!'
                ]
            ]
        ])) {
            return redirect()->to('edit/' . $id_note)->withInput()->with('validation', $this->validator);
        }

        $this->note->update($id_note, [
            'nama' => $this->request->getVar('nama'),
            'judul' => $this->request->getVar('judul'),
            'prioritas' => $this->request->getVar('prioritas'),
            'tenggat_waktu' => $this->request->getVar('tenggat_waktu'),
            'tanggal_dibuat' => date('Y-m-d'),
            'status' => $this->request->getVar('status'),
            'deskripsi' => $this->request->getVar('deskripsi')
        ]);

        session()->setFlashdata('pesan', 'Data berhasil diubah!');

        return redirect()->to('/');
    }

    function delete($id_note = null)
    {
        if (is_null($id_note)) {
            session()->setFlashdata('error', 'Tugas tidak ditemukan!');

            return redirect()->to('/');
        }

        $dataNote = $this->note->getData($id_note);
        if (empty($dataNote)) {
            session()->setFlashdata('error', 'Tugas tidak ditemukan!');

            return redirect()->to('/');
        }

        $this->note->delete($id_note);
        session()->setFlashdata('pesan', 'Tugas berhasil dihapus!');

        return redirect()->to('/');
    }

    function selesai($id_note = null)
    {
        if (is_null($id_note)) {
            session()->setFlashdata('error', 'Tugas tidak ditemukan!');

            return redirect()->to('/');
        }

        $dataNote = $this->note->getData($id_note);
        if (empty($dataNote)) {
            session()->setFlashdata('error', 'Tugas tidak ditemukan!');

            return redirect()->to('/');
        }

        $this->note->update($id_note, [
            'status' => 'Selesai',
        ]);

        session()->setFlashdata('pesan', '🎉 Tugas berhasil diselesaikan! 🎉');

        return redirect()->to('/');
    }

    public function search()
    {
        $keyword = $this->request->getVar('nama');

        if (empty($keyword)) {
            return redirect()->to('/');
        }

        $noteData = $this->note->getKeyword($keyword);

        if (empty($noteData)) {
            session()->setFlashdata('error', 'Data tidak ditemukan!');

            return redirect()->to('/');
        }

        $data = [
            'note' => $noteData,
            'current' => 'search'
        ];

        return view('main/index', $data);
    }
}
