<!DOCTYPE html>
<html lang="en">

@include('pages.layouts.components.head')

<body>
    @include('pages.layouts.components.sidebar')

    @yield('content')

    @include('pages.layouts.components.scripts')
    @include('pages.layouts.components.alert')
</body>

</html>
