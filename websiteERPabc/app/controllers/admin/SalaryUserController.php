<?php

class SalaryUserController extends AdminController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$data = SalaryUser::orderBy('id', 'desc')->paginate(PAGINATE);
		return View::make('admin.salary.index')->with(compact('data'));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('admin.salary.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::except('_token');
		$rules = array(
			'salary' => 'required|integer|min:100000',
		);
		$validator = Validator::make($input, $rules);
		if($validator->fails()) {
			return Redirect::action('SalaryUserController@create')
				->withInput($input)
	            ->withErrors($validator);
        } else {
        	$input['status'] = ACTIVE;
        	$salaryId = SalaryUser::create(['salary' => $input['salary']])->id;
        	User::find($input['user_id'])->update(['salary_id' => $salaryId]);
			return Redirect::action('SalaryUserController@index');	
        }
	}


	/**
	 * Display the specified resource.
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
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$salary = SalaryUser::find($id);
		return View::make('admin.salary.edit')->with(compact('salary'));
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$input = Input::except('_token');
		$rules = array(
			'salary' => 'required|integer|min:100000',
		);
		$salary_id = SalaryUser::find($id);
		$validator = Validator::make($input, $rules);
		if($validator->fails()) {
			return Redirect::action('SalaryUserController@create')
				->withInput($input)
	            ->withErrors($validator);
        } else {

        	$salary_id->update(['salary' => $input['salary']]);
			return Redirect::action('SalaryUserController@index');	
        }
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		CommonNormal::delete($id);
		return Redirect::action('SalaryUserController@index') ;
	}

	public function searchabc()
		{
			$input = Input::all();
			$salarydata = SalaryUser::all();
			if ($input['salary'] ) {
				$data = $salarydata::where('salary', 'LIKE', '%' . $input['salary'] . '%');
			}
			if($input['username']){$
				$listIdUser = User::where('username', 'LIKE', '%'. $input['username'] . '%')->lists('salary_id');
				$data = $salarydata::whereIn('id', $listIdUser);
			}
				$data = $salarydata->paginate(PAGINATE);
			return View::make('admin.salary.index')->with(compact('data'));
		}
}