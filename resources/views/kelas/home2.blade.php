<x-app-layout>
    <div class="container">
        <div class="rounded border grid w-3/4 mx-auto mt-4">
            <!-- Tabs -->
            <div class="justify-self-center ">
                <ul id="tabs" class="inline-flex pt-2 px-1 w-full border-b">
                    <li class="bg-white px-4 text-gray-800 font-semibold py-2 rounded-t border-t border-r border-l -mb-px">
                        <a id="default-tab" href="#first">Presensi</a></li>
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
                                <table id="tabelabsen" class="display table table-auto table-zebra ">
                                    <!-- head -->
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>Presensi</th>
                                            <th>Waktu</th>
                                            <th>Deskripsi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- row 1 -->
                                        @php $no = 1
                                        @endphp
                                        @forEach($list as $li)
                                        @forEach($status as $st)
                                        <tr>
                                            <td>{{$no++}}</td>
                                            @if($li->id == $st->presensi_id)
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
                                        @endforeach
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

                tabTogglers[i].parentElement.classList.remove("border-t", "border-r", "border-l"
                    , "-mb-px", "bg-white");
                tabContents.children[i].classList.remove("hidden");
                if ("#" + tabContents.children[i].id === tabName) {
                    continue;
                }
                tabContents.children[i].classList.add("hidden");

            }
            e.target.parentElement.classList.add("border-t", "border-r", "border-l", "-mb-px"
                , "bg-white");
        });
    });
    let defaultTab = document.querySelector("#default-tab");
    defaultTab.click();

</script>
