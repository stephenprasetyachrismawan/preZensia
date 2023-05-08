<x-app-layout>

    <div class="container m-auto my-7">
        <div class="mx-3 px-1">
            <a href="{{ route('classes.create') }}" class="btn btn-primary">Tambah Kelas</a>
            <a href="{{ route('classes.join') }}" class="btn btn-primary">Join Kelas</a>
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
                                                <li><a>Setting</a></li>
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
                                <img src="https://picsum.photos/id/74/434/290" alt="Image 1"
                                    class="w-80  rounded-box" />
                                </div>
                            </div>
                        <br>
                    </div>
                @endforeach


                <div></div>
                <div></div>

            </div>
        </div>

    </div>
</x-app-layout>
