<?php

class PermissionController extends AdminController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$roles = Common::getRoles();
		return View::make('permission.list')->with(compact('roles'));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		DB::table('role_permission')->truncate();
		foreach ($input['permission'] as $permission => $roles) {
			foreach ($roles as $roleSlug => $value) {
				RolePermission::create(['role_slug' => $roleSlug, 'permission' => $permission]);
			}
		}
		return Redirect::back()->withMessage('Lưu thành công');
		// dd($input);
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($slug)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function editRole($role)
	{
		$role = Role::findBySlug($role);
		$data = RolePermission::where('role_slug', $role->slug)->get();
		return View::make('permission.detail')->with(compact('data', 'role'));
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function updateRole($role)
	{
		$input = Input::all();
		RolePermission::where('role_slug', $role)->delete();
		foreach ($input['permission'] as $permission => $roles) {
			foreach ($roles as $roleSlug => $value) {
				RolePermission::create(['role_slug' => $roleSlug, 'permission' => $permission]);
			}
		}
		return Redirect::back()->withMessage('Lưu thành công');
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
