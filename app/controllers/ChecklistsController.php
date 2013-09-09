<?php

class ChecklistsController extends BaseController {

	/**
	 * Checklist Repository
	 *
	 * @var Checklist
	 */
	protected $checklist;

	public function __construct(Checklist $checklist)
	{
		$this->checklist = $checklist;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$checklists = $this->checklist->all();

		return View::make('checklists.index', compact('checklists'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('checklists.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, Checklist::$rules);

		if ($validation->passes())
		{
			$this->checklist->create($input);

			return Redirect::route('checklists.index');
		}

		return Redirect::route('checklists.create')
			->withInput()
			->withErrors($validation)
			->with('message', 'There were validation errors.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$checklist = $this->checklist->findOrFail($id);

		//Get entries for this checklist
		$entries = Entry::where('checklistID', '=', $id)->orderBy('order', 'asc')->get();

		return View::make('checklists.show', compact('checklist'))
		    ->nest('entriesView','entries.view', array('entries' => $entries, 'checklistID' => $id));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$checklist = $this->checklist->find($id);

		if (is_null($checklist))
		{
			return Redirect::route('checklists.index');
		}

		//Get entries for this checklist
		$entries = Entry::where('checklistID', '=', $id)->orderBy('order', 'asc')->get();

		return View::make('checklists.edit', compact('checklist'))
		    ->nest('entriesView','entries.index', array('entries' => $entries, 'checklistID' => $id));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$input = array_except(Input::all(), '_method');
		$validation = Validator::make($input, Checklist::$rules);

		if ($validation->passes())
		{
			$checklist = $this->checklist->find($id);
			$checklist->update($input);

			return Redirect::route('checklists.show', $id);
		}

		return Redirect::route('checklists.edit', $id)
			->withInput()
			->withErrors($validation)
			->with('message', 'There were validation errors.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->checklist->find($id)->delete();

		return Redirect::route('checklists.index');
	}

}
