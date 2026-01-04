<?php

namespace App\Models;

use CodeIgniter\Model;

class ChatbotFaqModel extends Model
{
    protected $table = 'chatbot_faq';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'category',
        'keywords',
        'question',
        'answer',
        'icon',
        'sort_order',
        'is_featured',
        'status'
    ];
    protected $useTimestamps = true;

    /**
     * Get active FAQs grouped by category
     */
    public function getActiveByCategory()
    {
        $faqs = $this->where('status', 'active')
                     ->orderBy('category', 'ASC')
                     ->orderBy('sort_order', 'ASC')
                     ->findAll();
        
        $grouped = [];
        foreach ($faqs as $faq) {
            $grouped[$faq['category']][] = $faq;
        }
        return $grouped;
    }

    /**
     * Get featured FAQs for quick suggestions
     */
    public function getFeatured($limit = 6)
    {
        return $this->where('status', 'active')
                    ->where('is_featured', 1)
                    ->orderBy('sort_order', 'ASC')
                    ->limit($limit)
                    ->findAll();
    }

    /**
     * Search FAQ by keyword match
     */
    public function findByKeyword($text)
    {
        $text = strtolower(trim($text));
        $faqs = $this->where('status', 'active')->findAll();
        
        foreach ($faqs as $faq) {
            $keywords = array_map('trim', explode(',', strtolower($faq['keywords'])));
            foreach ($keywords as $keyword) {
                if (!empty($keyword) && str_contains($text, $keyword)) {
                    return $faq;
                }
            }
        }
        return null;
    }

    /**
     * Get all categories
     */
    public function getCategories()
    {
        return $this->select('category')
                    ->distinct()
                    ->where('status', 'active')
                    ->findAll();
    }
}
