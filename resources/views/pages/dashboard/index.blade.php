@extends('pages.layouts.main')

@section('title')
    Dashboard Page
@endsection

@section('content')
    <div class="p-4 sm:ml-64 mt-5">
        <div class="p-4 rounded-lg dark:border-gray-700 shadow-lg">

            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <div
                    class="flex items-center justify-between flex-column flex-wrap md:flex-row space-y-4 md:space-y-0 pb-4 bg-white dark:bg-gray-900">
                    <div class="flex gap-3">
                        <label
                            for="table-search"
                            class="sr-only"
                        >Search</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 rtl:inset-r-0 start-0 flex items-center ps-3 pointer-events-none">
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
                                type="text"
                                id="table-search-users"
                                class="block p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Search for users"
                            >
                        </div>
                        <div>
                            <button
                                id="dropdownActionButton"
                                data-dropdown-toggle="dropdownAction"
                                class="h-full inline-flex items-center text-gray-500 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-3 py-1.5 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700"
                                type="button"
                            >
                                <span class="sr-only">Action button</span>
                                Action
                                <svg
                                    class="w-2.5 h-2.5 ms-2.5"
                                    aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg"
                                    fill="none"
                                    viewBox="0 0 10 6"
                                >
                                    <path
                                        stroke="currentColor"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="m1 1 4 4 4-4"
                                    />
                                </svg>
                            </button>
                            <!-- Dropdown menu -->
                            <div
                                id="dropdownAction"
                                class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600"
                            >
                                <ul
                                    class="py-1 text-sm text-gray-700 dark:text-gray-200"
                                    aria-labelledby="dropdownActionButton"
                                >
                                    <li>
                                        <a
                                            href="#"
                                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"
                                        >Reward</a>
                                    </li>
                                    <li>
                                        <a
                                            href="#"
                                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"
                                        >Promote</a>
                                    </li>
                                    <li>
                                        <a
                                            href="#"
                                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"
                                        >Activate account</a>
                                    </li>
                                </ul>
                                <div class="py-1">
                                    <a
                                        href="#"
                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white"
                                    >Delete User</a>
                                </div>
                            </div>
                        </div>
                    </div>
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
                                    <form class="p-4 md:p-5">
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
                                                    placeholder="Name Employee"
                                                >
                                            </div>
                                            <div class="col-span-1">
                                                <label
                                                    for="gender"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                                >Gender</label>
                                                <select
                                                    id="gender"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                >
                                                    <option
                                                        selected
                                                        disabled
                                                    >Select Gender</option>
                                                    <option value="w">Laki-Laki</option>
                                                    <option value="m">Perempuan</option>
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
                                                    name="Email"
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
                                                    >Select Department</option>
                                                    <option value="w">Laki-Laki</option>
                                                    <option value="m">Perempuan</option>
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
                                                    >Select Designation</option>
                                                    <option value="w">Laki-Laki</option>
                                                    <option value="m">Perempuan</option>
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
                                    <form class="p-4 md:p-5">
                                        <div class="grid gap-4 mb-4 grid-cols-2">
                                            <div class="col-span-2">
                                                <div class="flex items-center justify-center w-full">
                                                    <label
                                                        for="dropzone-file"
                                                        class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600"
                                                    >
                                                        <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                                            <svg
                                                                class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400"
                                                                aria-hidden="true"
                                                                xmlns="http://www.w3.org/2000/svg"
                                                                fill="none"
                                                                viewBox="0 0 20 16"
                                                            >
                                                                <path
                                                                    stroke="currentColor"
                                                                    stroke-linecap="round"
                                                                    stroke-linejoin="round"
                                                                    stroke-width="2"
                                                                    d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"
                                                                />
                                                            </svg>
                                                            <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span
                                                                    class="font-semibold"
                                                                >Click to upload</span> or drag and drop</p>
                                                            <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG,
                                                                JPG or GIF (MAX. 800x400px)</p>
                                                        </div>
                                                        <input
                                                            id="dropzone-file"
                                                            type="file"
                                                            class="hidden"
                                                        />
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-span-2">
                                                <p class="text-gray-500 dark:text-gray-400">
                                                    Silahkan download template excel terlebih dahulu untuk import data
                                                    employee
                                                    <a
                                                        href="#"
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
                                            type="submit"
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
                                            Import Employee
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- End Import Modal -->
                    </div>
                </div>
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th
                                scope="col"
                                class="p-4"
                            >
                                <div class="flex items-center">
                                    <input
                                        id="checkbox-all-search"
                                        type="checkbox"
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                                    >
                                    <label
                                        for="checkbox-all-search"
                                        class="sr-only"
                                    >checkbox</label>
                                </div>
                            </th>
                            <th
                                scope="col"
                                class="px-6 py-3"
                            >
                                Name
                            </th>
                            <th
                                scope="col"
                                class="px-6 py-3"
                            >
                                Department
                            </th>
                            <th
                                scope="col"
                                class="px-6 py-3"
                            >
                                Designation
                            </th>
                            <th
                                scope="col"
                                class="px-6 py-3"
                            >
                                Status
                            </th>
                            <th
                                scope="col"
                                class="px-6 py-3"
                            >
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr
                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <td class="w-4 p-4">
                                <div class="flex items-center">
                                    <input
                                        id="checkbox-table-search-1"
                                        type="checkbox"
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                                    >
                                    <label
                                        for="checkbox-table-search-1"
                                        class="sr-only"
                                    >checkbox</label>
                                </div>
                            </td>
                            <th
                                scope="row"
                                class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white"
                            >
                                <img
                                    class="w-10 h-10 rounded-full"
                                    src="/docs/images/people/profile-picture-1.jpg"
                                    alt="Jese image"
                                >
                                <div class="ps-3">
                                    <div class="text-base font-semibold">Neil Sims</div>
                                    <div class="font-normal text-gray-500">neil.sims@flowbite.com</div>
                                </div>
                            </th>
                            <td class="px-6 py-4">
                                React Developer
                            </td>
                            <td class="px-6 py-4">
                                React Developer
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center">
                                    <div class="h-2.5 w-2.5 rounded-full bg-green-500 me-2"></div> Online
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <a
                                    href="#"
                                    class="font-medium text-blue-600 dark:text-blue-500 hover:underline"
                                >Edit user</a>
                            </td>
                        </tr>
                        <tr
                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <td class="w-4 p-4">
                                <div class="flex items-center">
                                    <input
                                        id="checkbox-table-search-1"
                                        type="checkbox"
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                                    >
                                    <label
                                        for="checkbox-table-search-1"
                                        class="sr-only"
                                    >checkbox</label>
                                </div>
                            </td>
                            <th
                                scope="row"
                                class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white"
                            >
                                <img
                                    class="w-10 h-10 rounded-full"
                                    src="/docs/images/people/profile-picture-1.jpg"
                                    alt="Jese image"
                                >
                                <div class="ps-3">
                                    <div class="text-base font-semibold">Neil Sims</div>
                                    <div class="font-normal text-gray-500">neil.sims@flowbite.com</div>
                                </div>
                            </th>
                            <td class="px-6 py-4">
                                React Developer
                            </td>
                            <td class="px-6 py-4">
                                React Developer
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center">
                                    <div class="h-2.5 w-2.5 rounded-full bg-green-500 me-2"></div> Online
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <a
                                    href="#"
                                    class="font-medium text-blue-600 dark:text-blue-500 hover:underline"
                                >Edit user</a>
                            </td>
                        </tr>
                        <tr
                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <td class="w-4 p-4">
                                <div class="flex items-center">
                                    <input
                                        id="checkbox-table-search-1"
                                        type="checkbox"
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                                    >
                                    <label
                                        for="checkbox-table-search-1"
                                        class="sr-only"
                                    >checkbox</label>
                                </div>
                            </td>
                            <th
                                scope="row"
                                class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white"
                            >
                                <img
                                    class="w-10 h-10 rounded-full"
                                    src="/docs/images/people/profile-picture-1.jpg"
                                    alt="Jese image"
                                >
                                <div class="ps-3">
                                    <div class="text-base font-semibold">Neil Sims</div>
                                    <div class="font-normal text-gray-500">neil.sims@flowbite.com</div>
                                </div>
                            </th>
                            <td class="px-6 py-4">
                                React Developer
                            </td>
                            <td class="px-6 py-4">
                                React Developer
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center">
                                    <div class="h-2.5 w-2.5 rounded-full bg-green-500 me-2"></div> Online
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <a
                                    href="#"
                                    class="font-medium text-blue-600 dark:text-blue-500 hover:underline"
                                >Edit user</a>
                            </td>
                        </tr>
                </table>
            </div>

        </div>
    </div>
@endsection
