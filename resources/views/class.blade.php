<x-app-layout>

    <div class="container m-auto my-7">
        <div class="mx-3 px-1">
            <div class="{{-- columns-3 sm:columns-1 md:columns-2 lg:columns-3 --}}grid lg:grid-cols-3 gap-4 md:grid-cols-2 sm:grid-cols-1 ">
                @if ($data)
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
                                                        <li><a>Analisis</a></li>
                                                        @endif</li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <a href="{{ route('classes.home', ['id' => $d[3]]) }}">
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
                @endif
            </div>
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
    </script>
</x-app-layout>
