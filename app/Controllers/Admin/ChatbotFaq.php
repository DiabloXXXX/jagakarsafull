<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ChatbotFaqModel;
use App\Models\ActivityLogModel;

class ChatbotFaq extends BaseController
{
    protected $faqModel;

    public function __construct()
    {
        $this->faqModel = new ChatbotFaqModel();
    }

    public function index()
    {
        $faqs = $this->faqModel->orderBy('category', 'ASC')
                               ->orderBy('sort_order', 'ASC')
                               ->findAll();
        
        // Group by category
        $grouped = [];
        foreach ($faqs as $faq) {
            $grouped[$faq['category']][] = $faq;
        }

        return view('admin/chatbot', [
            'faqs' => $faqs,
            'grouped' => $grouped,
            'categories' => $this->faqModel->getCategories()
        ]);
    }

    public function store()
    {
        // Validasi CSRF
        if (!$this->validate(['csrf_test_name' => 'required'])) {
            return redirect()->back()->withInput()->with('error', 'Token keamanan tidak valid');
        }
        
        $rules = [
            'question' => 'required|min_length[5]|max_length[500]',
            'keywords' => 'required|min_length[2]|max_length[500]',
            'answer'   => 'required|min_length[10]',
            'status'   => 'permit_empty|in_list[active,inactive]',
        ];
        
        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('error', 'Validasi gagal: ' . implode(', ', $this->validator->getErrors()));
        }

        try {
            $this->faqModel->save([
                'category'    => $this->request->getPost('category') ?: 'Umum',
                'keywords'    => $this->request->getPost('keywords'),
                'question'    => $this->request->getPost('question'),
                'answer'      => $this->request->getPost('answer'),
                'icon'        => $this->request->getPost('icon') ?: '💬',
                'sort_order'  => $this->request->getPost('sort_order') ?? 0,
                'is_featured' => $this->request->getPost('is_featured') ? 1 : 0,
                'status'      => $this->request->getPost('status') ?? 'active'
            ]);

            ActivityLogModel::log('create', 'chatbot', 'Menambahkan FAQ: ' . $this->request->getPost('question'));

            return redirect()->back()->with('success', 'FAQ berhasil ditambahkan');
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
        
        // Cek apakah FAQ exists
        $faq = $this->faqModel->find($id);
        if (!$faq) {
            return redirect()->back()->with('error', 'FAQ tidak ditemukan');
        }
        
        $rules = [
            'question' => 'required|min_length[5]|max_length[500]',
            'keywords' => 'required|min_length[2]|max_length[500]',
            'answer'   => 'required|min_length[10]',
            'status'   => 'permit_empty|in_list[active,inactive]',
        ];
        
        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('error', 'Validasi gagal: ' . implode(', ', $this->validator->getErrors()));
        }

        try {
            $this->faqModel->update($id, [
                'category'    => $this->request->getPost('category') ?: 'Umum',
                'keywords'    => $this->request->getPost('keywords'),
                'question'    => $this->request->getPost('question'),
                'answer'      => $this->request->getPost('answer'),
                'icon'        => $this->request->getPost('icon') ?: '💬',
                'sort_order'  => $this->request->getPost('sort_order') ?? 0,
                'is_featured' => $this->request->getPost('is_featured') ? 1 : 0,
                'status'      => $this->request->getPost('status') ?? 'active'
            ]);

            ActivityLogModel::log('update', 'chatbot', 'Mengupdate FAQ: ' . $this->request->getPost('question'));

            return redirect()->back()->with('success', 'FAQ berhasil diperbarui');
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
        
        $faq = $this->faqModel->find($id);
        if (!$faq) {
            return redirect()->back()->with('error', 'FAQ tidak ditemukan');
        }
        
        try {
            $this->faqModel->delete($id);
            ActivityLogModel::log('delete', 'chatbot', 'Menghapus FAQ: ' . ($faq['question'] ?? 'ID ' . $id));
            return redirect()->back()->with('success', 'FAQ berhasil dihapus');
        } catch (\Exception $e) {
            log_message('error', 'Failed to delete FAQ: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Gagal menghapus FAQ');
        }
    }

    public function toggleFeatured($id)
    {
        // Validasi CSRF
        if (!$this->validate(['csrf_test_name' => 'required'])) {
            return redirect()->back()->with('error', 'Token keamanan tidak valid');
        }
        
        $faq = $this->faqModel->find($id);
        if ($faq) {
            $this->faqModel->update($id, [
                'is_featured' => $faq['is_featured'] ? 0 : 1
            ]);
            ActivityLogModel::log('update', 'chatbot', 'Toggle featured FAQ: ' . ($faq['question'] ?? 'ID ' . $id));
            return redirect()->back()->with('success', 'Status featured berhasil diubah');
        }
        return redirect()->back()->with('error', 'FAQ tidak ditemukan');
    }

    public function toggleStatus($id)
    {
        // Validasi CSRF
        if (!$this->validate(['csrf_test_name' => 'required'])) {
            return redirect()->back()->with('error', 'Token keamanan tidak valid');
        }
        
        $faq = $this->faqModel->find($id);
        if ($faq) {
            $newStatus = $faq['status'] === 'active' ? 'inactive' : 'active';
            $this->faqModel->update($id, ['status' => $newStatus]);
            ActivityLogModel::log('update', 'chatbot', 'Toggle status FAQ: ' . ($faq['question'] ?? 'ID ' . $id));
            return redirect()->back()->with('success', 'Status berhasil diubah');
        }
        return redirect()->back()->with('error', 'FAQ tidak ditemukan');
    }
}
