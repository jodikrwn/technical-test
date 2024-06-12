<!DOCTYPE html>
<html lang="en">

@include('pages.layouts.components.head')

<body>
    @yield('content')

    @include('pages.layouts.components.scripts')
    @include('pages.layouts.components.alert')
</body>

</html>
