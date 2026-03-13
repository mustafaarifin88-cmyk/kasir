<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\PersentaseModel;

class Persentase extends BaseController
{
    protected $persentaseModel;

    public function __construct()
    {
        $this->persentaseModel = new PersentaseModel();
    }

    public function index()
    {
        $data = [
            'title'      => 'Persentase Karyawan',
            'persentase' => $this->persentaseModel->findAll()
        ];
        return view('admin/persentase', $data);
    }

    public function save()
    {
        $this->persentaseModel->save([
            'nilai_persentase' => $this->request->getPost('nilai_persentase')
        ]);

        return redirect()->to(base_url('admin/persentase'))->with('success', 'Persentase berhasil ditambahkan');
    }

    public function update($id)
    {
        $this->persentaseModel->update($id, [
            'nilai_persentase' => $this->request->getPost('nilai_persentase')
        ]);

        return redirect()->to(base_url('admin/persentase'))->with('success', 'Persentase berhasil diupdate');
    }

    public function delete($id)
    {
        $this->persentaseModel->delete($id);
        return redirect()->to(base_url('admin/persentase'))->with('success', 'Persentase berhasil dihapus');
    }
}