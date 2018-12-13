<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sample;
use App\TestItem;

class SampleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('sample.index')->with(['samples' => Sample::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sample.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|string',
        ];
        
        $this->validate($request, $rules);

        Sample::create([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return redirect()->route('sample.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sample = Sample::findOrFail($id);

        $testItems = $sample->testItems;

        

        // $testItems = $sample->testItems;

        // $testItems = $isstandards->testItems;
        // dd($testItems);
                        

        return view('sample.show')->with(['sample' => $sample, 'testItems' => $testItems]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Sample $sample)
    {
        return view('sample.edit',compact('sample'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sample $sample)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);
  
        $sample->update($request->all());
  
        return redirect()->route('sample.show', ['id' => $sample->id]);
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
}
