@extends('layouts.app')

@section('title')
Edit Test Item
@endsection

@section('content')

<div class="row">
    <div class="masonry-sizer col-md-12">
        <div class="masonry-item col-md-12" style="position: absolute; left: 0%; top: 0px;">
            <div class="bgc-white p-20 bd">
                <h6 class="c-grey-900">Add IS Standard to Sample/Product</h6>
                <div class="mT-30">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <form action="{{route('testitem.update', ['id' => $testitem->id])}}" method="post">
                        {{csrf_field()}}
                        <div class="row">
                            <input type="hidden" name="_method" value="put">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="value">Sample:</label>
                                    <select class="form-control" id="sample_id" name="sample_id">
                                        @foreach($samples as $sample)
                                            <option value="{{$sample->id}}" 
                                                @if($sample->id == $testitem->sample_id)
                                                    selected 
                                                @endif 
                                            >
                                            {{$sample->name}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <div class="form-group">
                                    <label for="name">Test Item name:</label>
                                    <input type="text" class="form-control" name="name" id="name" value="{{$testitem->name}}">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="price">Price:</label>
                                    <input type="text" class="form-control" name="price" id="price" placeholder="Inr" value="{{$testitem->price}}">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="description">Description:</label>
                                    <textarea name="description" id="description" rows="2" class="form-control">
                                        {{$testitem->description}}
                                    </textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="container-fluid">
                                <button type="submit" class="btn btn-default">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection


