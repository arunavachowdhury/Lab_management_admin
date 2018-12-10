<div class="sidebar" style="box-shadow: 0px 0px 8px grey">
    <div class="sidebar-inner">
        <div class="sidebar-logo">
            <div class="peers ai-c fxw-nw">
                <div class="peer peer-greed"><a class="sidebar-link td-n" href="{{route('dashboard')}}" class="td-n">
                        <div class="peers ai-c fxw-nw">
                            <div class="peer">
                                <div class="logo"><img src="{{asset('assets/static/images/logo.png')}}" alt=""></div>
                            </div>
                            <div class="peer peer-greed">
                                <h5 class="lh-1 mB-0 logo-text">Cloudhead Technologies</h5>
                            </div>
                        </div>
                    </a></div>
                <div class="peer">
                    <div class="mobile-toggle sidebar-toggle"><a href="#" class="td-n"><i class="ti-arrow-circle-left"></i></a></div>
                </div>
            </div>
        </div>
        <ul class="sidebar-menu scrollable pos-r">
            @if(Auth::user()->usertype == 'admin')
            <!-- Sample -->
            <li class="nav-item dropdown">
                <a class="dropdown-toggle" href="javascript:void(0);">
                    <span class="icon-holder"><i class="c-blue-500 ti-files"></i></span>
                    <span class="title">Sample/Product</span>
                    <span class="arrow"><i class="ti-angle-right"></i></span>
                </a>
                <ul class="dropdown-menu">
                    <li><a href="{{route('sample.index')}}">Product / Material of Test</a></li>
                    <li><a href="{{route('sample.create')}}">+ Add Product / Material of Test</a></li>
                    <li><a href="{{route('isstandard.create')}}">+ Add IS Standard to Product / Material of Test</a></li>
                    <li><a href="{{route('uom.create')}}">+ Add Unit Of Measurement for Tests</a></li>
                </ul>
            </li>
            <!-- Lab -->
            <li class="nav-item dropdown">
                <a class="dropdown-toggle" href="javascript:void(0);">
                    <span class="icon-holder"><i class="c-blue-500 ti-files"></i></span>
                    <span class="title">Lab</span>
                    <span class="arrow"><i class="ti-angle-right"></i></span>
                </a>
                <ul class="dropdown-menu">
                    <li><a href="{{route('lab.index')}}"> Labs</a></li>
                    <li><a href="{{route('lab.create')}}"> +Add Lab </a></li>
                </ul>
            </li>
            <!-- Test Item -->
            <li class="nav-item">
                <a class='sidebar-link' href="{{route('testitem.create')}}">
                    <span class="icon-holder">
                        <i class="c-deep-purple-500 ti-pencil"></i>
                    </span>
                    <span class="title">+ Add Specific Test</span>
                </a>
            </li>
            @endif
        </ul>
    </div>
</div>
