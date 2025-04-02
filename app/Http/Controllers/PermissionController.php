<?php

namespace App\Http\Controllers;

use App\Http\Requests\AssignPermissionToRoleRequest;
use App\Http\Requests\StorePermissionRequest;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Permission::class, 'permission');
    }

    public function index(){
        return $this->response(Permission::all());
    }
    public function store(StorePermissionRequest $request){
        if (Permission::query()->where('name',$request->name)->exists()) {
            return $this->error('Permission already exists');
        }
        $permission = Permission::create(['name'=> $request->name, 'guard_name' => 'web']);
        return $this->success('Permission created', $permission);
    }
    public function show(){

    }
    public function update(){

    }
    public function destroy(){

    }

    public function assign(AssignPermissionToRoleRequest $request)
    {
        $permission = Permission::findOrFail( $request->permission_id );
        $role = Role::findOrFail( $request->role_id);
        if ($role->hasPermissionTo($permission->name)) {
            return $this->error( 'Permission already assigned' );
        }
        $role->givePermissionTo( $permission->name );
        return $this->success( 'Permission assigned to role' );
    }

}
