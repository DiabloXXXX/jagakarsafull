<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\PjlpModel;
use App\Models\ActivityLogModel;

class Pjlp extends BaseController
{
    protected $pjlpModel;

    public function __construct()
    {
        $this->pjlpModel = new PjlpModel();
    }

    public function index()
    {
        return view('admin/pjlp', [
            'pjlp' => $this->pjlpModel->orderBy('sort_order', 'ASC')->findAll()
        ]);
    }

    public function store()
    {
        // Validasi CSRF
        if (!$this->validate(['csrf_test_name' => 'required'])) {
            return redirect()->back()->withInput()->with('error', 'Token keamanan tidak valid');
        }
        
        $rules = [
            'title' => 'required|min_length[3]|max_length[255]',
            'personil_count' => 'permit_empty|numeric',
            'status' => 'permit_empty|in_list[publish,draft]',
        ];
        
        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Process main tasks as JSON
        $tasks = $this->request->getPost('tasks');
        $mainTasks = [];
        if (is_array($tasks)) {
            foreach ($tasks as $task) {
                if (!empty(trim($task))) {
                    $mainTasks[] = trim($task);
                }
            }
        }

        try {
            $this->pjlpModel->save([
                'title' => $this->request->getPost('title'),
                'description' => $this->request->getPost('description'),
                'personil_count' => $this->request->getPost('personil_count') ?? 0,
                'main_tasks' => json_encode($mainTasks),
                'sort_order' => $this->request->getPost('sort_order') ?? 0,
                'status' => $this->request->getPost('status') ?? 'publish'
            ]);

            ActivityLogModel::log('create', 'pjlp', 'Menambahkan PJLP: ' . $this->request->getPost('title'));

            return redirect()->back()->with('success', 'PJLP berhasil ditambahkan');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', 'Gagal menyimpan: ' . $e->getMessage());
        }
    }

    public function update($id)
    {
        // Validasi CSRF
        if (!$this->validate(['csrf_test_name' => 'required'])) {
            return redirect()->back()->withInput()->with('error', 'Token keamanan tidak valid');
        }
        
        // Cek apakah PJLP exists
        $pjlp = $this->pjlpModel->find($id);
        if (!$pjlp) {
            return redirect()->back()->with('error', 'PJLP tidak ditemukan');
        }
        
        $rules = [
            'title' => 'required|min_length[3]|max_length[255]',
            'personil_count' => 'permit_empty|numeric',
            'status' => 'permit_empty|in_list[publish,draft]',
        ];
        
        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Process main tasks as JSON
        $tasks = $this->request->getPost('tasks');
        $mainTasks = [];
        if (is_array($tasks)) {
            foreach ($tasks as $task) {
                if (!empty(trim($task))) {
                    $mainTasks[] = trim($task);
                }
            }
        }

        try {
            $this->pjlpModel->update($id, [
                'title' => $this->request->getPost('title'),
                'description' => $this->request->getPost('description'),
                'personil_count' => $this->request->getPost('personil_count') ?? 0,
                'main_tasks' => json_encode($mainTasks),
                'sort_order' => $this->request->getPost('sort_order') ?? 0,
                'status' => $this->request->getPost('status') ?? 'publish'
            ]);

            ActivityLogModel::log('update', 'pjlp', 'Mengupdate PJLP: ' . $this->request->getPost('title'));

            return redirect()->back()->with('success', 'PJLP berhasil diperbarui');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', 'Gagal menyimpan: ' . $e->getMessage());
        }
    }

    public function delete($id)
    {
        // Validasi CSRF
        if (!$this->validate(['csrf_test_name' => 'required'])) {
            return redirect()->back()->with('error', 'Token keamanan tidak valid');
        }
        
        $pjlp = $this->pjlpModel->find($id);
        if (!$pjlp) {
            return redirect()->back()->with('error', 'PJLP tidak ditemukan');
        }
        
        try {
            $this->pjlpModel->delete($id);
            ActivityLogModel::log('delete', 'pjlp', 'Menghapus PJLP: ' . ($pjlp['title'] ?? 'ID ' . $id));
            return redirect()->back()->with('success', 'PJLP berhasil dihapus');
        } catch (\Exception $e) {
            log_message('error', 'Failed to delete PJLP: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Gagal menghapus PJLP');
        }
    }
}
