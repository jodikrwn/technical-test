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
                Description
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
        @forelse ($departments as $department)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
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
                <td class="px-6 py-4">
                    {{ $department->name }}
                </td>
                <td class="px-6 py-4">
                    {{ $department->description }}
                </td>
                <td class="px-6 py-4">
                    <div class="flex items-center">
                        <div
                            class="h-2.5 w-2.5 rounded-full {{ $department->is_active ? 'bg-green-500' : 'bg-red-500' }} me-2">
                        </div> {{ $department->is_active ? 'Active' : 'Inactive' }}
                    </div>
                </td>
                <td class="px-6 py-4">
                    <button
                        id="dropdownMenuIconHorizontalButton{{ $loop->iteration }}"
                        data-dropdown-toggle="dropdownDotsHorizontal{{ $loop->iteration }}"
                        class="inline-flex items-center p-2 text-sm font-medium text-center text-gray-900 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none dark:text-white focus:ring-gray-50 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                        type="button"
                    >
                        <svg
                            class="w-5 h-5"
                            aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor"
                            viewBox="0 0 16 3"
                        >
                            <path
                                d="M2 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm6.041 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM14 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Z"
                            />
                        </svg>
                    </button>

                    <!-- Dropdown menu -->
                    <div
                        id="dropdownDotsHorizontal{{ $loop->iteration }}"
                        class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-auto dark:bg-gray-700 dark:divide-gray-600"
                    >
                        <ul
                            class="py-2 text-sm text-center text-gray-700 dark:text-gray-200"
                            aria-labelledby="dropdownMenuIconHorizontalButton{{ $loop->iteration }}"
                        >
                            <li>
                                <button
                                    data-modal-target="update-modal{{ $loop->iteration }}"
                                    data-modal-toggle="update-modal{{ $loop->iteration }}"
                                    class="block px-4 w-full py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"
                                    type="button"
                                >
                                    Edit
                                </button>
                            </li>
                            <li>
                                <form
                                    onsubmit="onDestroy(event, this)"
                                    data-url="{{ route('department.destroy', ['department' => $department]) }}"
                                >
                                    @csrf
                                    @method('DELETE')
                                    <button
                                        type="submit"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"
                                    >
                                        Delete
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </div>

                    <!-- Update Modal -->
                    <div
                        id="update-modal{{ $loop->iteration }}"
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
                                        Edit Data Department
                                    </h3>
                                    <button
                                        type="button"
                                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                        data-modal-toggle="update-modal{{ $loop->iteration }}"
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
                                    class="p-4 md:p-5"
                                    onsubmit="onSubmit(event, this);"
                                    data-url="{{ route('department.update', ['department' => $department]) }}"
                                >
                                    @csrf
                                    @method('PUT')
                                    <div class="grid gap-4 mb-4 grid-cols-2">
                                        <div class="col-span-2 sm:col-span-1">
                                            <label
                                                for="name"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                            >Name</label>
                                            <input
                                                type="text"
                                                name="name"
                                                id="name"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                placeholder="Department name"
                                                value="{{ $department->name }}"
                                            >
                                        </div>
                                        <div class="col-span-2 sm:col-span-1">
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
                                                    value="1"
                                                    {{ $department->is_active ? 'selected' : '' }}
                                                >Active</option>
                                                <option
                                                    value="0"
                                                    {{ !$department->is_active ? 'selected' : '' }}
                                                >Inactive</option>
                                            </select>
                                        </div>
                                        <div class="col-span-1">
                                            <label
                                                for="description"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                            >Description</label>
                                            <textarea
                                                id="description"
                                                rows="4"
                                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                placeholder="Write department description here"
                                                name="description"
                                            >{{ $department->description }}</textarea>
                                        </div>
                                    </div>
                                    <button
                                        type="submit"
                                        data-modal-hide="update-modal{{ $loop->iteration }}"
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
                                        Edit Department
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
        @empty
            <tr
                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                <td
                    colspan="5"
                    class="px-6 py-4 text-center"
                >Empty</td>
            </tr>
        @endforelse
</table>
