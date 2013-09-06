<?php

class EntriesController extends BaseController {

	/**
	 * Entry Repository
	 *
	 * @var Entry
	 */
	protected $entry;

	public function __construct(Entry $entry)
	{
		$this->entry = $entry;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$entries = $this->entry->all();

		return View::make('entries.index', compact('entries'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('entries.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, Entry::$rules);

		if ($validation->passes())
		{
			$this->entry->create($input);

			return Redirect::route('entries.index');
		}

		return Redirect::route('entries.create')
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
		$entry = $this->entry->findOrFail($id);

		return View::make('entries.show', compact('entry'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$entry = $this->entry->find($id);

		if (is_null($entry))
		{
			return Redirect::route('entries.index');
		}

		return View::make('entries.edit', compact('entry'));
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
		$validation = Validator::make($input, Entry::$rules);

		if ($validation->passes())
		{
			$entry = $this->entry->find($id);
			$entry->update($input);

			return Redirect::route('entries.show', $id);
		}

		return Redirect::route('entries.edit', $id)
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
		$this->entry->find($id)->delete();

		return Redirect::route('entries.index');
	}

}
