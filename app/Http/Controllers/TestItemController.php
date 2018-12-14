<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sample;
use App\TestItem;
use Illuminate\Support\Facades\DB;
use Session;
use Validator;

class TestItemController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Sample::all()->count() == 0) {
            Session::flash('error', 'You need a Sample/Product to add a Test Item');
            return redirect()->route('uom.create');
        }
        return view('testitem.create')->with(['samples' => Sample::all()])->with(['uoms' => Sample::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        
        $rule = [
            'name' => 'required',
            'sample_id' => 'required',
            'price' => 'required|integer',
        ];

        $this->validate($request, $rule);

        $data = $request->all();

        $testItem = TestItem::create($data);

        return redirect()->route('sample.show', ['id' => $data['sample_id']]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $testItem = TestItem::findOrFail($id);

        return view('testitem.edit')->with(['testitem' => $testItem])->with(['samples' => Sample::all()]);
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
        // dd($request);
        $testItem = TestItem::findOrFail($id);
        $rule = [
            'name' => 'string',
            'sample_id' => 'integer',
            'price' => 'integer',
        ];

        $this->validate($request, $rule);

        $testItem->update($request->all());

        return redirect()->route('testitem.show', ['id' => $testItem->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $testItem = TestItem::findOrFail($id);
        // return $testItem;
        $testItem->delete();

        // dd($testItem);
        
        Session::flash('success', 'Test Item deleted successfully!');
    }

    /**
     * gives test items for sample and is_standards
     * @param Request $request
     *
     * @return array
     */
    public function getTestItemsQuery(Request $request)
    {
        $rules = [
            'sample_id' => 'required',
            'isstandard_id' => 'required'
        ];
        $this->validate($request, $rules);

        if ($request->has('sample_id') && $request->has('isstandard_id')) {
            $testItems = DB::table('test_items')->where('sample_id', $request->sample_id)->where('is_standard_id', $request->isstandard_id)->get();
            
            if (empty($testItems)) {
                return response()->json(['data' => '', 'code' => 404]);
            } else {
                return response()->json(['data' => $testItems]);
            }
        } else {
            return response()->json(['data' => '', 'code' => 404]);
        }
    }

    public function testItemShow($id)
    {
        $testItems = DB::table('test_items')->where('isstandard_id', $id);
        if (empty($testItems)) {
            return response()->json(['data' => '', 'code' => 404]);
        } else {
            return response()->json(['data' => $testItems]);
        }
    }
}
