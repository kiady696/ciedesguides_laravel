<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Vallee;
use App\Models\Abri;

class ValleeAbriController extends Controller {

    // public function __construct() {
	// 	$this->authorizeResource(Abri::class, 'abri');
	// }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Vallee $vallee,) {
        // $this->authorize('view', [Vallee::class, $vallee]);

        $abris = $vallee->abris();

        if(!empty($request->search)) {
			$abris->where('nom_Abris', 'like', '%' . $request->search . '%');
		}

        $abris = $abris->paginate(10);

        return view('vallees.abris.index', compact('vallee', 'abris'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Vallee $vallee,) {
        // $this->authorize('view', [Vallee::class, $vallee]);

        return view('vallees.abris.create', compact('vallee'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Vallee $vallee,) {
        // $this->authorize('view', [Vallee::class, $vallee]);

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

            return redirect()->route('vallees.abris.index', compact('vallee'))->with('success', __('Abri created successfully.'));
        } catch (\Throwable $e) {
            return redirect()->route('vallees.abris.create', compact('vallee'))->withInput($request->input())->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Abri $abri
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Vallee $vallee, Abri $abri,) {
        // $this->authorize('view', [Vallee::class, $vallee]);

        return view('vallees.abris.show', compact('vallee', 'abri'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Abri $abri
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Vallee $vallee, Abri $abri,) {
        // $this->authorize('view', [Vallee::class, $vallee]);

        return view('vallees.abris.edit', compact('vallee', 'abri'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vallee $vallee, Abri $abri,) {
        // $this->authorize('view', [Vallee::class, $vallee]);

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

            return redirect()->route('vallees.abris.index', compact('vallee'))->with('success', __('Abri edited successfully.'));
        } catch (\Throwable $e) {
            return redirect()->route('vallees.abris.edit', compact('vallee', 'abri'))->withInput($request->input())->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Abri $abri
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vallee $vallee, Abri $abri,) {
        // $this->authorize('view', [Vallee::class, $vallee]);

        try {
            $abri->delete();

            return redirect()->route('vallees.abris.index', compact('vallee'))->with('success', __('Abri deleted successfully'));
        } catch (\Throwable $e) {
            return redirect()->route('vallees.abris.index', compact('vallee'))->with('error', 'Cannot delete Abri: ' . $e->getMessage());
        }
    }

    
}
