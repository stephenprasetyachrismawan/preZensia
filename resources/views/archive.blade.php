<x-app-layout>
    @slot('title', 'Archive')
    @slot('header', 'Archived Classes')
    <div class="container m-auto my-7 max-[640]:m-0">
        <div class="mx-3 px-1">
            @if($data)
            <div class="{{-- columns-3 sm:columns-1 md:columns-2 lg:columns-3 --}}grid lg:grid-cols-3 gap-4 md:grid-cols-2 sm:grid-cols-1 ">
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
                                                @if ($d[1] == 1)
                                                <li><button class="unarchive" data-id='{{ $d[3] }}' data-modal-target="unarchive-modal" data-modal-toggle="unarchive-modal" type="button">Unarchive</button></li>
                                                <li><button class="btnHapus" data-id='{{ $d[5] }}' data-modal-target="hapus-modal" data-modal-toggle="hapus-modal" type="button">Hapus Kelas</button></li>
                                                @else   
                                                <li><button type="button" class="unenroll" data-modal-target="unenroll-modal" data-modal-toggle="unenroll-modal" data-id="{{ Auth::id() }}"
                                                    data-kelas="{{ $d[5] }}">Unenroll</button></li>
                                                @endif
                                            </ul>
                                        </div>
                                    </div>
                                    <h2 class="card-title">{{ $d[4] }} <span class="underline underline-offset-1">{{ $d[0] }}</h2>
                                    <p>Teacher :
                                        @if ($d[1] == 1)
                                        <span class="badge badge-success">You</span>
                                        @else
                                        <span>{{ Str::limit($d[2], 24, '...') }} </span>
                                        @endif
                                    </p>
                                    @if ($d[1]==1)    
                                    <div class="card-actions justify-end">
                                        <button class="unarchive btn btn-primary" data-id='{{ $d[3] }}' data-modal-target="unarchive-modal" data-modal-toggle="unarchive-modal" type="button">Unarchive</button>
                                    </div>
                                    @else
                                    <div class="card-actions justify-end">
                                        <button class="btn btn-primary cursor-not-allowed focus:outline-none" type="button" disabled>Unarchive</button>
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <img src="https://picsum.photos/id/44/4272/2848" alt="Image 1" class="w-80  rounded-box" />
                        </div>
                    </div>
                    <br>
                </div>
                @endforeach
            </div>
            @else
            <div class="flex justify-center">
                <x-emptyStateArchive class=""></x-emptyStateArchive>
            </div>
            <div class="flex justify-end mt-10 md:mt-10 max-[640]:mt-0">
                <div class="flex flex-col">
                    <span>No Class? Create or Join Here!</span>
                    <div class="flex justify-end">
                        <x-arrowState></x-arrowState>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
    @include('components.unarchive-modal')
    @include('components.classes-dial')
    @include('components.join-modal')
    @include('components.unenroll-modal')
    <x-hapus-modal>{{ __('kelas') }}</x-hapus-modal>

    <script>
        $(document).ready(function() {
            $('.unarchive').click(function() {
                var id = $(this).data('id')
                $('#accUnarch').attr('data-id', id);
            })
            $('#accUnarch').click(function() {
                var id = $(this).data('id');
                $.ajax({
                    url: '{{ route("classes.unarchive") }}'
                    , method: 'POST'
                    , data: {
                        '_token': '{{ csrf_token() }}'
                        , 'id': id
                    }
                    , success: function(response) {
                        if (response.msg == 'success') {
                            Swal.fire('Unarchive Success', '', 'success').then(function() {
                                window.location.assign('/archive');
                            });
                        }
                    }
                })
            })
        })

        $('.unenroll').click(function(){
            var id = $(this).data('id')
            var kelas = $(this).data('kelas')
            $('#accUnen').attr('data-id', id)
            $('#accUnen').attr('data-kelas', kelas)
        })

        $('#accUnen').click(function(){
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

        $('.btnHapus').click(function(){
            var id = $(this).data('id')
            $.ajax({
                url: '{{ route('classes.delete') }}',
                type: 'POST',
                data: {
                    '_token': '{{ csrf_token() }}',
                    'id': id,
                },
                success: function(response) {
                    if (response.msg === 'success') {
                        Swal.fire('Delete Success', '', 'success').then(function() {
                            window.location.reload();
                        });
                    }
                }
            });
        })
    </script>
</x-app-layout>
