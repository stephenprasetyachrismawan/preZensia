<script src="https://js.pusher.com/7.2/pusher.min.js"></script>
<script>
    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;

    var pusher = new Pusher('f4be6ffd34f5952ed13b', {
        cluster: 'ap1'
    });

    var channel = pusher.subscribe('privat-presensi{{ Auth::user()->id }}');
    channel.bind('my-event', function(data) {
        const obj = JSON.stringify(data);
        const obj2 = JSON.parse(obj);
        let obj3 = "Stephen";
        let inner =
            `<li class='py-3 sm:py-4'><div class='flex items-center space-x-4'><div class='flex-shrink-0'><img class='w-8 h-8 rounded-full' src=${obj2.message.foto} alt='${obj2.message.nama} image'></div><div class='flex-1 min-w-0'><p class='text-sm font-medium text-gray-900 truncate dark:text-white'>${obj2.message.nama}</p><p class='text-sm text-gray-500 truncate dark:text-gray-400'>${obj2.message.email}</p></div><div class='inline-flex items-center text-base font-semibold text-gray-900 dark:text-white'>${obj2.message.ket}</div><div class='inline-flex items-center text-base font-semibold text-gray-900 dark:text-white'>${obj2.message.waktu}</div></div></li>`;
        let outer = document.getElementById("square");

        outer.insertAdjacentHTML("afterbegin", inner);

    });
</script>


<x-app-layout>
    @slot('title', 'Report')
    <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar" type="button"
        class="inline-flex items-center p-2 mt-2 ml-3 text-sm text-gray-500 rounded-lg md:hidden hover:bg-primary focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-primary-700 dark:focus:ring-gray-600">
        <span class="sr-only">Open sidebar</span>
        <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
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
                    <div data-popover-target='popover-top' data-popover-placement='right' data-popover-trigger="click"
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

                    </div>
                </li>

            </ul>
        </div>
    </aside>

    <div class="p-0 sm:ml-64 h-screen flex flex-col justify-between">
        <div class="grid w-3/4 mx-auto mt-4">
            <article class="m-3 my-10 flex flex-col items-center justify-center">
                <h2 class="text-3xl font-bold">Data Realtime Presensi ..⏳</h2>
            </article>
            <div class="m-1 relative overflow-x-auto flex  justify-center">

                <div
                    class="max-w-lg p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700 overflow-y-auto w-4/5">
                    <div class="flex justify-end">
                        <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                            href="{{ route('laporan', ['id'=> $idp]) }}">
                            {{ __("View Report") }}
                        </a>
                    </div>
                    <div class="flow-root  items-center mb-4 text-center">
                        <span class="text-xl font-bold">
                            Realtime Report
                        </span>
                    </div>
                    <div class="flow-root ">
                        <ul role="list" class="divide-y divide-gray-200 dark:divide-gray-700" id="square">
                            @php
                                $stat = 0;
                            @endphp
                            @foreach ($data as $d)
                                @php
                                    $stat += 1;
                                @endphp
                                <li class="py-3 sm:py-4">
                                    <div class="flex items-center space-x-4">
                                        <div class="flex-shrink-0">
                                            <img class="w-8 h-8 rounded-full" src="{{ $d->foto }}"
                                                alt="{{ $d->nama }} image">
                                        </div>
                                        <div class="flex-1 min-w-0">
                                            <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                                {{ $d->nama }}
                                            </p>
                                            <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                                {{ $d->email }}
                                            </p>
                                        </div>
                                        <div
                                            class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                                            {{ $d->keterangan }}
                                        </div>
                                        <div
                                            class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                                            {{ $d->time }}
                                        </div>
                                    </div>
                                </li>
                            @endforeach


                        </ul>
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




    </div>
    <script>
        setTimeout(() => {
            window.stop()
        }, 5000);
    </script>
</x-app-layout>
