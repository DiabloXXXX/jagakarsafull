<?php

namespace App\Controllers;

use App\Models\ChatbotFaqModel;
use CodeIgniter\HTTP\ResponseInterface;

/**
 * @property ResponseInterface $response
 */
class Chatbot extends BaseController
{
    protected $faqModel;

    public function __construct()
    {
        $this->faqModel = new ChatbotFaqModel();
    }

    public function handle()
    {
        // Get JSON from request
        $data = json_decode($this->request->getBody(), true);
        $message = $data['message'] ?? '';
        
        if (empty($message)) {
            return $this->response->setJSON([
                'messages' => [['text' => 'Silakan ketik pertanyaan Anda.']]
            ]);
        }

        $text = strtolower(trim($message));
        
        // Search FAQ from database
        $faq = $this->faqModel->findByKeyword($text);
        
        if ($faq) {
            $response = $faq['icon'] . ' ' . $faq['answer'];
        } else {
            // Default response with suggestions
            $response = $this->getDefaultResponse();
        }

        return $this->response->setJSON([
            'messages' => [['text' => $response]]
        ]);
    }

    /**
     * Get featured FAQs for suggestions (API endpoint)
     */
    public function suggestions()
    {
        $featured = $this->faqModel->getFeatured(6);
        $suggestions = [];
        
        foreach ($featured as $faq) {
            $suggestions[] = [
                'icon' => $faq['icon'],
                'text' => $faq['question']
            ];
        }

        return $this->response->setJSON(['suggestions' => $suggestions]);
    }

    /**
     * Get default response when no FAQ matches
     */
    private function getDefaultResponse()
    {
        // Get all categories for suggestions
        $categories = $this->faqModel->getCategories();
        $categoryList = array_column($categories, 'category');
        
        $response = "Saya belum memiliki informasi tentang itu. 🤔<br><br>";
        $response .= "<strong>Coba tanyakan tentang:</strong><br>";
        
        if (!empty($categoryList)) {
            foreach (array_slice($categoryList, 0, 5) as $cat) {
                $response .= "• " . $cat . "<br>";
            }
        } else {
            $response .= "• Jam operasional<br>";
            $response .= "• Alamat kelurahan<br>";
            $response .= "• Layanan yang tersedia<br>";
            $response .= "• Cara membuat KTP<br>";
            $response .= "• Persyaratan dokumen<br>";
        }
        
        $response .= "<br>Atau hubungi kami di <strong>021-7270954</strong>";
        
        return $response;
    }
}
