<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Machine;

class MachinesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('wmachines.index')->with('machines', Machine::paginate(5));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('wmachines.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Machine::create($this->validateRequest());

        return redirect()->route('wmachines.index')->with('machines', Machine::paginate(5));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('wmachines.show')->with('machine', Machine::findorfail($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('wmachines.edit')->with('machine', Machine::findorfail($id));
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
        $machine = Machine::findorfail($id);
        $machine->update($this->validateRequest());
        if ($machine) {
            return redirect()->route('wmachines.index')->with(['machines' => Machine::paginate(5), 'sucess' => 'Washing machine data updated ']);
        }

        return redirect()->route('wmachines.index')->with(['machines' => Machine::paginate(5), 'warning' => 'Washing machine data not updated ']);
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
            'machine_name' => ['required', 'string', 'max:255'],
            'model' => ['required', 'string'],
            'manufacturer' => ['required', 'string'],
            'price' => ['required'],
            'date_bought' => ['required', 'date'],
            
        ]);
    }
}
