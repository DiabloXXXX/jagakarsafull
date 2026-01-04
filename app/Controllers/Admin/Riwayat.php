<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ActivityLogModel;

class Riwayat extends BaseController
{
    protected $activityModel;

    public function __construct()
    {
        $this->activityModel = new ActivityLogModel();
    }

    public function index()
    {
        $perPage = 20;
        
        // Get filter parameters
        $module = $this->request->getGet('module');
        $action = $this->request->getGet('action');
        $search = $this->request->getGet('search');
        
        // Get unique modules and actions for filter dropdowns FIRST (before filtering)
        $modulesModel = new ActivityLogModel();
        $actionsModel = new ActivityLogModel();
        $modulesData = $modulesModel->select('module')->distinct()->findAll();
        $actionsData = $actionsModel->select('action')->distinct()->findAll();
        
        // Build filtered query
        $builder = $this->activityModel;
        
        if (!empty($module)) {
            $builder = $builder->where('module', $module);
        }
        
        if (!empty($action)) {
            $builder = $builder->where('action', $action);
        }
        
        if (!empty($search)) {
            $builder = $builder->like('description', $search);
        }
        
        $activities = $builder->orderBy('created_at', 'DESC')->paginate($perPage);
        $pager = $this->activityModel->pager;
        
        return view('admin/riwayat', [
            'activities' => $activities,
            'pager' => $pager,
            'modules' => array_column($modulesData, 'module'),
            'actions' => array_column($actionsData, 'action'),
            'currentModule' => $module,
            'currentAction' => $action,
            'search' => $search
        ]);
    }
}
