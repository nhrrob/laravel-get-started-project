<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware("permission:dashboard view")->only('index');
    }
    
    public function index()
    {
        $data['users'] = User::latest()->get();
        return view('admin.dashboard.index', $data);
    }
}