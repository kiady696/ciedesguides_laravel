<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Guide;

class GuideController extends Controller {

    // public function __construct() {
	// 	$this->authorizeResource(Guide::class, 'guide');
	// }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, ) {

        $guides = Guide::query();

        if(!empty($request->search)) {
			$guides->where('nom_Guides', 'like', '%' . $request->search . '%');
		}

        $guides = $guides->paginate(10);

        return view('guides.index', compact('guides'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {

        return view('guides.create', []);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, ) {

        $request->validate(["code_Guides" => "required|unique:guides,code_Guides"]);

        try {

            $guide = new Guide();
            $guide->code_Guides = $request->code_Guides;
		$guide->nom_Guides = $request->nom_Guides;
		$guide->prenom_Guides = $request->prenom_Guides;
		$guide->email_Guides = $request->email_Guides;
		$guide->motdepasse_Guides = $request->motdepasse_Guides;
            $guide->save();

            return redirect()->route('guides.index', [])->with('success', __('Guide created successfully.'));
        } catch (\Throwable $e) {
            return redirect()->route('guides.create', [])->withInput($request->input())->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Guide $guide
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Guide $guide,) {

        return view('guides.show', compact('guide'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Guide $guide
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Guide $guide,) {

        return view('guides.edit', compact('guide'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Guide $guide,) {

        $request->validate(["code_Guides" => "required|unique:guides,code_Guides,$guide->id"]);

        try {
            $guide->code_Guides = $request->code_Guides;
		$guide->nom_Guides = $request->nom_Guides;
		$guide->prenom_Guides = $request->prenom_Guides;
		$guide->email_Guides = $request->email_Guides;
		$guide->motdepasse_Guides = $request->motdepasse_Guides;
            $guide->save();

            return redirect()->route('guides.index', [])->with('success', __('Guide edited successfully.'));
        } catch (\Throwable $e) {
            return redirect()->route('guides.edit', compact('guide'))->withInput($request->input())->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Guide $guide
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Guide $guide,) {

        try {
            $guide->delete();

            return redirect()->route('guides.index', [])->with('success', __('Guide deleted successfully'));
        } catch (\Throwable $e) {
            return redirect()->route('guides.index', [])->with('error', 'Cannot delete Guide: ' . $e->getMessage());
        }
    }

    
}
