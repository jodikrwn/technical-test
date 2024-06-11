<!DOCTYPE html>
<html lang="en">

@include('pages.layouts.components.head')

<body>
    @include('pages.layouts.components.sidebar')

    <div class="p-4 sm:ml-64 mt-5">
        <div class="p-4 rounded-lg dark:border-gray-700 shadow-lg">
            @yield('content')
        </div>
    </div>

    @include('pages.layouts.components.scripts')
    @include('pages.layouts.components.alert')
</body>

</html>
