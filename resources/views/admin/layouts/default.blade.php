<!DOCTYPE html>
<html>
<head>
    @include('admin.partials.head')
    @yield('css')
</head>
<body>
    <div id="wrapper">
        @include('admin.partials.left-side-bar')
        <div id="page-wrapper" class="gray-bg">
            <div class="row border-bottom">
                @include('admin.partials.top-bar')
            </div>
            @yield('content')
        </div>
       
        @include('admin.partials.scripts')
        @yield('script')
    </div>
</body>
</html>
