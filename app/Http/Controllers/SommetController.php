<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Sommet;

class SommetController extends Controller {

    // public function __construct() {
	// 	$this->authorizeResource(Sommet::class, 'sommet');
	// }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, ) {

        $sommets = Sommet::query();

        if(!empty($request->search)) {
			$sommets->where('nom_Sommets', 'like', '%' . $request->search . '%');
		}

        $sommets = $sommets->paginate(10);

        return view('sommets.index', compact('sommets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {

        return view('sommets.create', []);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, ) {

        $request->validate(["code_Sommets" => "required|unique:sommets,code_Sommets"]);

        try {

            $sommet = new Sommet();
            $sommet->code_Sommets = $request->code_Sommets;
		$sommet->nom_Sommets = $request->nom_Sommets;
		$sommet->altitude_Sommets = $request->altitude_Sommets;
            $sommet->save();

            return redirect()->route('sommets.index', [])->with('success', __('Sommet created successfully.'));
        } catch (\Throwable $e) {
            return redirect()->route('sommets.create', [])->withInput($request->input())->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Sommet $sommet
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Sommet $sommet,) {

        return view('sommets.show', compact('sommet'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Sommet $sommet
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Sommet $sommet,) {

        return view('sommets.edit', compact('sommet'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sommet $sommet,) {

        $request->validate(["code_Sommets" => "required|unique:sommets,code_Sommets,$sommet->id"]);

        try {
            $sommet->code_Sommets = $request->code_Sommets;
		$sommet->nom_Sommets = $request->nom_Sommets;
		$sommet->altitude_Sommets = $request->altitude_Sommets;
            $sommet->save();

            return redirect()->route('sommets.index', [])->with('success', __('Sommet edited successfully.'));
        } catch (\Throwable $e) {
            return redirect()->route('sommets.edit', compact('sommet'))->withInput($request->input())->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Sommet $sommet
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sommet $sommet,) {

        try {
            $sommet->delete();

            return redirect()->route('sommets.index', [])->with('success', __('Sommet deleted successfully'));
        } catch (\Throwable $e) {
            return redirect()->route('sommets.index', [])->with('error', 'Cannot delete Sommet: ' . $e->getMessage());
        }
    }

    
}
