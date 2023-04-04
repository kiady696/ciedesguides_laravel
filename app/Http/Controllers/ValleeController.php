<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Vallee;

class ValleeController extends Controller {

    // public function __construct() {
	// 	$this->authorizeResource(Vallee::class, 'vallee');
	// }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, ) {

        $vallees = Vallee::query();

        if(!empty($request->search)) {
			$vallees->where('nom_Vallees', 'like', '%' . $request->search . '%');
		}

        $vallees = $vallees->paginate(10);

        return view('vallees.index', compact('vallees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {

        return view('vallees.create', []);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, ) {

        $request->validate(["code_Vallees" => "required|unique:vallees,code_Vallees"]);

        try {

            $vallee = new Vallee();
            $vallee->code_Vallees = $request->code_Vallees;
		$vallee->nom_Vallees = $request->nom_Vallees;
            $vallee->save();

            return redirect()->route('vallees.index', [])->with('success', __('Vallee created successfully.'));
        } catch (\Throwable $e) {
            return redirect()->route('vallees.create', [])->withInput($request->input())->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Vallee $vallee
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Vallee $vallee,) {

        return view('vallees.show', compact('vallee'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Vallee $vallee
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Vallee $vallee,) {

        return view('vallees.edit', compact('vallee'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vallee $vallee,) {

        $request->validate(["code_Vallees" => "required:vallees,code_Vallees"]);

        try {
            $vallee->code_Vallees = $request->code_Vallees;
		$vallee->nom_Vallees = $request->nom_Vallees;
            $vallee->save();

            return redirect()->route('vallees.index', [])->with('success', __('Vallee edited successfully.'));
        } catch (\Throwable $e) {
            return redirect()->route('vallees.edit', compact('vallee'))->withInput($request->input())->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Vallee $vallee
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vallee $vallee,) {

        try {
            $vallee->delete();

            return redirect()->route('vallees.index', [])->with('success', __('Vallee deleted successfully'));
        } catch (\Throwable $e) {
            return redirect()->route('vallees.index', [])->with('error', 'Cannot delete Vallee: ' . $e->getMessage());
        }
    }

    
}
