<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cloth;

class ClothsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('cloths.index')->with('cloths', Cloth::paginate(5));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cloths.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Cloth::create($this->validateRequest());
        return redirect()->route('cloths.index')->with(['cloths'=>Cloth::paginate(5), 'success'=>'You have added a new cloth']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $cloth = Cloth::findorfail($id); come back later

        return view('cloths.show')->with('cloth', Cloth::findorfail($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('cloths.edit')->with('cloth', Cloth::find($id));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $cloth = Cloth::find($id);
        $cloth->update($this->validateRequest());
        if ($cloth) {
            return redirect()->route('cloths.index')->with(['cloths'=>Cloth::paginate(5), 'success'=>'Cloth data updated.']);
        }

        return redirect()->route('cloths.index')->with(['cloths'=>Cloth::paginate(5), 'warning'=>'Cloth data was not updated.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    private function validateRequest()
    {
        return request()->validate([
            'user_id' => ['required', 'numeric'],
            'cloth_name' => ['required', 'string', 'max:255'],
            'wash_price' => ['required'],
            'category' => ['required', 'string'],
            
        ]);
    }

}
