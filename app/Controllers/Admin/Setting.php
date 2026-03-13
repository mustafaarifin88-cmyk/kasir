<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\SettingModel;

class Setting extends BaseController
{
    protected $settingModel;

    public function __construct()
    {
        $this->settingModel = new SettingModel();
    }

    public function index()
    {
        $data = [
            'title'   => 'Setting Barbershop',
            'setting' => $this->settingModel->first()
        ];
        return view('admin/setting', $data);
    }

    public function update()
    {
        $id = $this->request->getPost('id');
        $fileLogo = $this->request->getFile('logo');
        
        $data = [
            'nama_barbershop' => $this->request->getPost('nama_barbershop'),
            'nama_pimpinan'   => $this->request->getPost('nama_pimpinan'),
            'alamat'          => $this->request->getPost('alamat'),
        ];

        if ($fileLogo->isValid() && ! $fileLogo->hasMoved()) {
            $namaLogo = $fileLogo->getRandomName();
            $fileLogo->move('uploads/logo', $namaLogo);
            $data['logo'] = $namaLogo;
        }

        if ($id) {
            $this->settingModel->update($id, $data);
        } else {
            $this->settingModel->insert($data);
        }

        return redirect()->to(base_url('admin/setting'))->with('success', 'Data Setting berhasil diperbarui');
    }
}