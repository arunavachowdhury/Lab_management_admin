@extends('layouts.app')

@section('title')

Dashboard

@endsection

@section('content')

<!-- Normal user -->
<div class="row gap-20 masonry pos-r">
    <div class="masonry-sizer col-md-6"></div>

    <div class="masonry-item col-md-6" style="position: absolute; left: 0%; top: 1026px;">
        <div class="bd bgc-white">
            <div class="layers">
                <div class="layer w-100">
                    <div class="bgc-light-green-500 c-white p-20">
                        <div class="peers ai-c jc-sb gap-40">
                            <div class="peer peer-greed">
                                <h5>All Samples</h5>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive p-20">
                        <table class="table">
                            <tbody>
                                <tr>
                                    @if(count($samples) === 0)
                                    <p>Samples list is empty</p>
                                    @else
                                    @foreach($samples as $sample)
                                <tr>
                                    <td class="bdwT-0">
                                        <a style="color: #666" href="{{route('sample.show', ['id' => $sample->id])}}">
                                            {{$sample->name}} ||
                                            {{$sample->id}} ||
                                            {{Carbon\Carbon::parse($sample->created_at)->format('Y-m-d')}} </a>
                                    </td>
                                </tr>
                                @endforeach
                                @endif
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="ta-c bdT w-100 p-20"><a href="{{route('sample.index')}}">Check all Sample</a></div>
        </div>
    </div>
</div>



@endsection
