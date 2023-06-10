<x-app-layout>
    @slot('title', 'Classes')
    <div class="container m-auto my-7 max-[640]:m-0">
        <div class="mx-3 px-1">
            @if ($data)
            <div class="{{-- columns-3 sm:columns-1 md:columns-2 lg:columns-3 --}}grid lg:grid-cols-3 gap-4 md:grid-cols-2 sm:grid-cols-1 ">
                    @foreach ($data as $d)
                        <div class="container justify-self-center">
                            <div class="">
                                <div class="stack">

                                    <div class="card w-90 glass mb-2 ">
                                        <div class="card-body">
                                            <div class="card-actions justify-end m-0">
                                                <div class="dropdown dropdown-end">
                                                    <label tabindex="0" class="btn m-1"><i
                                                            class="fa-solid fa-ellipsis-vertical p-0"></i></label>
                                                    <ul tabindex="0"
                                                        class="dropdown-content menu p-2 shadow bg-base-100 rounded-box w-52">
                                                        @if ($d[1]==1)
                                                        <li>
                                                            <button class='archive' data-id='{{ $d[3] }}'
                                                                data-modal-target="archive-modal"
                                                                data-modal-toggle="archive-modal"
                                                                type="button">Archive</button></li>
                                                        <li><a class="analisis" href="{{ route('classes.home', ['id' => $d[3]]) }}">Analisis</a></li>
                                                        @endif</li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <a href="{{ route('classes.home', ['id' => $d[3]]) }}">
                                                <h2 class="card-title">{{ $d[4] }} <span class="underline underline-offset-1">{{ $d[0] }}</span></h2>
                                                <p>Teacher :
                                                    @if ($d[1] == 1)
                                                        <span class="badge badge-success">You</span>
                                                    @else
                                                        <span>{{ Str::limit($d[2], 24, '...') }} </span>
                                                    @endif
                                                </p>
                                            </a>
                                            <div class="card-actions justify-end">
                                                <a class="btn btn-primary" href="{{ route('classes.home', ['id' => $d[3]]) }}">
                                                    @if ($d[1]==1)
                                                    Buat Presensi
                                                    @else
                                                    Lihat Presensi
                                                    @endif
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <img src="https://picsum.photos/id/74/434/290" alt="Image 1"
                                        class="w-80  rounded-box" />
                                </div>
                            </div>
                            <br>
                        </div>
                    @endforeach
                </div>
                @else
                <div class="flex justify-center">
                    <x-emptyStateHome></x-emptyStateHome>
                </div>
                <div class="flex justify-end mt-10 md:mt-10 max-[640]:mt-0">
                    <div class="flex flex-col">
                        <span>No Class? Create or Join Here!</span>
                        <x-arrowState></x-arrowState>
                    </div>
                </div>
                @endif
        </div>
    </div>
    @include('components.classes-dial')
    @include('components.archive-modal')
    @include('components.join-modal')
    <script>
        $(document).ready(function() {
            $('.archive').click(function() {
                var id = $(this).data('id')
                $('#accArch').attr('data-id', id);
            })
            $('#accArch').click(function() {
                var id = $(this).data('id');
                $.ajax({
                    url: '{{ route('classes.archive') }}',
                    method: 'POST',
                    data: {
                        '_token': '{{ csrf_token() }}',
                        'id': id
                    },
                    success: function(response) {
                        if (response.msg == 'success') {
                            Swal.fire('Archive Success', '', 'success').then(function() {
                                window.location.assign('/classes');
                            });
                        }
                    }
                })
            })

        })
        localStorage.removeItem('activeTab');
        $('.analisis').click(function(){
            localStorage.setItem('activeTab', 'laporan-tab')
        })
    </script>
</x-app-layout>
