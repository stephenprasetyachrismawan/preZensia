<x-app-layout>
    @slot('title', $part[0]->kelas->class_name . ' - ' . $part[0]->kelas->class_subject)
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css"> --}}
    {{-- <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css"> --}}
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css"> --}}
    {{-- <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css"> --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    {{-- <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.material.min.css"> --}}
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-components-web/4.0.0/material-components-web.min.css"> --}}
    <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar" type="button"
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
        class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full md:translate-x-0 "
        aria-label="Sidebar">
        <div class="h-full px-3 py-4 overflow-y-auto bg-gray-50 dark:bg-gray-800 flex flex-col justify-between">
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
                        <span class="flex-1 ml-3 text-left whitespace-nowrap" sidebar-toggle-item>Teaching in</span>

                        <svg sidebar-toggle-item class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </button>
                    <ul id="dropdown-example" class="hidden py-2 space-y-2">
                        @foreach ($listklsguru as $lkg)
                            <li>
                                <a href="{{ route('classes.home', ['id' => $lkg->hashcode]) }}"
                                    class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-primary dark:text-white dark:hover:bg-primary-700">{{ $lkg->class_subject }}&nbsp;{{ $lkg->class_name }}</a>
                            </li>
                        @endforeach
                    </ul>
                </li>
                <li>
                    <button type="button"
                        class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg group hover:bg-primary dark:text-white dark:hover:bg-primary-700"
                        aria-controls="dropdown2-example" data-collapse-toggle="dropdown2-example">
                        <svg aria-hidden="true"
                            class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                            fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M5 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H5zM5 11a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2H5zM11 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V5zM11 13a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z">
                            </path>
                        </svg>
                        <span class="flex-1 ml-3 text-left whitespace-nowrap" sidebar-toggle-item>Enrolled</span>

                        <svg sidebar-toggle-item class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </button>
                    <ul id="dropdown2-example" class="hidden py-2 space-y-2">
                        @foreach ($listklsmurid as $lkm)
                            <li>
                                <a href="{{ route('classes.home', ['id' => $lkm->hashcode]) }}"
                                    class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-primary dark:text-white dark:hover:bg-primary-700">{{ $lkm->class_subject }}&nbsp;{{ $lkm->class_name }}</a>
                            </li>
                        @endforeach


                    </ul>
                </li>
                <li>
                    <a href="{{ route('archive') }}"
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
                        <span class="flex-1 ml-3 whitespace-nowrap">Archived Class</span>

                    </a>
                </li>
            </ul>
            <ul class="pt-4 mt-4 space-y-2 font-medium border-t border-gray-200 dark:border-gray-700 mb-10">
                <li>
                    <div data-popover-target='popover-top' data-popover-placement='right'
                        class=" flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-primary dark:hover:bg-primary-700">
                        <div class="avatar mx-3">
                            <div class="w-8 rounded-full ring ring-primary ring-offset-base-100 ring-offset-2">
                                <img src="{{ Auth::user()->url_photo }}" />
                            </div>
                        </div>
                        <div><span class="text-2xl"></span class="flex-1 ml-3 whitespace-nowrap">
                            {{ Auth::user()->name }}
                        </div>

                    </div>
                    <div data-popover id="popover-top" role="tooltip"
                        class="absolute z-10 invisible inline-block w-64 text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 dark:text-gray-400 dark:border-gray-600 dark:bg-gray-800">

                        <div class="px-3 py-2">
                            <div>
                                <form method="POST" id="logout-form" action="{{ route('logout') }}">

                                    @csrf

                                    <a href="{{ route('logout') }}"
                                        class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-primary dark:hover:bg-primary-700"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <svg aria-hidden="true"
                                            class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                                            fill="currentColor" viewBox="0 0 20 20"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M3 3a1 1 0 00-1 1v12a1 1 0 102 0V4a1 1 0 00-1-1zm10.293 9.293a1 1 0 001.414 1.414l3-3a1 1 0 000-1.414l-3-3a1 1 0 10-1.414 1.414L14.586 9H7a1 1 0 100 2h7.586l-1.293 1.293z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                        <span class="flex-1 ml-3 whitespace-nowrap">Log out</span></a>
                                </form>
                            </div>
                            <div>
                                <a href="{{ route('profile.edit') }}"
                                    class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-primary dark:hover:bg-primary-700">
                                    <svg aria-hidden="true"
                                        class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                                        fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                                            clip-rule="evenodd"></path>
                                    </svg>


                                    <span class="flex-1 ml-3 whitespace-nowrap">{{ __('Profile') }}</span>

                                </a>
                            </div>
                        </div>
                        <div data-popper-arrow></div>
                    </div>
                </li>

            </ul>
        </div>
    </aside>

    <div class="p-0 sm:ml-64 h-screen flex flex-col justify-between">
        <div class="rounded border grid w-3/4 mx-auto mt-4">
            <div id="infoKelas" data-accordion="collapse"
                data-active-classes="bg-blue-100 dark:bg-gray-800 text-blue-600 dark:text-white">
                <h2 id="infoKelasHead">
                    <button type="button"
                        class="flex items-left justify-between w-full p-5 font-medium text-left text-gray-500 border border-b-0 border-gray-200 rounded-t-xl focus:ring-4 focus:ring-blue-200 dark:focus:ring-blue-800 dark:border-gray-700 dark:text-gray-400 hover:bg-blue-100 dark:hover:bg-gray-800"
                        data-accordion-target="#infoKelasBody" aria-expanded="false" aria-controls="infoKelasBody">
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
                </ul>
            </div>

            <!-- Tab Contents -->
            <div id="myTabContent">
                <div class="tab-content hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="presensi"
                    role="tabpanel" aria-labelledby="presensi-tab">
                    <div class="container lg:flex lg:flex-col lg:items-center lg:justify-center">
                        <article class="flex flex-col items-center justify-center prose my-3">
                            <h2 class="h1">Daftar Presensi Anda ..⏳</h2>
                        </article>

                        <div class="relative overflow-x-auto flex my-3 w-4/5">
                            <div class="w-full table-auto">
                                <table id="tabelabsen" class="stripe" style="width:100%">
                                    <!-- head -->
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Presensi</th>
                                            <th>Waktu</th>
                                            <th>Deskripsi</th>
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
                                                    Carbon\Carbon::createFromTimeString($li->timestart)->format('H:i:s') < Carbon\Carbon::now()->format('H:i:s') &&
                                                    $li->status_presensi == 0)
                                                <tr>
                                                    <td>{{ $no++ }}</td>

                                                    <td>
                                                        <div class="dropdown dropdown-right dropdown-end">
                                                            <label tabindex="0" class="btn btn-info m-1">Isi
                                                                🖋</label>
                                                            <ul tabindex="0"
                                                                class="dropdown-content menu p-2 shadow bg-base-100 rounded-box w-52">

                                                                <form action="/presensi" method="post">
                                                                    @csrf
                                                                    <input type="hidden" name="ket"
                                                                        value="1">
                                                                    <input type="hidden" name="pres_id"
                                                                        value="{{ $li->id }}">
                                                                    <li class="">
                                                                        <input type="submit" value="Hadir"
                                                                            class="flex flex-col items-center justify-center hover:bg-success">
                                                                    </li>
                                                                </form>

                                                                <form action="/presensi" method="post">
                                                                    @csrf
                                                                    <input type="hidden" name="ket"
                                                                        value="3">
                                                                    <input type="hidden" name="pres_id"
                                                                        value="{{ $li->id }}">
                                                                    <li>
                                                                        <input type="submit" value="Ijin"
                                                                            class="flex flex-col items-center justify-center hover:bg-warning">
                                                                    </li>
                                                                </form>

                                                                <form action="/presensi" method="post">
                                                                    @csrf
                                                                    <input type="hidden" name="ket"
                                                                        value="2">
                                                                    <input type="hidden" name="pres_id"
                                                                        value="{{ $li->id }}">
                                                                    <li>
                                                                        <input type="submit" value="Sakit"
                                                                            class="flex flex-col items-center justify-center hover:bg-warning">
                                                                    </li>
                                                                </form>

                                                            </ul>
                                                        </div>
                                                    </td>

                                                    <td>
                                                        {{ Carbon\Carbon::parse($li->tanggal)->startOfDay()->locale('id')->toFormattedDayDateString() }}<br>{{ '(' . $li->timestart . ' - ' . $li->timeend . ')' }}
                                                    </td>
                                                    <td>
                                                        {{ $li->ket }}
                                                    </td>
                                                </tr>
                                            @endif
                                        @endforeach
                                        @foreach ($list as $li)
                                            @if (Carbon\Carbon::parse($li->tanggal)->startOfDay() > Carbon\Carbon::now()->startOfDay())
                                                <tr>
                                                    <td>{{ $no++ }}</td>
                                                    <td>
                                                        <button class="btn btn-info">Belum Mulai</button>
                                                    </td>
                                                    <td>
                                                        {{ Carbon\Carbon::parse($li->tanggal)->startOfDay()->locale('id')->toFormattedDayDateString() }}<br>{{ '(' . $li->timestart . ' - ' . $li->timeend . ')' }}
                                                    </td>
                                                    <td>
                                                        {{ $li->ket }}
                                                    </td>
                                                </tr>
                                            @endif
                                        @endforeach
                                        @foreach ($list as $li)
                                            @foreach ($status as $st)
                                                @if ($li->id == $st->presensi_id)
                                                    <tr>
                                                        <td>{{ $no++ }}</td>
                                                        <td>
                                                            <button class="btn btn-warning">Sudah</button>
                                                        </td>
                                                        <td>
                                                            {{ Carbon\Carbon::parse($li->tanggal)->startOfDay()->locale('id')->toFormattedDayDateString() }}<br>{{ '(' . $li->timestart . ' - ' . $li->timeend . ')' }}
                                                        </td>
                                                        <td>
                                                            {{ $li->ket }}
                                                        </td>
                                                    </tr>
                                                @endif
                                            @endforeach
                                        @endforeach
                                        @foreach ($list as $li)
                                            @if (Carbon\Carbon::parse($li->tanggal)->setTimeFrom(Carbon\Carbon::parse($li->timeend)) < Carbon\Carbon::now() &&
                                                    $li->status_presensi == 0)
                                                <tr>
                                                    <td>{{ $no++ }}</td>
                                                    <td>
                                                        <button class="btn btn-secondary">Terlambat</button>
                                                    </td>
                                                    <td>
                                                        {{ Carbon\Carbon::parse($li->tanggal)->startOfDay()->locale('id')->toFormattedDayDateString() }}<br>{{ '(' . $li->timestart . ' - ' . $li->timeend . ')' }}
                                                    </td>
                                                    <td>
                                                        {{ $li->ket }}
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
                        <table id="students" class="mt-3 mb-5 pop-del"
                            @if ($par->user->id == Auth::id()) data-popover-target="popover-del" data-id="{{ $par->user->id }}" data-name="{{ $par->user->name }}" data-kelas="{{ $par->class_id }}" @endif>
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="avatar mx-3">
                                            <div
                                                class="w-8 rounded-full ring ring-primary ring-offset-base-100 ring-offset-2">
                                                <img src="{{ $par->user->url_photo }}" />
                                            </div>
                                        </div>
                                    </td>
                                    <td><span class="uppersize">{{ $par->user->name }}</span></td>
                                    <td>
                                        @if ($par->user->id == Auth::id())
                                            <span class="badge badge-success">You</span>
                                        @endif
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    @endforeach
                </div>
            </div>
        </div>
        <footer class="bg-white rounded-lg shadow m-4 dark:bg-gray-800">
            <div class="w-full max-w-screen-xl mx-auto p-4 md:py-8">
                <span class="block text-sm text-gray-500 sm:text-center dark:text-gray-400">© 2023 <a
                        href="https://prezensia.visit-indonesia.id/" class="hover:underline">Prezensia™</a>. All
                    Rights
                    Reserved.</span>
            </div>
        </footer>
    </div>
    @include('components.unenroll-popover')
    @include('components.unenroll-modal')
    <script>
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
        $(document).ready(function() {
            $('#tabelabsen').DataTable();

            $('.pop-del').hover(function() {
                var id = $(this).data('id')
                var kelas = $(this).data('kelas')
                var name = $(this).data('name')
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
        // Mendapatkan elemen <select> berdasarkan atribut name
        var selectElement = document.querySelector('select[name="tabelabsen_length"]');

        // Mengatur properti style dengan nilai width:50px
        selectElement.style.width = '50px';
    </script>
</x-app-layout>
