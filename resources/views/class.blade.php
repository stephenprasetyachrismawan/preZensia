<x-app-layout>

    <div class="container m-auto my-7">
        <div class="mx-3 px-1">
            <a href="{{ route('classes.create') }}" class="btn btn-primary">Tambah Kelas</a>
            <a href="{{ route('classes.join') }}" class="btn btn-primary">Join Kelas</a>
            <a href="{{ route('archive') }}" class="btn btn-primary">Kelas Archive</a>
            <div class="{{-- columns-3 sm:columns-1 md:columns-2 lg:columns-3 --}}grid lg:grid-cols-3 gap-4 md:grid-cols-2 sm:grid-cols-1 ">
                @if($data)
                @foreach ($data as $d)
                <div class="container justify-self-center">
                    <div class="">
                        <div class="stack">

                            <div class="card w-90 glass mb-2 ">
                                <div class="card-body">
                                    <div class="card-actions justify-end m-0">
                                        <div class="dropdown dropdown-end">
                                            <label tabindex="0" class="btn m-1"><i class="fa-solid fa-ellipsis-vertical p-0"></i></label>
                                            <ul tabindex="0" class="dropdown-content menu p-2 shadow bg-base-100 rounded-box w-52">
                                                <li><button id='archive' data-id='{{ $d[3] }}' data-modal-target="popup-modal" data-modal-toggle="popup-modal" type="button">Archive</button></li>
                                                <li><a>Analisis</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <a href="{{route('classes.home', ['id' => $d[3]])}}">
                                        <h2 class="card-title">{{ $d[0] }}</h2>
                                        <p>Teacher :
                                            @if ($d[1] == 1)
                                            <span class="badge badge-success">You</span>
                                            @else
                                            <span>{{ Str::limit($d[2], 24, '...') }} </span>
                                            @endif
                                        </p>
                                    </a>
                                    <div class="card-actions justify-end">
                                        <button class="btn btn-primary">Buat Presensi</button>
                                    </div>
                                </div>
                            </div>
                            <img src="https://picsum.photos/id/74/434/290" alt="Image 1" class="w-80  rounded-box" />
                        </div>
                    </div>
                    <br>
                </div>
                @endforeach
                @endif
            </div>
        </div>

    </div>
    <div id="popup-modal" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative w-full max-w-md max-h-full">
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-hide="popup-modal">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
                <div class="p-6 text-center">
                    <svg aria-hidden="true" class="mx-auto mb-4 text-gray-400 w-14 h-14 dark:text-gray-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Apakah anda yakin ingin archive kelas ini?</h3>
                    <button data-modal-hide="popup-modal" id="accArch" type="button" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                        Ya
                    </button>
                    <button data-modal-hide="popup-modal" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Cancel</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#archive').click(function() {
                var id = $(this).data('id')
                $('#accArch').attr('data-id', id);
            })
            $('#accArch').click(function() {
                var id = $(this).data('id');
                $.ajax({
                    url: '{{ route("classes.archive") }}'
                    , method: 'POST'
                    , data: {
                        '_token': '{{ csrf_token() }}'
                        , 'id': id
                    }
                    , success: function(response) {
                        if (response.msg == 'success') location.reload()
                    }
                })
            })
        })

    </script>
</x-app-layout>
