<x-app-layout>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css"> --}}
    {{-- <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css"> --}}
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css"> --}}
    {{-- <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css"> --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    {{-- <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.material.min.css"> --}}
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-components-web/4.0.0/material-components-web.min.css"> --}}

    <div class="container">
        <div class="rounded border grid w-3/4 mx-auto mt-4">
            <!-- Tabs -->
            <div class="justify-self-center ">
                <ul id="tabs" class="inline-flex pt-2 px-1 w-full border-b">
                    <li
                        class="bg-white px-4 text-gray-800 font-semibold py-2 rounded-t border-t border-r border-l -mb-px">
                        <a id="default-tab" href="#first">Presensi</a>
                    </li>
                    <li class="px-4 text-gray-800 font-semibold py-2 rounded-t"><a href="#second">Partisipan</a></li>
                    <li class="px-4 text-gray-800 font-semibold py-2 rounded-t"><a href="#third">Pengaturan</a></li>
                </ul>
            </div>

            <!-- Tab Contents -->
            <div id="tab-contents">
                <div id="first" class="p-1">
                    <div class="container lg:flex lg:flex-col lg:items-center lg:justify-center">
                        <article class="flex flex-col items-center justify-center prose my-3">
                            <h2 class="h1">Daftar Presensi Anda ..⏳</h2>
                        </article>

                        <div class="relative overflow-x-auto flex my-3">
                            <div class="">
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
                                                                    <input type="hidden" name="ket" value="1">
                                                                    <input type="hidden" name="pres_id"
                                                                        value="{{ $li->id }}">
                                                                    <li class="">
                                                                        <input type="submit" value="Hadir"
                                                                            class="flex flex-col items-center justify-center hover:bg-success">
                                                                    </li>
                                                                </form>

                                                                <form action="/presensi" method="post">
                                                                    @csrf
                                                                    <input type="hidden" name="ket" value="3">
                                                                    <input type="hidden" name="pres_id"
                                                                        value="{{ $li->id }}">
                                                                    <li>
                                                                        <input type="submit" value="Ijin"
                                                                            class="flex flex-col items-center justify-center hover:bg-warning">
                                                                    </li>
                                                                </form>

                                                                <form action="/presensi" method="post">
                                                                    @csrf
                                                                    <input type="hidden" name="ket" value="2">
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
                                            @if (Carbon\Carbon::parse($li->tanggal)->setTimeFrom(Carbon\Carbon::parse($li->timeend)) < Carbon\Carbon::now())
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
                                        {{-- @php $no = 1
                                            @endphp
                                        @foreach ($list as $li)
                                        @foreach ($status as $st)
                                        <tr>
                                            <td>{{$no++}}</td>
                                                    @if ($li->id == $st->presensi_id)
                                                    <td>
                                                        <button class="btn btn-warning">Sudah</button>
                                                    </td>
                                                    @elseif(Carbon\Carbon::parse($li->tanggal)->setTimeFrom(Carbon\Carbon::parse($li->timeend)) < Carbon\Carbon::now()) <td>
                                                        <button class="btn btn-secondary">Terlambat</button>
                                                        </td>
                                                        @elseif(Carbon\Carbon::parse($li->tanggal)->startOfDay() > Carbon\Carbon::now()->startOfDay())
                                                        <td>
                                                            <button class="btn btn-info">Belum Mulai</button>
                                                        </td>
                                                        @else
                                                        <td>
                                                            <div class="dropdown dropdown-right dropdown-end">
                                                                <label tabindex="0" class="btn btn-info m-1">Isi 🖋</label>
                                                                <ul tabindex="0" class="dropdown-content menu p-2 shadow bg-base-100 rounded-box w-52">

                                                                    <form action="/presensi" method="post">
                                                                        @csrf
                                                                        <input type="hidden" name="ket" value="hadir">
                                                                        <li class="">
                                                                            <input type="submit" value="Hadir" class="flex flex-col items-center justify-center hover:bg-success">
                                                                        </li>
                                                                    </form>

                                                                    <form action="/presensi" method="post">
                                                                        @csrf
                                                                        <input type="hidden" name="ket" value="ijin">
                                                                        <li>
                                                                            <input type="submit" value="Ijin" class="flex flex-col items-center justify-center hover:bg-warning">
                                                                        </li>
                                                                    </form>

                                                                    <form action="/presensi" method="post">
                                                                        @csrf
                                                                        <input type="hidden" name="ket" value="sakit">
                                                                        <li>
                                                                            <input type="submit" value="Sakit" class="flex flex-col items-center justify-center hover:bg-warning">
                                                                        </li>
                                                                    </form>

                                                                </ul>
                                                            </div>
                                                        </td>
                                                        @endif
                                                        <td>{{Carbon\Carbon::parse($li->tanggal)->startOfDay()->locale('id')->toFormattedDayDateString()}}<br>{{'('.$li->timestart.' - '.$li->timeend.')'}}</td>
                                                        <td>{{$li->ket}}</td>
                                                        </tr>
                                                        @endforeach
                                                        @endforeach --}}
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="second" class="hidden p-4">

                </div>
                <div id="third" class="hidden p-4">

                </div>
            </div>
        </div>
    </div>

</x-app-layout>
<script>
    $(document).ready(function() {
        $('#tabelabsen').DataTable();
    });
    // Mendapatkan elemen <select> berdasarkan atribut name
    var selectElement = document.querySelector('select[name="tabelabsen_length"]');

    // Mengatur properti style dengan nilai width:50px
    selectElement.style.width = '50px';
</script>
<script>
    let tabsContainer = document.querySelector("#tabs");

    let tabTogglers = tabsContainer.querySelectorAll("#tabs a");

    console.log(tabTogglers);

    tabTogglers.forEach(function(toggler) {
        toggler.addEventListener("click", function(e) {
            e.preventDefault();

            let tabName = this.getAttribute("href");

            let tabContents = document.querySelector("#tab-contents");

            for (let i = 0; i < tabContents.children.length; i++) {

                tabTogglers[i].parentElement.classList.remove("border-t", "border-r", "border-l",
                    "-mb-px", "bg-white");
                tabContents.children[i].classList.remove("hidden");
                if ("#" + tabContents.children[i].id === tabName) {
                    continue;
                }
                tabContents.children[i].classList.add("hidden");

            }
            e.target.parentElement.classList.add("border-t", "border-r", "border-l", "-mb-px",
                "bg-white");
        });
    });
    let defaultTab = document.querySelector("#default-tab");
    defaultTab.click();
</script>
