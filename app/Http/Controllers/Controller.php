<?php

namespace App\Http\Controllers;

use App\Http\Traits\GlobalTrait;

abstract class Controller extends \Illuminate\Routing\Controller
{
    use GlobalTrait;
    
    public function __construct($permissionGroup = '', $isApi=0)
    {
        if($permissionGroup != ''){
            $listPermissions = ($isApi) ? ['index', 'search'] : ['index'];
            $this->middleware("permission:$permissionGroup list")->only($listPermissions);
            $this->middleware("permission:$permissionGroup create")->only(['create', 'store']);
            $this->middleware("permission:$permissionGroup view")->only('view');
            $this->middleware("permission:$permissionGroup edit")->only(['edit', 'update']);
            $this->middleware("permission:$permissionGroup delete")->only('destroy');
        }
    }
}
