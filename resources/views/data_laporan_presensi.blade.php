<x-app-layout>
    @slot('title', 'Report')
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css"> --}}
    {{-- <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css"> --}}
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css"> --}}
    {{-- <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css"> --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
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
                                            fill="currentColor" viewBox="0 0 20 20"
                                            xmlns="http://www.w3.org/2000/svg">
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
            <div class="container bg-white rounded border lg:flex lg:flex-col lg:items-center lg:justify-center ">
                <article class="flex flex-col items-center justify-center prose my-3">
                    <h2 class="h1">Laporan Presensi</h2>
                </article>

                <div class="flex justify-centerrelative overflow-x-auto  my-3 w-4/5">
                    <div class="w-full table-auto">
                        <table id="tabelabsen" class="stripe w-full table-auto" style="width:100%">
                            <!-- head -->
                            <thead>
                                <tr>
                                    <th>No.</th>

                                    <th>Nama</th>
                                    <th>Waktu</th>
                                    <th>Keterangan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- row 1 -->
                                @php
                                    $no = 1;
                                    
                                @endphp


                                @foreach ($data as $d)
                                    <tr>
                                        <td>{{ $no++ }}</td>

                                        <td>

                                            <span
                                                class="text-sm font-weight-normal text-gray-900 truncate dark:text-white">
                                                {{ $d->nama }}
                                            </span>
                                        </td>
                                        <td>

                                            {{ $d->time }}
                                        </td>
                                        <td>

                                            {{ $d->keterangan }}
                                        </td>
                                        <td class="flex">

                                            <div class="dropdown dropdown-left dropdown-end">
                                                <label tabindex="0" class="btn btn-info m-1">Edit
                                                    🖋</label>
                                                <ul tabindex="0"
                                                    class="dropdown-content menu p-2 shadow bg-base-100 rounded-box w-52">

                                                    <form action="/listpresensi/edit" method="post">
                                                        @csrf
                                                        <input type="hidden" name="ket" value="1">
                                                        <input type="hidden" name="pres_id"
                                                            value="{{ $d->id }}">
                                                        <input type="hidden" name="status" value="edit">
                                                        <input type="hidden" name="idp"
                                                            value="{{ $d->presensi_id }}">
                                                        <li class="">
                                                            <input type="submit" value="Hadir"
                                                                class="flex flex-col items-center justify-center hover:bg-success">
                                                        </li>
                                                    </form>

                                                    <form action="/listpresensi/edit" method="post">
                                                        @csrf
                                                        <input type="hidden" name="ket" value="3">
                                                        <input type="hidden" name="pres_id"
                                                            value="{{ $d->id }}">
                                                        <input type="hidden" name="status" value="edit">
                                                        <input type="hidden" name="idp"
                                                            value="{{ $d->presensi_id }}">
                                                        <li>
                                                            <input type="submit" value="Ijin"
                                                                class="flex flex-col items-center justify-center hover:bg-warning">
                                                        </li>
                                                    </form>

                                                    <form action="/listpresensi/edit" method="post">
                                                        @csrf
                                                        <input type="hidden" name="ket" value="2">
                                                        <input type="hidden" name="pres_id"
                                                            value="{{ $d->id }}">
                                                        <input type="hidden" name="status" value="edit">
                                                        <input type="hidden" name="idp"
                                                            value="{{ $d->presensi_id }}">
                                                        <li>
                                                            <input type="submit" value="Sakit"
                                                                class="flex flex-col items-center justify-center hover:bg-warning">
                                                        </li>
                                                    </form>
                                                    <form action="/listpresensi/edit" method="post">
                                                        @csrf
                                                        <input type="hidden" name="ket" value="4">
                                                        <input type="hidden" name="pres_id"
                                                            value="{{ $d->id }}">
                                                        <input type="hidden" name="status" value="edit">
                                                        <input type="hidden" name="idp"
                                                            value="{{ $d->presensi_id }}">
                                                        <li>
                                                            <input type="submit" value="Absen"
                                                                class="flex flex-col items-center justify-center hover:bg-secondary">
                                                        </li>
                                                    </form>

                                                </ul>
                                            </div>



                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
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

</x-app-layout>

<script>
    $(document).ready(function() {
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
        });

    });
    let defaultTab = document.querySelector(".default-tab");
    defaultTab.click();
</script>
