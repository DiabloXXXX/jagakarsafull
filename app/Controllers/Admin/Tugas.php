<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\TugasModel;
use App\Models\ActivityLogModel;

class Tugas extends BaseController
{
    protected $tugasModel;

    public function __construct()
    {
        $this->tugasModel = new TugasModel();
    }

    public function index()
    {
        return view('admin/tugas', [
            'tugas' => $this->tugasModel->orderBy('sort_order', 'ASC')->findAll()
        ]);
    }

    public function store()
    {
        $rules = [
            'title' => 'required|min_length[3]|max_length[255]',
        ];
        
        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Process full description as JSON
        $descriptions = $this->request->getPost('descriptions');
        $fullDescription = [];
        if (is_array($descriptions)) {
            foreach ($descriptions as $desc) {
                if (!empty(trim($desc))) {
                    $fullDescription[] = trim($desc);
                }
            }
        }

        try {
            $this->tugasModel->save([
                'title' => $this->request->getPost('title'),
                'short_description' => $this->request->getPost('short_description'),
                'full_description' => json_encode($fullDescription),
                'sort_order' => $this->request->getPost('sort_order') ?? 0,
                'status' => $this->request->getPost('status') ?? 'publish'
            ]);

            ActivityLogModel::log('create', 'tugas', 'Menambahkan tugas: ' . $this->request->getPost('title'));

            return redirect()->back()->with('success', 'Tugas berhasil ditambahkan');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', 'Gagal menyimpan: ' . $e->getMessage());
        }
    }

    public function update($id)
    {
        $rules = [
            'title' => 'required|min_length[3]|max_length[255]',
        ];
        
        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Process full description as JSON
        $descriptions = $this->request->getPost('descriptions');
        $fullDescription = [];
        if (is_array($descriptions)) {
            foreach ($descriptions as $desc) {
                if (!empty(trim($desc))) {
                    $fullDescription[] = trim($desc);
                }
            }
        }

        try {
            $this->tugasModel->update($id, [
                'title' => $this->request->getPost('title'),
                'short_description' => $this->request->getPost('short_description'),
                'full_description' => json_encode($fullDescription),
                'sort_order' => $this->request->getPost('sort_order') ?? 0,
                'status' => $this->request->getPost('status') ?? 'publish'
            ]);

            ActivityLogModel::log('update', 'tugas', 'Mengupdate tugas: ' . $this->request->getPost('title'));

            return redirect()->back()->with('success', 'Tugas berhasil diperbarui');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', 'Gagal menyimpan: ' . $e->getMessage());
        }
    }

    public function delete($id)
    {
        $tugas = $this->tugasModel->find($id);
        if (!$tugas) {
            return redirect()->back()->with('error', 'Tugas tidak ditemukan');
        }
        $this->tugasModel->delete($id);
        ActivityLogModel::log('delete', 'tugas', 'Menghapus tugas: ' . ($tugas['title'] ?? 'ID ' . $id));
        return redirect()->back()->with('success', 'Tugas berhasil dihapus');
    }
}
