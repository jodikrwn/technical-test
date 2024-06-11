@extends('pages.layouts.auth')

@section('title')
    Login Page
@endsection

@section('content')
    <section>
        <div class="grid grid-cols-2">
            <div class="md:col-span-1 col-span-2 flex flex-col h-screen items-center justify-center">
                <div class="mx-auto sm:w-[320px] mb-10 px-5">
                    <h3 class="text-[#153A88] font-semibold text-2xl md:text-3xl text-center mb-2">
                        Masuk
                    </h3>
                    <h4 class="font-medium text-[#B2B2B2] text-center text-[15px]">
                        Selamat datang! silahkan mengisi data email dan password anda
                    </h4>
                    <form
                        id="loginUser"
                        class="space-y-4 mt-10"
                        action="{{ route('authentication') }}"
                        method="POST"
                    >
                        @csrf
                        <div>
                            <label
                                for="email"
                                class="block mb-2 text-sm text-gray-700"
                            >Email<span class="text-[#EC0A0A]">*</span></label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">
                                    <iconify-icon
                                        class="text-gray-700"
                                        icon="solar:user-linear"
                                    ></iconify-icon>
                                </div>
                                <input
                                    type="text"
                                    id="email"
                                    class="@error('email') !border-red-500 @enderror border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5"
                                    placeholder="Masukan email anda"
                                    name="email"
                                />
                            </div>
                            @error('email')
                                <div class="text-red-500 text-sm mt-1">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div>
                            <label
                                for="password"
                                class="block mb-2 text-sm text-gray-700"
                            >Kata Sandi<span class="text-[#EC0A0A]">*</span></label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">
                                    <iconify-icon
                                        class="text-gray-700"
                                        icon="material-symbols:lock-outline"
                                    ></iconify-icon>
                                </div>
                                <input
                                    type="password"
                                    id="password"
                                    class="@error('password') !border-red-500 @enderror border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5"
                                    placeholder="Masukan kata sandi anda"
                                    name="password"
                                />
                            </div>
                            @error('password')
                                <div class="text-red-500 text-sm mt-1">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="pt-5">
                            <button
                                type="submit"
                                class="w-full text-white bg-[#153A88] hover:bg-[#153A88]/80 focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center"
                            >
                                Masuk
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="h-screen col-span-2 md:col-span-1 hidden md:block place-content-center">
                <img
                    class="object-cover w-full"
                    src="assets/images/seatrium-logo.png"
                    alt="login"
                />
            </div>
        </div>
    </section>
@endsection
