<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Uom;

class UomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('uom.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, ['unit' => 'required']);

        preg_match_all('/[a-z]+\^?-?([0-9]{1,10})?/', $request->unit, $output_array);
        $unit = '';
        foreach ($output_array[0] as $output) {
            if(preg_match('/(?P<power>[0-9]{1,10})/', $output, $output_array_1)) {
                $new_value = str_replace($output_array_1['power'], '', $output);
                $new_value = str_replace("^", "<sup>".$output_array_1['power']."</sup>", $new_value);
                $unit .= $new_value;
            }
            else {
                $unit .= $output;
            }
        }


        Uom::create([
            'unit' => $unit,
        ]);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $unit = Uom::findOrFail($id);
       return $unit->unit;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
