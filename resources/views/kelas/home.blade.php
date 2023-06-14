    <x-app-layout>
        @slot('title', $kls[0]->class_name . ' - ' . $kls[0]->class_subject)
        {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css"> --}}
        {{-- <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css"> --}}
        {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css"> --}}
        {{-- <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css"> --}}
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
        <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.0/dist/trix.css">
        {{-- <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.material.min.css"> --}}
        {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-components-web/4.0.0/material-components-web.min.css"> --}}
        <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar"
            type="button"
            class="inline-flex items-center p-2 mt-2 ml-3 text-sm text-gray-500 rounded-lg md:hidden hover:bg-primary focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-primary-700 dark:focus:ring-gray-600">
            <span class="sr-only">Open sidebar</span>
            <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg">
                <path clip-rule="evenodd" fill-rule="evenodd"
                    d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
                </path>
            </svg>
        </button>

        <aside id="logo-sidebar"
            class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full md:translate-x-0"
            aria-label="Sidebar">
            <div class="h-full px-3 py-4 overflow-y-auto bg-gray-50 dark:bg-gray-800">
                <div class="flex justify-center items-center">
                    <a href="{{ route('dashboard') }}" class="">
                        <img src="{{ asset('prezensia.png') }}" alt="Prezensia" class="" width="150px">

                    </a>
                </div>
                <ul class="space-y-2 font-medium">
                    <li>
                        <a href="{{ route('dashboard') }}"
                            class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-primary dark:hover:bg-primary-700">
                            <svg aria-hidden="true"
                                class="w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                                fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path>
                                <path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path>
                            </svg>
                            <span class="ml-3">Dashboard</span>
                        </a>
                    </li>

                    <li>
                        <button type="button"
                            class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg group hover:bg-primary dark:text-white dark:hover:bg-primary-700"
                            aria-controls="dropdown-example" data-collapse-toggle="dropdown-example">
                            <svg aria-hidden="true"
                                class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                                fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M5 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H5zM5 11a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2H5zM11 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V5zM11 13a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z">
                                </path>
                            </svg>
                            <span class="flex-1 ml-3 text-left whitespace-nowrap" sidebar-toggle-item>Kelas</span>

                            <svg sidebar-toggle-item class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </button>
                        <ul id="dropdown-example" class="hidden py-2 space-y-2">
                            <li>
                                <a href="#"
                                    class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-primary dark:text-white dark:hover:bg-primary-700">Products</a>
                            </li>
                            <li>
                                <a href="#"
                                    class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-primary dark:text-white dark:hover:bg-primary-700">Billing</a>
                            </li>
                            <li>
                                <a href="#"
                                    class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-primary dark:text-white dark:hover:bg-primary-700">Invoice</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"
                            class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-primary dark:hover:bg-primary-700">
                            <svg aria-hidden="true"
                                class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                                fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M8.707 7.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l2-2a1 1 0 00-1.414-1.414L11 7.586V3a1 1 0 10-2 0v4.586l-.293-.293z">
                                </path>
                                <path
                                    d="M3 5a2 2 0 012-2h1a1 1 0 010 2H5v7h2l1 2h4l1-2h2V5h-1a1 1 0 110-2h1a2 2 0 012 2v10a2 2 0 01-2 2H5a2 2 0 01-2-2V5z">
                                </path>
                            </svg>
                            <span class="flex-1 ml-3 whitespace-nowrap">Inbox</span>
                            <span
                                class="inline-flex items-center justify-center w-3 h-3 p-3 ml-3 text-sm font-medium text-blue-800 bg-blue-100 rounded-full dark:bg-blue-900 dark:text-blue-300">3</span>
                        </a>
                    </li>
                    <li>
                        <a href="#"
                            class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-primary dark:hover:bg-primary-700">
                            <svg aria-hidden="true"
                                class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                                fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span class="flex-1 ml-3 whitespace-nowrap">Users</span>
                        </a>
                    </li>
                    <li>
                        <a href="#"
                            class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-primary dark:hover:bg-primary-700">
                            <svg aria-hidden="true"
                                class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                                fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M10 2a4 4 0 00-4 4v1H5a1 1 0 00-.994.89l-1 9A1 1 0 004 18h12a1 1 0 00.994-1.11l-1-9A1 1 0 0015 7h-1V6a4 4 0 00-4-4zm2 5V6a2 2 0 10-4 0v1h4zm-6 3a1 1 0 112 0 1 1 0 01-2 0zm7-1a1 1 0 100 2 1 1 0 000-2z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span class="flex-1 ml-3 whitespace-nowrap">Products</span>
                        </a>
                    </li>
                    <li>
                        <a href="#"
                            class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-primary dark:hover:bg-primary-700">
                            <svg aria-hidden="true"
                                class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                                fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M3 3a1 1 0 00-1 1v12a1 1 0 102 0V4a1 1 0 00-1-1zm10.293 9.293a1 1 0 001.414 1.414l3-3a1 1 0 000-1.414l-3-3a1 1 0 10-1.414 1.414L14.586 9H7a1 1 0 100 2h7.586l-1.293 1.293z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span class="flex-1 ml-3 whitespace-nowrap">Sign In</span>
                        </a>
                    </li>
                    <li>
                        <a href="#"
                            class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-primary dark:hover:bg-primary-700">
                            <svg aria-hidden="true"
                                class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                                fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M5 4a3 3 0 00-3 3v6a3 3 0 003 3h10a3 3 0 003-3V7a3 3 0 00-3-3H5zm-1 9v-1h5v2H5a1 1 0 01-1-1zm7 1h4a1 1 0 001-1v-1h-5v2zm0-4h5V8h-5v2zM9 8H4v2h5V8z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span class="flex-1 ml-3 whitespace-nowrap">Sign Up</span>
                        </a>
                    </li>
                </ul>
            </div>
        </aside>

        <div class="container">
            <div class="rounded border grid w-3/4 mx-auto mt-4">
                <div id="infoKelas" data-accordion="collapse"
                    data-active-classes="bg-purple-100 dark:bg-gray-800 text-purple-600 dark:text-white">
                    <h2 id="infoKelasHead">
                        <button type="button"
                            class="flex items-left justify-between w-full p-5 font-medium text-left text-gray-500 border border-b-0 border-gray-200 rounded-t-xl focus:ring-4 focus:ring-purple-200 dark:focus:ring-purple-800 dark:border-gray-700 dark:text-gray-400 hover:bg-blue-100 dark:hover:bg-gray-800"
                            data-accordion-target="#infoKelasBody" aria-expanded="false"
                            aria-controls="infoKelasBody">
                            <span class="flex items-center"><svg class="w-5 h-5 mr-2 shrink-0" fill="currentColor"
                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                Info Kelas</span>
                            <svg data-accordion-icon class="w-6 h-6 shrink-0" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 13l-3 3m0 0l-3-3m3 3V8m0 13a9 9 0 110-18 9 9 0 010 18z"></path>
                            </svg>
                        </button>
                    </h2>
                    <div id="infoKelasBody" class="hidden" aria-labelledby="infoKelasHead">
                        <div
                            class="p-5 bg-white border border-b-0 border-white-200 dark:border-white-700 dark:bg-white-900">
                            <x-info-kelas class="kode" data-kode="{{ $kls[0]->class_code }}"
                                data-hashkode="{{ $kls[0]->hashcode }}">{{ __('Kode Kelas') }}@slot('text',
                                $kls[0]->class_code)</x-info-kelas>
                            <x-info-kelas>{{ __('Nama Kelas') }}@slot('text', $kls[0]->class_name)</x-info-kelas>
                            <x-info-kelas>{{ __('Subyek Kelas') }}@slot('text', $kls[0]->class_subject)</x-info-kelas>
                            <x-info-kelas>{{ __('Deskripsi Kelas') }}@slot('text', $kls[0]->class_desc)</x-info-kelas>
                        </div>
                    </div>
                </div>
                <!-- Tabs -->
                <div class="justify-self-center mb-4 border-b">
                    <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="myTab"
                        data-tabs-toggle="#myTabContent" role="tablist">
                        <li class="mr-2" role="presentation">
                            <button class="tab-button inline-block p-4 border-b-2 rounded-t-lg" id="presensi-tab"
                                data-tabs-target="#presensi" type="button" role="tab" aria-controls="presensi"
                                aria-selected="false">Presensi</button>
                        </li>
                        <li class="mr-2" role="presentation">
                            <button
                                class="tab-button inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                                id="partisipan-tab" data-tabs-target="#partisipan" type="button" role="tab"
                                aria-controls="partisipan" aria-selected="false">Partisipan</button>
                        </li>
                        <li class="mr-2" role="presentation">
                            <button
                                class="tab-button inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                                id="laporan-tab" data-tabs-target="#laporan" type="button" role="tab"
                                aria-controls="laporan" aria-selected="false">Laporan</button>
                        </li>
                    </ul>
                </div>
                <!-- Tab Contents -->
                <div id="myTabContent">
                    <div class="tab-content hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="presensi"
                        role="tabpanel" aria-labelledby="presensi-tab">
                        <div class="container w-4/5 mx-24">
                            <label class="relative inline-flex items-center cursor-pointer m-3 ">
                                <input type="checkbox" id="tambah" value="true" class="sr-only peer"
                                    name="ulangi">
                                <div
                                    class=" w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600">
                                </div>
                                <div>
                                    <span
                                        class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-300 ">Tambah?</span>
                                </div>
                            </label>
                        </div>
                        <form action="{{ route('buatpresensi.store') }}" method="post" class="form-control hidden"
                            id="formbuat">
                            @csrf
                            <div class="grid place-items-center">

                                <div
                                    class="w-full max-w-lg  p-4 bg-white border border-gray-200 rounded-lg shadow md:p-6 md:p-8 dark:bg-gray-800 dark:border-gray-700 ">
                                    <form class="space-y-6" action="#">
                                        <h5 class="text-xl font-medium text-gray-900 dark:text-white m-3">Buat
                                            Presensi
                                            Baru
                                        </h5>
                                        <div>
                                            <label for="tanggal"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal</label>

                                            <div class="relative max-w-sm">
                                                <div
                                                    class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                                    <svg aria-hidden="true"
                                                        class="w-5 h-5 text-gray-500 dark:text-gray-400"
                                                        fill="currentColor" viewBox="0 0 20 20"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd"
                                                            d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                                            clip-rule="evenodd"></path>
                                                    </svg>
                                                </div>
                                                <input datepicker type="date" id="tanggal" name="mulai"
                                                    value="" required
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                    placeholder="Tanggal">
                                            </div>
                                        </div>
                                        <div>
                                            <label for="timemulai"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Dimulai</label>
                                            <input type="time" id="timemulai" name="jammulai" value=""
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-1/4 px-5 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                required>
                                        </div>
                                        <div>
                                            <label for="timeakhir"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Diakhiri</label>
                                            <input type="time" id="timeakhir" name="jamakhir" value=""
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-1/4 px-5 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                required>
                                        </div>
                                        <div>
                                            <label for="message"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Deskripsi</label>
                                            <textarea id="message" rows="3" required name="ket"
                                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                placeholder="Yang Anda pikirkan..."></textarea>
                                        </div>
                                        <div>

                                            <label class="relative inline-flex items-center cursor-pointer m-3 ">
                                                <input type="checkbox" id="toggle" value="true"
                                                    class="sr-only peer" name="ulangi">
                                                <div
                                                    class=" w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600">
                                                </div>
                                                <div>
                                                    <span
                                                        class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-300 ">Ulangi?</span>

                                                </div>

                                            </label>

                                            <div id="textDiv" class="hidden">
                                                <div>
                                                    <input type="radio" name="setiap" id="hari"
                                                        class="radio radio-info" value="hari" /><label
                                                        for="hari">Setiap Hari</label>

                                                </div>
                                                <div>
                                                    <input type="radio" id="minggu" name="setiap"
                                                        class="radio radio-info" value="minggu" /><label
                                                        for="minggu">Setiap Minggu</label>

                                                </div>
                                                <div>
                                                    <input type="radio" name="setiap" id="bulan"
                                                        class="radio radio-info" value="bulan" /><label
                                                        for="bulan">Setiap Bulan</label>
                                                </div>
                                            </div>
                                            <div class="hidden" id="kalihari"><label for="jumlah">Sampai
                                                </label><input type="number" name="jumlah" id="jumlah"
                                                    value="1" min="1" max="365" width="10px"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500  w-1/5 px-5 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                <label for="jumlah"> kali</label>
                                            </div>
                                        </div>
                                        <input type="hidden" name="idkelas" value="{{ $idk }}">
                                        {{-- <button type="submit">Kirim</button> --}}
                                        <input type="submit" class="btn btn-primary" value="Buat">
                                    </form>
                                </div>
                            </div>
                        </form>
                        <div class="container lg:flex lg:flex-col lg:items-center lg:justify-center ">
                            <article class="flex flex-col items-center justify-center prose my-3">
                                <h2 class="h1">Daftar Presensi Anda ..⏳</h2>
                            </article>

                            <div class="relative overflow-x-auto flex my-3 w-4/5">
                                <div class="w-full table-auto">
                                    <table id="tabelabsen" class="stripe w-full table-auto" style="width:100%">
                                        <!-- head -->
                                        <thead>
                                            <tr>
                                                <th>No.</th>

                                                <th>Waktu</th>
                                                <th>Deskripsi</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!-- row 1 -->
                                            @php
                                                $no = 1;
                                                
                                            @endphp


                                            @foreach ($list as $li)
                                                @if (Carbon\Carbon::createFromFormat('Y-m-d', $li->tanggal)->format('Y-M-d') == Carbon\Carbon::now()->format('Y-M-d') &&
                                                        Carbon\Carbon::createFromTimeString($li->timeend)->format('H:i:s') > Carbon\Carbon::now()->format('H:i:s') &&
                                                        Carbon\Carbon::createFromTimeString($li->timestart)->format('H:i:s') < Carbon\Carbon::now()->format('H:i:s'))
                                                    <tr>
                                                        <td>{{ $no++ }}</td>

                                                        <td>
                                                            {{ Carbon\Carbon::parse($li->tanggal)->startOfDay()->locale('id')->toFormattedDayDateString() }}<br>{{ '(' . $li->timestart . ' - ' . $li->timeend . ')' }}
                                                        </td>
                                                        <td>
                                                            {{ $li->ket }}
                                                        </td>
                                                        <td class="flex">

                                                            <button tabindex="0" data-id={{ $li->id }}
                                                                data-tanggal="{{ $li->tanggal }}"
                                                                data-timestart="{{ $li->timestart }}"
                                                                data-timeend="{{ $li->timeend }}"
                                                                data-ket="{{ $li->ket }}"
                                                                class="btn btn-info m-1 edit-btn"
                                                                data-modal-target="updateModal"
                                                                data-modal-toggle="updateModal"><i
                                                                    class="fa-solid fa-pen-to-square"></i></button>
                                                            <button class="btn btn-secondary m-1 btnhapus"
                                                                data-id="{{ $li->id }}"
                                                                data-modal-target="hapus-modal"
                                                                data-modal-toggle="hapus-modal">
                                                                <i class="fa-solid fa-trash-can"
                                                                    style="color: #ffffff;"></i>
                                                                <form action="/realtime" method="post">
                                                                    @csrf
                                                                    <input type="hidden" name="id_presensi"
                                                                        value="{{ $li->id }}">
                                                                    <button type="submit"
                                                                        class="btn btn-primary m-1">
                                                                        <i
                                                                            class="fa-solid fa-arrows-rotate fa-spin"></i></i>
                                                                    </button>
                                                                </form>
                                                                <a href="{{ route('laporan', $li->id) }}"><button
                                                                        type="submit"
                                                                        class="btn btn-primary m-1">
                                                                        <i
                                                                            class="fa-solid fa-database fa-beat"></i></i></i>

                                                                    </button>
                                                                </a>
                                                        </td>
                                                    </tr>
                                                @endif
                                            @endforeach

                                            @foreach ($list as $li)
                                                @if (Carbon\Carbon::parse($li->tanggal)->setTimeFrom(Carbon\Carbon::parse($li->timeend)) < Carbon\Carbon::now())
                                                    <tr>
                                                        <td>{{ $no++ }}</td>

                                                        <td>
                                                            {{ Carbon\Carbon::parse($li->tanggal)->startOfDay()->locale('id')->toFormattedDayDateString() }}<br>{{ '(' . $li->timestart . ' - ' . $li->timeend . ')' }}
                                                        </td>
                                                        <td>
                                                            {{ $li->ket }}
                                                        </td>
                                                        <td class="flex">

                                                            <button tabindex="0" data-id={{ $li->id }}
                                                                data-tanggal="{{ $li->tanggal }}"
                                                                data-timestart="{{ $li->timestart }}"
                                                                data-timeend="{{ $li->timeend }}"
                                                                data-ket="{{ $li->ket }}"
                                                                class="btn btn-info m-1 edit-btn"
                                                                data-modal-target="updateModal"
                                                                data-modal-toggle="updateModal"><i
                                                                    class="fa-solid fa-pen-to-square"></i></button>
                                                            <button class="btn btn-secondary m-1 btnhapus"
                                                                data-id="{{ $li->id }}"
                                                                data-modal-target="hapus-modal"
                                                                data-modal-toggle="hapus-modal">
                                                                <i class="fa-solid fa-trash-can"
                                                                    style="color: #ffffff;"></i></button>
                                                            <a href="{{ route('laporan', $li->id) }}"><button
                                                                    type="submit"
                                                                    class="btn btn-primary m-1">
                                                                    <i
                                                                        class="fa-solid fa-database fa-beat"></i></i></i>

                                                                </button>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                @endif
                                            @endforeach

                                            @foreach ($list as $li)
                                                @if (Carbon\Carbon::parse($li->tanggal)->startOfDay() > Carbon\Carbon::now()->startOfDay())
                                                    <tr>
                                                        <td>{{ $no++ }}</td>

                                                        <td>
                                                            {{ Carbon\Carbon::parse($li->tanggal)->startOfDay()->locale('id')->toFormattedDayDateString() }}<br>{{ '(' . $li->timestart . ' - ' . $li->timeend . ')' }}
                                                        </td>
                                                        <td>
                                                            {{ $li->ket }}
                                                        </td>
                                                        <td class="flex">

                                                            <button tabindex="0" data-id={{ $li->id }}
                                                                data-tanggal="{{ $li->tanggal }}"
                                                                data-timestart="{{ $li->timestart }}"
                                                                data-timeend="{{ $li->timeend }}"
                                                                data-ket="{{ $li->ket }}"
                                                                class="btn btn-info m-1 edit-btn"
                                                                data-modal-target="updateModal"
                                                                data-modal-toggle="updateModal"><i
                                                                    class="fa-solid fa-pen-to-square"></i></button>
                                                            <button class="btn btn-secondary m-1 btnhapus"
                                                                data-id="{{ $li->id }}"
                                                                data-modal-target="hapus-modal"
                                                                data-modal-toggle="hapus-modal">
                                                                <i class="fa-solid fa-trash-can"
                                                                    style="color: #ffffff;"></i></button>
                                                        </td>
                                                    </tr>
                                                @endif
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-content hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="partisipan"
                        role="tabpanel" aria-labelledby="partisipan-tab">
                        <p
                            class="mb-4 text-lg leading-none tracking-tight text-gray-900 md:text-3xl lg:text-4xl dark:text-white">
                            Teacher</p>
                        <table id="teacher" class="text-center">
                            <tbody>
                                @foreach ($part as $par)
                                    @if ($par->roles->role == 'Student')
                                        @php
                                            continue;
                                        @endphp;
                                    @endif
                                    <hr class="mb-2">
                                    <tr>
                                        <td>
                                            <div class="avatar mx-3">
                                                <div
                                                    class="w-8 rounded-full ring ring-primary ring-offset-base-100 ring-offset-2">
                                                    <img src="{{ $par->user->url_photo }}" />
                                                </div>
                                            </div>
                                        </td>
                                        <td>{{ $par->user->name }}</td>
                                        <td>
                                            @if ($par->user->id == Auth::id())
                                                <span class="badge badge-success">You</span>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <p
                            class="mt-5 mb-4 text-lg leading-none tracking-tight text-gray-600 md:text-3xl lg:text-4xl dark:text-white">
                            Students</p>
                        @foreach ($part as $par)
                            @if ($par->roles->role == 'Teacher')
                                @php
                                    continue;
                                @endphp;
                            @endif
                            <hr class="mb-5">
                            <table id="students" class="mt-3 mb-5">
                                <tbody>
                                    <tr class="pop-del" data-popover-target="popover-del"
                                        data-id="{{ $par->user->id }}" data-name="{{ $par->user->name }}"
                                        data-kelas="{{ $par->class_id }}">
                                        <td>
                                            <div class="avatar mx-3">
                                                <div
                                                    class="w-8 rounded-full ring ring-primary ring-offset-base-100 ring-offset-2">
                                                    <img src="{{ $par->user->url_photo }}" />
                                                </div>
                                            </div>
                                        </td>
                                        <td>{{ $par->user->name }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        @endforeach
                    </div>
                    <div class="tab-content hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="laporan"
                        role="tabpanel" aria-labelledby="laporan-tab">
                        <div id="chart" class=""></div>
                    </div>
                </div>
            </div>
        </div>
        <x-hapus-modal>{{ __('presensi') }}</x-hapus-modal>

        <!-- Main modal -->
        @include('components.update-modal')
        @include('components.unenroll-popover')
        @include('components.unenroll-modal')
        @include('components.fullScreen-modal')
    </x-app-layout>

    <script>
        $(document).ready(function() {

            var kode = $('.kode').data('kode')
            var hashkode = $('.kode').data('hashkode')
            var link = @json(route('classes.linkjoin', ['id' => $kls[0]->hashcode, 'cd' => $kls[0]->class_code]));

            $('.kodeF').text(kode)
            var copyK = document.getElementById('copyK')
            var copyL = document.getElementById('copyL')

            copyK.addEventListener('click', function() {
                navigator.clipboard.writeText(kode)
                    .then(function() {
                        Swal.fire({
                            position: 'bottom-start',
                            icon: 'success',
                            title: 'Code Copied',
                            showConfirmButton: false,
                            timer: 1500,
                            allowOutsideClick: false,
                            allowEscapeKey: false,
                            allowEnterKey: false,
                            toast: true,
                            didOpen: () => {
                                const modal = document.getElementById('fullScreen-modal');
                                Swal.getPopup().style.width = `${modal.offsetWidth}px`;
                                Swal.getPopup().style.left = `${modal.offsetLeft}px`;
                            },
                            willClose: () => {
                                // Reset any changes made to the modal size and position
                                Swal.getPopup().style.width = null;
                                Swal.getPopup().style.left = null;
                            }
                        });
                    })
                    .catch(function(error) {
                        console.error("Error copying text: ", error);
                    });
            });

            copyL.addEventListener('click', function() {
                navigator.clipboard.writeText(link)
                    .then(function() {
                        Swal.fire({
                            position: 'bottom-start',
                            icon: 'success',
                            title: 'Link Copied',
                            showConfirmButton: false,
                            timer: 1500,
                            allowOutsideClick: false,
                            allowEscapeKey: false,
                            allowEnterKey: false,
                            toast: true,
                            didOpen: () => {
                                const modal = document.getElementById('fullScreen-modal');
                                Swal.getPopup().style.width = `${modal.offsetWidth}px`;
                                Swal.getPopup().style.left = `${modal.offsetLeft}px`;
                            },
                            willClose: () => {
                                // Reset any changes made to the modal size and position
                                Swal.getPopup().style.width = null;
                                Swal.getPopup().style.left = null;
                            }
                        });
                    })
                    .catch(function(error) {
                        console.error("Error copying text: ", error);
                    });
            });

            // Inisialisasi DataTables pada tabel
            $('#tabelabsen').DataTable({
                buttons: ['copy', 'csv', 'print', 'excel', 'pdf', 'colvis'],
                dom: "<'row'<'col-md-3'l><'col-md-5'B><'col-md-4'f>>" +
                    "<'row'<'col-md-12'tr>>" +
                    "<'row'<'col-md-5'i><'col-md-7'p>>",
                lengthMenu: [
                    [5, 10, 25, 50, 100, -1],
                    [5, 10, 25, 50, 100, "All"]
                ],
                "columnDefs": [{
                    "width": "40%",
                    "targets": 3
                }]
            });
            $('.btnhapus').click(function() {
                var id = $(this).data('id');
                $('#dell').attr('data-id', id);
                console.log(id);
            })
            $('#dell').click(function() {
                var id = $(this).data('id');

                console.log(id);
                $.ajax({
                    url: "{{ route('presensi.delete') }}",
                    type: 'POST',
                    data: {
                        '_token': '{{ csrf_token() }}',
                        'id': id,

                    },
                    success: function(response) {
                        if (response.msg == 'success') {
                            Swal.fire('Berhasil dihapus', '', 'success').then(function() {
                                window.location.reload();
                            });
                        }
                    }
                });
            })

            // Menangkap klik tombol Edit dan menampilkan modal
            $('.edit-btn').click(function() {
                var id = $(this).data('id');
                var tanggal = $(this).data('tanggal');
                var timestart = $(this).data('timestart');
                var timeend = $(this).data('timeend');
                var ket = $(this).data('ket');
                console.log(timestart);
                console.log(id);
                $('.tanggal').val(tanggal);
                $('.start').val(timestart);
                $('.end').val(timeend);
                $('.kete').val(ket);
                $('.id_pres').val(id);

                $.ajax({
                    url: '/presensi/edit',
                    type: 'POST',

                    success: function(response) {
                        $('#updateModal .modal-content').html(response);
                        $('#updateModal').modal('show');
                    }
                });
            });

            $('.pop-del').hover(function() {
                var id = $(this).data('id')
                var kelas = $(this).data('kelas')
                var name = $(this).data('name')
                console.log(id)
                $('.unenroll').attr('data-id', id)
                $('.unenroll').attr('data-kelas', kelas)
                $('.name').text(name)
            })

            $('.unenroll').click(function() {
                var id = $(this).data('id')
                var kelas = $(this).data('kelas')
                $('#accUnen').attr('data-id', id)
                $('#accUnen').attr('data-kelas', kelas)
            })

            $('#accUnen').click(function() {
                var id = $(this).data('id')
                var kelas = $(this).data('kelas')
                $.ajax({
                    url: '{{ route('classes.unenroll') }}',
                    type: 'POST',
                    data: {
                        '_token': '{{ csrf_token() }}',
                        'id': id,
                        'kelas': kelas
                    },
                    success: function(response) {
                        if (response.msg === 'success') {
                            Swal.fire('Unenroll Success', '', 'success').then(function() {
                                window.location.reload();
                            });
                        }
                    }
                });
            })
        });
    </script>

    <script>
        const tambah = document.getElementById("tambah");
        const formbuat = document.getElementById("formbuat");

        tambah.addEventListener("click", () => {
            if (tambah.checked) {
                formbuat.style.display = "block";
            } else {
                formbuat.style.display = "none";
            }
        });
        const toggle = document.getElementById("toggle");
        const text = document.getElementById("textDiv");
        const kali = document.getElementById("kalihari");
        const hari = document.getElementById('hari')
        const minggu = document.getElementById('minggu')
        const bulan = document.getElementById('bulan')

        toggle.addEventListener("click", () => {
            if (toggle.checked) {
                text.style.display = "block";
                kali.style.display = "block"
                hari.required = true;
                minggu.required = true;
                bulan.required = true
            } else {
                text.style.display = "none";
                kali.style.display = "none";
                hari.required = false;
                minggu.required = false;
                bulan.required = false
            }
        });
        // const toggle2 = document.getElementById("hari");
        // const text2 = document.getElementById("kalihari");

        // toggle2.addEventListener("click", () => {
        //     if (toggle2.checked) {
        //         text2.style.display = "block";
        //     } else {
        //         text2.style.display = "none";
        //     }
        // });
        // const toggle3 = document.getElementById("minggu");
        // const text3 = document.getElementById("kaliminggu");

        // toggle3.addEventListener("click", () => {
        //     if (toggle3.checked) {
        //         text3.style.display = "block";
        //     } else {
        //         text3.style.display = "none";
        //     }
        // });

        $(document).ready(function() {
            $('#tabelpartisipan').DataTable({

            });

            $.ajax({
                url: '{{ route('chartReq') }}',
                method: 'POST',
                data: {
                    '_token': '{{ csrf_token() }}',
                    'cls_id': '{{ $idk }}'
                },
                dataType: 'json',
                success: function(resp) {
                    if (resp.count > 0) {
                        data = [];
                        cat = [];
                        for (i = 1; i <= resp.count; i++) {
                            data.push(resp['cnt' + i]);
                            cat.push(resp['tgl' + i]);
                        }
                        var options = {
                            chart: {
                                type: 'line'
                            },
                            series: [{
                                name: 'hadir',
                                data: data
                            }],
                            xaxis: {
                                categories: cat
                            }
                        };

                        var chart = new ApexCharts(document.querySelector("#chart"), options);
                        chart.render();
                    } else {
                        var currentDate = new Date();
                        var formattedDate = currentDate.toLocaleString();
                        data = [];
                        cat = [];
                        data.push(resp.count)
                        cat.push(formattedDate)
                        var options = {
                            chart: {
                                type: 'line'
                            },
                            series: [{
                                name: 'hadir',
                                data: data
                            }],
                            xaxis: {
                                categories: cat
                            }
                        };
                        var chart = new ApexCharts(document.querySelector("#chart"), options);
                        chart.render();
                    }

                },
                error: function(data) {
                    console.log("ERROR".concat(data));
                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#tabelabsen').DataTable();
        });
        // Mendapatkan elemen <select> berdasarkan atribut name
        var selectElement = document.querySelector('select[name="tabelabsen_length"]');

        // Mengatur properti style dengan nilai width:50px
        selectElement.style.width = '50px';
    </script>
    <script type="text/javascript">
        $('.show_confirm').click(function(event) {

            var form = $(this).closest("form");

            var name = $(this).data("name");
            console.log(name);
            event.preventDefault();

            swal({

                    title: `Are you sure you want to delete this record?`,

                    text: "If you delete this, it will be gone forever.",

                    icon: "warning",

                    buttons: true,

                    dangerMode: true,

                })

                .then((willDelete) => {

                    if (willDelete) {

                        form.submit();

                    }

                });

        });
        // Get all tab buttons
        const tabButtons = document.querySelectorAll('.tab-button');

        // Add event listener to each tab button
        tabButtons.forEach((button) => {
            button.addEventListener('click', function() {
                // Remove the 'border-transparent' class from all tab buttons
                tabButtons.forEach((btn) => {
                    btn.classList.add('border-transparent');
                });

                // Remove the 'selected' class from all tab buttons
                tabButtons.forEach((btn) => {
                    btn.setAttribute('aria-selected', 'false');
                });

                // Add the 'border-transparent' class and 'selected' class to the clicked tab button
                this.classList.remove('border-transparent');
                this.setAttribute('aria-selected', 'true');

                // Store the ID of the active tab in localStorage
                localStorage.setItem('activeTab', this.id);

                // Show the corresponding tab content
                const tabContentId = this.getAttribute('data-tabs-target');
                const tabContent = document.querySelector(tabContentId);
                if (tabContent) {
                    // Hide all tab contents
                    document.querySelectorAll('.tab-content').forEach((content) => {
                        content.style.display = 'none';
                    });

                    // Show the selected tab content
                    tabContent.style.display = 'block';
                }
            });
        });

        // Retrieve the active tab ID from localStorage
        const activeTab = localStorage.getItem('activeTab');

        // If there's an active tab, click on it to trigger the event
        if (activeTab) {
            const activeTabButton = document.getElementById(activeTab);
            if (activeTabButton) {
                activeTabButton.click();
            }
        }

        var element = document.querySelector(".trix-editor")
        element.editor // is a Trix.Editor instance
    </script>
