@extends('layouts.app')

@section('title')
{{$sample->name}}
@endsection

@section('content')

<div class="bgc-light-green-500 c-white p-20">
    <div class="peers ai-c jc-sb gap-40">
        <div class="peer peer-greed">
            <h1>{{$sample->name}}</h1>
        </div>
    </div>
</div>
<div class="bdT pX-40 pY-30">
    <p>{{$sample->description}}</p>
</div>
<br>
<a href="{{route('sample.edit', ['sample' => $sample->id])}}" class="btn cur-p btn-primary">Edit Sample/Product</a>
<br>
<br>

@foreach($testItems as $testItem)
<div class="row">
    <div class="col-md-12">
        <div class="bgc-white bd bdrs-3 p-20 mB-20">
            <h4 class="c-grey-900 mB-20">Test Item : {{$testItem->name}}</h4>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th style="min-width: 150px">Test Method</th>
                        <th style="min-width: 200px">Specified value range</th>
                        <th>Description</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($testItem->testMethods as $testMethod)
                    <tr>
                        <td>{{$testMethod->name}}</td>
                        <td>{{$testMethod->specified_range_from}} {{$testMethod->uom->unit}} -
                            {{$testMethod->specified_range_to}}
                            {{$testMethod->uom->unit}}</td>
                        <td>{{$testMethod->description}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="col-sm-2">
                <form action="{{ route('testitem.destroy', $testItem->id) }} " method="POST">
                        <input type="submit" value="Delete Test Item" class="btn btn-danger btn-block" onclick="return confirm('Are you sure to delete?')">
                        <input type="hidden" value="{{ csrf_token() }}" name="_token">
                        {{ method_field('DELETE') }}
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach
<br>

@endsection

@push('scripts')

<script>
    // $(document).ready(function){
    //     $(#isstandard_id).on('click',function(){
    //         var value = $(this).val();

    //         $.get("http://127.0.0.1:8000/api/test_items_show/" + value, function (data){
    //             var content = '';
    //             $.each(data.data, function (index, value) {

    //             });
    //         });
    //     });
    // }

</script>

@endpush
