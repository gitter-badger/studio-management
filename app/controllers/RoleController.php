<?php

class RoleController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /role
	 *
	 * @return Response
	 */
	public function index()
	{
		$roles = Role::all();
		return View::make('roles.index')
					->with('roles',$roles)
					->with('title',"Roles");
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /role/create
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('roles.create')
					->with('title',"Create Role");
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /role
	 *
	 * @return Response
	 */
	public function store()
	{
		$rules = [
					'name' => 'required|unique:roles'
		];

		$data = Input::all();

		$validator = Validator::make($data,$rules);
		if($validator->fails()){
			return Redirect::back()->withInput()->withErrors($validator);
		}

		$role = new Role();

		$role->name = $data['name'];
		if($role->save()){

			return Redirect::route('role.index')->with('success','Role Created Successfully.');
		}else{
			return Redirect::route('role.index')->with('error','Something went wrong.Try Again.');
		}
	}

	/**
	 * Display the specified resource.
	 * GET /role/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /role/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		try{
			$role = Role::findOrFail($id);
			return View::make('roles.edit')
						->with('role',$role)
						->with('title','Edit Role');
		}catch(Exception $ex){
			return Redirect::route('role.index')->with('error','Something went wrong.Try Again.');
		}
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /role/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{

		$data = Input::all();

		$validator = Validator::make($data,Role::rules($id));

		if($validator->fails()){
			return Redirect::back()->withInput()->withErrors($validator);
		}

		$role = Role::find($id);

		$role->name = $data['name'];
		if($role->save()){

			return Redirect::route('role.index')->with('success','Role Updated Successfully.');
		}else{
			return Redirect::route('role.index')->with('error','Something went wrong.Try Again.');
		}
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /role/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

	public function assign(){
		$roles = Role::all();
		$users = User::with('roles')->get();
		return View::make('roles.assign')
					->with('roles',$roles)
					->with('users',$users)
					->with('title',"Assign Roles");
	}

	public function add($user_id){
		try{
			$user = User::findOrFail($user_id);
			$roles = Role::all()->lists('name','id');
			$users = User::find($user_id)->roles()->lists('name');
			$results = array_intersect($roles, $users);
		}catch (Exception $ex){
			return Redirect::back()->with('error','No user found.Try Again.');
		}


		return View::make('roles.add')
					->with('roles',$roles)
					->with('results',$results)
					->with('user',$user)
					->with('title',"Assign Roles");



	}

	public function doAdd($user_id){

		try{
			$user = User::findOrFail($user_id);
			 $data = Input::all();
			if(count($data)>1){

				$roles = Role::all()->lists('id','name');
				$add_roles = array_intersect($roles, $data);

				foreach($roles as $role_id){
					$role = Role::find($role_id);
					$user->detachRole($role);
				}

				foreach($add_roles as $role_id){
					$role = Role::find($role_id);
					$user->attachRole($role);
				}


				return Redirect::route('role.assign')->with('success','Role Assigned successfully.');
			}else{
				return Redirect::back()->with('error','You Must Select At least One Role.');
			}
		}catch (Exception $ex){
			return Redirect::back()->with('error','No user found.Try Again.');
		}

	}

}