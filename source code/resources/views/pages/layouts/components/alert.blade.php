@if (session()->has('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Success!',
            text: "{{ session('success') }}",
            confirmButtonColor: "#153A88"
        })
    </script>
@endif

@if (session()->has('error'))
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Oops!',
            text: "{{ session('error') }}",
            confirmButtonColor: "#153A88"
        })
    </script>
@endif
