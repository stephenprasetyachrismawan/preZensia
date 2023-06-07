<x-app-layout>
    <div class="container m-auto my-7">
        <div class="mx-3 px-1">
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

                                            </ul>
                                        </div>
                                    </div>
                                    <h2 class="card-title">{{ $d[0] }}</h2>
                                    <p>Teacher :
                                        @if ($d[1] == 1)
                                        <span class="badge badge-success">You</span>
                                        @else
                                        <span>{{ Str::limit($d[2], 24, '...') }} </span>
                                        @endif
                                    </p>
                                    <div class="card-actions justify-end">
                                        <button id='unarchive' class="btn btn-primary" data-id='{{ $d[3] }}' data-modal-target="unarchive-modal" data-modal-toggle="unarchive-modal" type="button">Unarchive</button>
                                    </div>
                                </div>
                            </div>
                            <img src="https://picsum.photos/id/44/4272/2848" alt="Image 1" class="w-80  rounded-box" />
                        </div>
                    </div>
                    <br>
                </div>
                @endforeach
                @endif
            </div>
        </div>
    </div>
    @component('components.unarchive-modal')

    @endcomponent

    <script>
        $(document).ready(function() {
            $('#unarchive').click(function() {
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

    </script>
</x-app-layout>
