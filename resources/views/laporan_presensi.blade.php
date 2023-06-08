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
    <div class="drawer drawer-mobile ">
        <input id="my-drawer-2" type="checkbox" class="drawer-toggle" />

        <div class="drawer-content  m-3 lg:flex lg:flex-col lg:items-center lg:justify-center">
            <!-- Page content here -->
            <div class="m-3 flex flex-col items-start justify-start">
                <label for="my-drawer-2" class="btn btn-primary drawer-button lg:hidden"><i
                        class="fa-solid fa-list-ul"></i></label>
            </div>
            <article class="m-3 my-10 flex flex-col items-center justify-center prose">
                <h2 class="h1">Data Realtime Presensi ..⏳</h2>
            </article>
            <div class="m-1 relative overflow-x-auto flex">

                <div
                    class="max-w-lg p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700 overflow-y-auto">
                    <div class="flex items-center justify-between mb-4">
                        <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white">Realtime Report</h5>
                        <a href="#" class="text-sm font-medium text-blue-600 hover:underline dark:text-blue-500">
                            View all
                        </a>
                    </div>
                    <div class="flow-root ">
                        <ul role="list" class="divide-y divide-gray-200 dark:divide-gray-700" id="square">
                            @foreach ($data as $d)
                                <li class="py-3 sm:py-4">
                                    <div class="flex items-center space-x-4">
                                        <div class="flex-shrink-0">
                                            <img class="w-8 h-8 rounded-full"
                                                src="/docs/images/people/profile-picture-1.jpg" alt="Neil image">
                                        </div>
                                        <div class="flex-1 min-w-0">
                                            <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                                Irfan Sims
                                            </p>
                                            <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                                email@windster.com
                                            </p>
                                        </div>
                                        <div
                                            class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                                            Hadir
                                        </div>
                                        <div
                                            class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                                            27/10/2004 09.40 UTC
                                        </div>
                                    </div>
                                </li>
                            @endforeach

                            <li class="py-3 sm:py-4">
                                <div class="flex items-center space-x-4">
                                    <div class="flex-shrink-0">
                                        <img class="w-8 h-8 rounded-full"
                                            src="/docs/images/people/profile-picture-1.jpg" alt="Neil image">
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                            Neil Sims
                                        </p>
                                        <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                            email@windster.com
                                        </p>
                                    </div>
                                    <div
                                        class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                                        Hadir
                                    </div>
                                    <div
                                        class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                                        27/10/2004 09.40 UTC
                                    </div>
                                </div>
                            </li>
                            <li class="py-3 sm:py-4">
                                <div class="flex items-center space-x-4">
                                    <div class="flex-shrink-0">
                                        <img class="w-8 h-8 rounded-full"
                                            src="/docs/images/people/profile-picture-3.jpg" alt="Bonnie image">
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                            Bonnie Green
                                        </p>
                                        <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                            email@windster.com
                                        </p>
                                    </div>
                                    <div
                                        class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                                        Hadir
                                    </div>
                                    <div
                                        class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                                        27/10/2004 09.40 UTC
                                    </div>
                                </div>
                            </li>
                            <li class="py-3 sm:py-4">
                                <div class="flex items-center space-x-4">
                                    <div class="flex-shrink-0">
                                        <img class="w-8 h-8 rounded-full"
                                            src="/docs/images/people/profile-picture-2.jpg" alt="Michael image">
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                            Michael Gough
                                        </p>
                                        <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                            email@windster.com
                                        </p>
                                    </div>
                                    <div
                                        class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                                        Hadir
                                    </div>
                                    <div
                                        class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                                        27/10/2004 09.40 UTC
                                    </div>
                                </div>
                            </li>
                            <li class="py-3 sm:py-4">
                                <div class="flex items-center space-x-4">
                                    <div class="flex-shrink-0">
                                        <img class="w-8 h-8 rounded-full"
                                            src="/docs/images/people/profile-picture-4.jpg" alt="Lana image">
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                            Lana Byrd
                                        </p>
                                        <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                            email@windster.com
                                        </p>
                                    </div>
                                    <div
                                        class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                                        Hadir
                                    </div>
                                    <div
                                        class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                                        27/10/2004 09.40 UTC
                                    </div>
                                </div>
                            </li>
                            <li class="pt-3 pb-0 sm:pt-4">
                                <div class="flex items-center space-x-4">
                                    <div class="flex-shrink-0">
                                        <img class="w-8 h-8 rounded-full"
                                            src="/docs/images/people/profile-picture-5.jpg" alt="Thomas image">
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                            Thomes Lean
                                        </p>
                                        <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                            email@windster.com
                                        </p>
                                    </div>
                                    <div
                                        class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                                        Hadir
                                    </div>
                                    <div
                                        class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                                        27/10/2004 09.40 UTC
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>


        <div class="drawer-side ">
            <label for="my-drawer-2" class="drawer-overlay"></label>
            <ul class="menu p-4 w-80 bg-accent text-base-content">
                <!-- Sidebar content here -->
                <li><a>Sidebar Item 1</a></li>
                <li><a>Sidebar Item 2</a></li>
            </ul>

        </div>
    </div>

</x-app-layout>
<script></script>
