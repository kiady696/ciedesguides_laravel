<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Abri;
use App\Http\Controllers\Controller;

class AbriController extends Controller {

    // public function __construct() {
	// 	$this->authorizeResource(Abri::class, 'abri');
	// }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, ) {

        $abris = Abri::query();

        if(!empty($request->search)) {
			$abris->where('nom_Abris', 'like', '%' . $request->search . '%');
		}

        $abris = $abris->paginate(10);

        return view('abris.index', compact('abris'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {

        return view('abris.create', []);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, ) {

        $request->validate(["code_Abris" => "required|unique:abris,code_Abris", "code_Vallees" => "required"]);

        try {

            $abri = new Abri();
            $abri->code_Abris = $request->code_Abris;
		$abri->nom_Abris = $request->nom_Abris;
		$abri->type_Abris = $request->type_Abris;
		$abri->altitude_Abris = $request->altitude_Abris;
		$abri->places_Abris = $request->places_Abris;
		$abri->prixNuit_Abris = $request->prixNuit_Abris;
		$abri->prixRepas_Abris = $request->prixRepas_Abris;
		$abri->telGardien_Abris = $request->telGardien_Abris;
		$abri->code_Vallees = $request->code_Vallees;
            $abri->save();

            return redirect()->route('abris.index', [])->with('success', __('Abri created successfully.'));
        } catch (\Throwable $e) {
            return redirect()->route('abris.create', [])->withInput($request->input())->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Abri $abri
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Abri $abri,) {

        return view('abris.show', compact('abri'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Abri $abri
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Abri $abri,) {

        return view('abris.edit', compact('abri'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Abri $abri,) {

        $request->validate(["code_Abris" => "required|unique:abris,code_Abris,$abri->id", "code_Vallees" => "required"]);

        try {
            $abri->code_Abris = $request->code_Abris;
		$abri->nom_Abris = $request->nom_Abris;
		$abri->type_Abris = $request->type_Abris;
		$abri->altitude_Abris = $request->altitude_Abris;
		$abri->places_Abris = $request->places_Abris;
		$abri->prixNuit_Abris = $request->prixNuit_Abris;
		$abri->prixRepas_Abris = $request->prixRepas_Abris;
		$abri->telGardien_Abris = $request->telGardien_Abris;
		$abri->code_Vallees = $request->code_Vallees;
            $abri->save();

            return redirect()->route('abris.index', [])->with('success', __('Abri edited successfully.'));
        } catch (\Throwable $e) {
            return redirect()->route('abris.edit', compact('abri'))->withInput($request->input())->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Abri $abri
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Abri $abri,) {

        try {
            $abri->delete();

            return redirect()->route('abris.index', [])->with('success', __('Abri deleted successfully'));
        } catch (\Throwable $e) {
            return redirect()->route('abris.index', [])->with('error', 'Cannot delete Abri: ' . $e->getMessage());
        }
    }

    
}
