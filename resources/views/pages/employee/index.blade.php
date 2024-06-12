@extends('pages.layouts.main')

@section('title')
    Employee Page
@endsection

@section('content')
    <div class="relative overflow-x-auto sm:rounded-lg">
        <div
            class="flex gap-3 items-center justify-between flex-column flex-wrap md:flex-row space-y-4 md:space-y-0 pb-4 bg-white dark:bg-gray-900">
            <form
                class="w-full md:w-[350px]"
                onsubmit="search(event, this);"
                data-url="{{ route('employee.search') }}"
            >
                @csrf
                <label
                    for="default-search"
                    class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white"
                >Search</label>
                <div class="relative">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                        <svg
                            class="w-4 h-4 text-gray-500 dark:text-gray-400"
                            aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 20 20"
                        >
                            <path
                                stroke="currentColor"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"
                            />
                        </svg>
                    </div>
                    <input
                        type="search"
                        id="default-search"
                        class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Search employee..."
                        name="keyword"
                    />
                    <button
                        type="submit"
                        class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                    >Search</button>
                </div>
            </form>
            <div class="flex gap-3">
                <!-- Create Modal -->
                <button
                    data-modal-target="create-modal"
                    data-modal-toggle="create-modal"
                    class="py-2.5 px-5 me-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700"
                    type="button"
                >
                    Add Employee
                </button>
                <div
                    id="create-modal"
                    tabindex="-1"
                    aria-hidden="true"
                    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full"
                >
                    <div class="relative p-4 w-full max-w-2xl max-h-full">
                        <!-- Modal content -->
                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                            <!-- Modal header -->
                            <div
                                class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                    Add New Employee
                                </h3>
                                <button
                                    type="button"
                                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                    data-modal-toggle="create-modal"
                                >
                                    <svg
                                        class="w-3 h-3"
                                        aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg"
                                        fill="none"
                                        viewBox="0 0 14 14"
                                    >
                                        <path
                                            stroke="currentColor"
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"
                                        />
                                    </svg>
                                    <span class="sr-only">Close modal</span>
                                </button>
                            </div>
                            <!-- Modal body -->
                            <form
                                id="createForm"
                                class="p-4 md:p-5"
                                onsubmit="onSubmit(event, this);"
                                data-url="{{ route('employee.store') }}"
                            >
                                @csrf
                                <div class="grid gap-4 mb-4 grid-cols-2">
                                    <div class="col-span-1">
                                        <label
                                            for="name"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                        >Name</label>
                                        <input
                                            type="text"
                                            name="name"
                                            id="name"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                            placeholder="Employee name"
                                        >
                                    </div>
                                    <div class="col-span-1">
                                        <label
                                            for="gender"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                        >Gender</label>
                                        <select
                                            id="gender"
                                            name="gender"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                        >
                                            <option
                                                selected
                                                disabled
                                            >---</option>
                                            <option value="male">Male</option>
                                            <option value="female">Female</option>
                                        </select>
                                    </div>
                                    <div class="col-span-1">
                                        <label
                                            for="phoneNumber"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                        >Phone Number</label>
                                        <input
                                            type="number"
                                            name="phone_number"
                                            id="phoneNumber"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                            placeholder="Phone Number"
                                        >
                                    </div>
                                    <div class="col-span-1">
                                        <label
                                            for="email"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                        >Email</label>
                                        <input
                                            type="email"
                                            name="email"
                                            id="email"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                            placeholder="Employee Email"
                                        >
                                    </div>
                                    <div class="col-span-1">
                                        <label
                                            for="birthDate"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                        >Birth Date</label>
                                        <input
                                            type="date"
                                            name="birth_date"
                                            id="birthDate"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                            placeholder="Birth Date"
                                        >
                                    </div>
                                    <div class="col-span-1">
                                        <label
                                            for="joinDate"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                        >Join Date</label>
                                        <input
                                            type="date"
                                            name="join_date"
                                            id="joinDate"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                            placeholder="Join Date"
                                        >
                                    </div>
                                    <div class="col-span-1">
                                        <label
                                            for="department"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                        >Department</label>
                                        <select
                                            id="department"
                                            name="department_id"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                        >
                                            <option
                                                selected
                                                disabled
                                            >---</option>
                                            @foreach ($departments as $department)
                                                <option value="{{ $department->id }}">{{ $department->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-span-1">
                                        <label
                                            for="designation"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                        >Designation</label>
                                        <select
                                            id="designation"
                                            name="designation_id"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                        >
                                            <option
                                                selected
                                                disabled
                                            >---</option>
                                            @foreach ($designations as $designation)
                                                <option value="{{ $designation->id }}">{{ $designation->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-span-1">
                                        <label
                                            for="isActive"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                        >Status</label>
                                        <select
                                            id="isActive"
                                            name="is_active"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                        >
                                            <option
                                                selected
                                                value="1"
                                            >Active</option>
                                            <option value="0">Inactive</option>
                                        </select>
                                    </div>
                                </div>
                                <button
                                    type="submit"
                                    data-modal-hide="create-modal"
                                    class="mt-5 text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                                >
                                    <svg
                                        class="me-1 -ms-1 w-5 h-5"
                                        fill="currentColor"
                                        viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg"
                                    >
                                        <path
                                            fill-rule="evenodd"
                                            d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                            clip-rule="evenodd"
                                        ></path>
                                    </svg>
                                    Add Employee
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- End Create Modal -->

                <!-- Import Modal -->
                <button
                    data-modal-target="import-modal"
                    data-modal-toggle="import-modal"
                    class="py-2.5 px-5 me-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700"
                    type="button"
                >
                    Import Employee
                </button>
                <div
                    id="import-modal"
                    tabindex="-1"
                    aria-hidden="true"
                    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full"
                >
                    <div class="relative p-4 w-full max-w-md max-h-full">
                        <!-- Modal content -->
                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                            <!-- Modal header -->
                            <div
                                class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                    Import New Employee
                                </h3>
                                <button
                                    type="button"
                                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                    data-modal-toggle="import-modal"
                                >
                                    <svg
                                        class="w-3 h-3"
                                        aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg"
                                        fill="none"
                                        viewBox="0 0 14 14"
                                    >
                                        <path
                                            stroke="currentColor"
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"
                                        />
                                    </svg>
                                    <span class="sr-only">Close modal</span>
                                </button>
                            </div>
                            <!-- Modal body -->
                            <form
                                id="importForm"
                                class="p-4 md:p-5"
                                onsubmit="onSubmit(event, this);"
                                data-url="{{ route('employee.import') }}"
                            >
                                @csrf
                                <div class="grid gap-4 mb-4 grid-cols-2">
                                    <div class="col-span-2">
                                        <input
                                            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                            aria-describedby="file_input_help"
                                            type="file"
                                            name="file"
                                        >
                                        <p
                                            class="mt-1 text-sm text-gray-500 dark:text-gray-300"
                                            id="file_input_help"
                                        > MAX SIZE. 1MB.</p>
                                    </div>
                                    <div class="col-span-2">
                                        <p class="text-gray-500 dark:text-gray-400">
                                            Silahkan download template excel terlebih dahulu untuk import data.
                                            <a
                                                href="{{ route('employee.export-template') }}"
                                                class="inline-flex items-center font-medium text-blue-600 dark:text-blue-500 hover:underline"
                                            >
                                                Download Template
                                                <svg
                                                    class="w-4 h-4 ms-2 rtl:rotate-180"
                                                    aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    fill="none"
                                                    viewBox="0 0 14 10"
                                                >
                                                    <path
                                                        stroke="currentColor"
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M1 5h12m0 0L9 1m4 4L9 9"
                                                    />
                                                </svg>
                                            </a>
                                        </p>
                                    </div>
                                </div>
                                <button
                                    form="importForm"
                                    type="submit"
                                    class="mt-5 text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                                    data-modal-hide="import-modal"
                                >
                                    <svg
                                        class="me-1 -ms-1 w-5 h-5"
                                        fill="currentColor"
                                        viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg"
                                    >
                                        <path
                                            fill-rule="evenodd"
                                            d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                            clip-rule="evenodd"
                                        ></path>
                                    </svg>
                                    Import Employee
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- End Import Modal -->
            </div>
        </div>

        <div id="content">
            @include('pages.employee.table')
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        function search(event, element) {
            event.preventDefault();
            let formData = new FormData(element);

            $.ajax({
                url: element.getAttribute("data-url"),
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
                beforeSend: () => {
                    Swal.fire({
                        allowOutsideClick: false,
                        showConfirmButton: false,
                        willOpen: () => Swal.showLoading(),
                    });
                },
                success: (response) => {
                    $("#content").html(response.data);
                    initFlowbite();
                    Swal.close();
                },
                error: (xhr) => {
                    const errorMessage = xhr.responseJSON ? xhr.responseJSON.error :
                        'An error occurred in performing this action.';
                    const Toast = Swal.mixin({
                        toast: true,
                        position: "top-end",
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.onmouseenter = Swal.stopTimer;
                            toast.onmouseleave = Swal.resumeTimer;
                        },
                    });

                    Toast.fire({
                        icon: "error",
                        title: "Oops!",
                        text: errorMessage,
                    });
                },
            });
        }
    </script>

    <script>
        function onSubmit(event, element) {
            event.preventDefault();
            let formData = new FormData(element);

            $.ajax({
                url: element.getAttribute("data-url"),
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
                beforeSend: () => {
                    Swal.fire({
                        allowOutsideClick: false,
                        showConfirmButton: false,
                        willOpen: () => Swal.showLoading(),
                    });
                },
                success: (response) => {
                    Swal.fire({
                        icon: "success",
                        title: "Success!",
                        text: response.success,
                        confirmButtonColor: "#153A88",
                    }).then(() => {
                        element.reset();
                        $("#content").html(response.data);
                        initFlowbite();
                    });
                },
                error: (xhr) => {
                    const errorMessage = xhr.responseJSON ? xhr.responseJSON.error :
                        'An error occurred in performing this action.';
                    const Toast = Swal.mixin({
                        toast: true,
                        position: "top-end",
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.onmouseenter = Swal.stopTimer;
                            toast.onmouseleave = Swal.resumeTimer;
                        },
                    });

                    Toast.fire({
                        icon: "error",
                        title: "Oops!",
                        text: errorMessage,
                    });
                },
            });
        }
    </script>

    <script>
        function onDestroy(event, element) {
            event.preventDefault();

            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#153A88",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!",
            }).then((result) => result.isConfirmed ? onSubmit(event, element) : '');
        }
    </script>
@endpush
