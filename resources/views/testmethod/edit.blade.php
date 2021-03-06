@extends('layouts.app')

@section('title')
Add a Sample/Product
@endsection

@section('content')
<div class="row">
    <div class="masonry-sizer col-md-12">
        <div class="masonry-item col-md-12" style="position: absolute; left: 0%; top: 0px;">
            <div class="bgc-white p-20 bd">
                <h6 class="c-grey-900">Add Test method</h6>
                <div class="mT-30">
                    <form action="{{route('testmethod.update',['id'=> $testMethod->id])}}" method="post">
                        {{csrf_field()}}
                        <input type="hidden" name="_method" value="put">
                        <div class="form-group">
                            <label for="value">Sample:</label>
                            <select class="form-control" id="sample_id" name="sample_id">
                                <option value="{{$sample->id}}">
                                    {{$sample->name}}</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="value">Test Item:</label>
                            <select class="form-control" id="test_item_id" name="test_item_id">
                                <option value="{{$testItem->id}}">
                                    {{$testItem->name}}</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="value">Unit of measurement:</label>
                            <select class="form-control" id="uom_id" name="uom_id">
                                @foreach($uoms as $uom)
                                <option value="{{ $uom->id }}"
                                @if($uom->id == $testMethod->uom_id)
                                    selected
                                    @endif
                                    >
                                {!! $uom->unit !!}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="bmd-label-floating">Method name</label>
                            <input type="text" class="form-control" name="name" value="{{$testMethod->name}}">
                        </div>
                        <div class="form-group">
                            <label class="bmd-label-floating">Price</label>
                            <input type="text" class="form-control" name="price" value="{{$testMethod->price}}">
                        </div>
                        <div class="form-group">
                            <label for="specified_range_from">Specified value starting range:</label>
                            <input type="text" class="form-control" name="specified_range_from" id="specified_range_from" value="{{$testMethod->specified_range_from}}">
                        </div>
                        <div class="form-group">
                            <label for="specified_range_to">Specified value ending range:</label>
                            <input type="text" class="form-control" name="specified_range_to" id="specified_range_to" value="{{$testMethod->specified_range_to}}">
                        </div>
                        <button type="submit" class="btn btn-default">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

