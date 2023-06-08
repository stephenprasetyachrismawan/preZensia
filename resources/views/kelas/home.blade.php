    <x-app-layout>

        {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css"> --}}
        {{-- <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css"> --}}
        {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css"> --}}
        {{-- <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css"> --}}
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
        <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.0/dist/trix.css">
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
                        <li class="px-4 text-gray-800 font-semibold py-2 rounded-t"><a href="#second"
                                class="tab2">Partisipan</a></li>
                        <li class="px-4 text-gray-800 font-semibold py-2 rounded-t"><a href="#third"
                                class="tab3">Laporan</a></li>
                    </ul>
                </div>

                <!-- Tab Contents -->
                <div id="tab-contents">
                    <div id="first" class="p-4 ">

                        <form action="{{ route('buatpresensi.store') }}" method="post" class="form-control hidden"
                            id="formbuat">
                            @csrf
                            <div class="grid place-items-center">

                                <div
                                    class="w-full max-w-lg  p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-6 md:p-8 dark:bg-gray-800 dark:border-gray-700 ">
                                    <form class="space-y-6" action="#">
                                        <h5 class="text-xl font-medium text-gray-900 dark:text-white m-3">Buat Presensi
                                            Baru
                                        </h5>
                                        <div>
                                            <label for="tanggal"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal</label>

                                            <div class="relative max-w-sm">
                                                <div
                                                    class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                                    <svg aria-hidden="true"
                                                        class="w-5 h-5 text-gray-500 dark:text-gray-400"
                                                        fill="currentColor" viewBox="0 0 20 20"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd"
                                                            d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                                            clip-rule="evenodd"></path>
                                                    </svg>
                                                </div>
                                                <input datepicker type="date" id="tanggal" name="mulai"
                                                    value="" required
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                    placeholder="Tanggal">
                                            </div>
                                        </div>
                                        <div>
                                            <label for="timemulai"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Dimulai</label>
                                            <input type="time" id="timemulai" name="jammulai" value=""
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-1/5 px-5 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                required>
                                        </div>
                                        <div>
                                            <label for="timeakhir"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Diakhiri</label>
                                            <input type="time" id="timeakhir" name="jamakhir" value=""
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-1/5 px-5 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                required>
                                        </div>
                                        <div>
                                            <label for="message"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Deskripsi</label>
                                            <textarea id="message" rows="3" required name="ket"
                                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                placeholder="Yang Anda pikirkan..."></textarea>
                                        </div>
                                        <div>

                                            <label class="relative inline-flex items-center cursor-pointer m-3 ">
                                                <input type="checkbox" id="toggle" value="true"
                                                    class="sr-only peer" name="ulangi">
                                                <div
                                                    class=" w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600">
                                                </div>
                                                <div>
                                                    <span
                                                        class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-300 ">Ulangi?</span>

                                                </div>

                                            </label>

                                            <div id="textDiv" class="hidden">
                                                <div>
                                                    <input type="radio" name="setiap" id="hari"
                                                        class="radio radio-info" value="hari" /><label
                                                        for="hari">Setiap Hari</label>

                                                </div>
                                                <div>
                                                    <input type="radio" id="minggu" name="setiap"
                                                        class="radio radio-info" value="minggu" /><label
                                                        for="minggu">Setiap Minggu</label>

                                                </div>
                                                <div>
                                                    <input type="radio" name="setiap" id="bulan"
                                                        class="radio radio-info" value="bulan" /><label
                                                        for="bulan">Setiap Bulan</label>
                                                </div>
                                            </div>
                                            <div class="hidden" id="kalihari"><label for="jumlah">Sampai
                                                </label><input type="number" name="jumlah" id="jumlah"
                                                    value="1" min="1" max="365" width="10px"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500  w-1/5 px-5 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                <label for="jumlah"> kali</label>
                                            </div>
                                        </div>
                                        <input type="hidden" name="idkelas" value="{{ $idk }}">
                                        {{-- <button type="submit">Kirim</button> --}}
                                        <input type="submit" class="btn btn-primary" value="Buat">
                                    </form>
                                </div>





                            </div>



                        </form>
                        <div class="container w-4/5 mx-24">
                            <label class="relative inline-flex items-center cursor-pointer m-3 ">
                                <input type="checkbox" id="tambah" value="true" class="sr-only peer"
                                    name="ulangi">
                                <div
                                    class=" w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600">
                                </div>
                                <div>
                                    <span
                                        class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-300 ">Tambah?</span>

                                </div>

                            </label>
                        </div>
                        <div class="container lg:flex lg:flex-col lg:items-center lg:justify-center ">
                            <article class="flex flex-col items-center justify-center prose my-3">
                                <h2 class="h1">Daftar Presensi Anda ..⏳</h2>
                            </article>

                            <div class="relative overflow-x-auto flex my-3 w-4/5">
                                <div class="w-full table-auto">
                                    <table id="tabelabsen" class="stripe w-full table-auto" style="width:100%">
                                        <!-- head -->
                                        <thead>
                                            <tr>
                                                <th>No.</th>

                                                <th>Waktu</th>
                                                <th>Deskripsi</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!-- row 1 -->
                                            @php
                                                $no = 1;
                                                
                                            @endphp


                                            @foreach ($list as $li)
                                                <tr>
                                                    <td>{{ $no++ }}</td>

                                                    <td>
                                                        {{ Carbon\Carbon::parse($li->tanggal)->startOfDay()->locale('id')->toFormattedDayDateString() }}<br>{{ '(' . $li->timestart . ' - ' . $li->timeend . ')' }}
                                                    </td>
                                                    <td>
                                                        {{ $li->ket }}
                                                    </td>
                                                    <td class="flex">

                                                        <button tabindex="0" data-id={{ $li->id }}
                                                            data-tanggal="{{ $li->tanggal }}"
                                                            data-timestart="{{ $li->timestart }}"
                                                            data-timeend="{{ $li->timeend }}"
                                                            data-ket="{{ $li->ket }}"
                                                            class="btn btn-info m-1 edit-btn"
                                                            data-modal-target="updateModal"
                                                            data-modal-toggle="updateModal"><i
                                                                class="fa-solid fa-pen-to-square"></i></button>
                                                        <button class="btn btn-secondary m-1 btnhapus"
                                                            data-id="{{ $li->id }}"
                                                            data-modal-target="hapus-modal"
                                                            data-modal-toggle="hapus-modal">
                                                            <i class="fa-solid fa-trash-can"
                                                                style="color: #ffffff;"></i>
                                                            <form action="/realtime" method="post">
                                                                @csrf
                                                                <input type="hidden" name="id_presensi"
                                                                    value="{{ $li->id }}">
                                                                <button type="submit"
                                                                    class="btn btn-primary m-1 btnhapus">
                                                                    <i
                                                                        class="fa-solid fa-arrows-rotate fa-spin"></i></i>
                                                                </button>
                                                            </form>


                                                            <a href="{{ route('laporan', $li->id) }}"><button
                                                                    type="submit"
                                                                    class="btn btn-primary m-1 btnhapus">
                                                                    <i
                                                                        class="fa-solid fa-database fa-beat"></i></i></i>

                                                                </button>
                                                            </a>






                                                    </td>
                                                </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="second" class="hidden p-4">
                        <p
                            class="mb-4 text-lg leading-none tracking-tight text-gray-900 md:text-3xl lg:text-4xl dark:text-white">
                            Teacher</p>
                        <table id="teacher" class="text-center">
                            <tbody>
                                @foreach ($part as $par)
                                    @if ($par->roles->role == 'Student')
                                        @php
                                            continue;
                                        @endphp;
                                    @endif
                                    <hr class="mb-2">
                                    <tr>
                                        <td>
                                            <div class="avatar mx-3">
                                                <div
                                                    class="w-8 rounded-full ring ring-primary ring-offset-base-100 ring-offset-2">
                                                    <img src="{{ $par->user->url_photo }}" />
                                                </div>
                                            </div>
                                        </td>
                                        <td>{{ $par->user->name }}</td>
                                        <td>
                                            @if ($par->user->id == Auth::id())
                                                <span class="badge badge-success">You</span>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <p
                            class="mt-5 mb-4 text-lg leading-none tracking-tight text-gray-600 md:text-3xl lg:text-4xl dark:text-white">
                            Students</p>
                        @foreach ($part as $par)
                            @if ($par->roles->role == 'Teacher')
                                @php
                                    continue;
                                @endphp;
                            @endif
                            <hr class="mb-5">
                            <table id="students" class="mt-3 mb-5">
                                <tbody>
                                    <tr class="pop-del" data-popover-target="popover-del" data-id="{{ $par->user->id }}"
                                        data-name="{{ $par->user->name }}"
                                        data-kelas="{{ $par->class_id }}">
                                        <td>
                                            <div class="avatar mx-3">
                                                <div
                                                    class="w-8 rounded-full ring ring-primary ring-offset-base-100 ring-offset-2">
                                                    <img src="{{ $par->user->url_photo }}" />
                                                </div>
                                            </div>
                                        </td>
                                        <td>{{ $par->user->name }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        @endforeach
                    </div>
                    <div id="third" class="hidden p-4 t3 tab">
                        <div id="chart"></div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Modal Hapus --}}

        @include('components.hapus-modal')


        <!-- Main modal -->
        @include('components.update-modal')
        @include('components.unenroll-popover')
        @include('components.unenroll-modal')
    </x-app-layout>

    <script>
        $(document).ready(function() {

            // Inisialisasi DataTables pada tabel
            $('#tabelabsen').DataTable({
                buttons: ['copy', 'csv', 'print', 'excel', 'pdf', 'colvis'],
                dom: "<'row'<'col-md-3'l><'col-md-5'B><'col-md-4'f>>" +
                    "<'row'<'col-md-12'tr>>" +
                    "<'row'<'col-md-5'i><'col-md-7'p>>",
                lengthMenu: [
                    [5, 10, 25, 50, 100, -1],
                    [5, 10, 25, 50, 100, "All"]
                ],
                "columnDefs": [{
                    "width": "40%",
                    "targets": 3
                }]
            });
            $('.btnhapus').click(function() {
                var id = $(this).data('id');
                $('#dell').attr('data-id', id);
                console.log(id);

            })
            $('#dell').click(function() {
                var id = $(this).data('id');

                console.log(id);
                $.ajax({
                    url: "{{ route('presensi.delete') }}",
                    type: 'POST',
                    data: {
                        '_token': '{{ csrf_token() }}',
                        'id': id,

                    },
                    success: function(response) {
                        if (response.msg == 'success') {
                            Swal.fire('Berhasil dihapus', '', 'success').then(function() {
                                window.location.reload();
                            });
                        }
                    }
                });
            })

            // Menangkap klik tombol Edit dan menampilkan modal
            $('.edit-btn').click(function() {
                var id = $(this).data('id');
                var tanggal = $(this).data('tanggal');
                var timestart = $(this).data('timestart');
                var timeend = $(this).data('timeend');
                var ket = $(this).data('ket');
                console.log(timestart);
                console.log(id);
                $('.tanggal').val(tanggal);
                $('.start').val(timestart);
                $('.end').val(timeend);
                $('.kete').val(ket);
                $('.id_pres').val(id);

                $.ajax({
                    url: '/presensi/edit',
                    type: 'POST',

                    success: function(response) {
                        $('#updateModal .modal-content').html(response);
                        $('#updateModal').modal('show');
                    }
                });
            });

            $('.pop-del').hover(function() {
                var id = $(this).data('id')
                var kelas = $(this).data('kelas')
                var name = $(this).data('name')
                console.log(id)
                $('.unenroll').attr('data-id', id)
                $('.unenroll').attr('data-kelas', kelas)
                $('.name').text(name)
            })

            $('.unenroll').click(function() {
                var id = $(this).data('id')
                var kelas = $(this).data('kelas')
                $('#accUnen').attr('data-id', id)
                $('#accUnen').attr('data-kelas', kelas)
            })

            $('#accUnen').click(function() {
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
        });
    </script>

    <script>
        const tambah = document.getElementById("tambah");
        const formbuat = document.getElementById("formbuat");

        tambah.addEventListener("click", () => {
            if (tambah.checked) {
                formbuat.style.display = "block";
            } else {
                formbuat.style.display = "none";
            }
        });
        const toggle = document.getElementById("toggle");
        const text = document.getElementById("textDiv");
        const kali = document.getElementById("kalihari");

        toggle.addEventListener("click", () => {
            if (toggle.checked) {
                text.style.display = "block";
                kali.style.display = "block"
            } else {
                text.style.display = "none";
                kali.style.display = "none";
            }
        });
        // const toggle2 = document.getElementById("hari");
        // const text2 = document.getElementById("kalihari");

        // toggle2.addEventListener("click", () => {
        //     if (toggle2.checked) {
        //         text2.style.display = "block";
        //     } else {
        //         text2.style.display = "none";
        //     }
        // });
        // const toggle3 = document.getElementById("minggu");
        // const text3 = document.getElementById("kaliminggu");

        // toggle3.addEventListener("click", () => {
        //     if (toggle3.checked) {
        //         text3.style.display = "block";
        //     } else {
        //         text3.style.display = "none";
        //     }
        // });
        let tabsContainer = document.querySelector("#tabs");

        let tabTogglers = tabsContainer.querySelectorAll("#tabs a");

        console.log(tabTogglers);

        tabTogglers.forEach(function(toggler) {
            toggler.addEventListener("click", function(e) {
                e.preventDefault();
                let harielem = document.getElementById("hari");
                let mingguelem = document.getElementById("minggu");
                let bulanelem = document.getElementById("bulan");
                harielem.toggleAttribute("required");
                mingguelem.toggleAttribute("required");
                bulanelem.toggleAttribute("required");
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

        $(document).ready(function() {
            $('#tabelpartisipan').DataTable({

            });

            $.ajax({
                url: '{{ route('chartReq') }}',
                method: 'POST',
                data: {
                    '_token': '{{ csrf_token() }}',
                    'cls_id': '{{ $idk }}'
                },
                dataType: 'json',
                success: function(resp) {
                    data = [];
                    cat = [];
                    for (i = 1; i <= resp.count; i++) {
                        data.push(resp['cnt' + i]);
                        cat.push(resp['tgl' + i]);
                    }
                    var options = {
                        chart: {
                            type: 'line'
                        },
                        series: [{
                            name: 'hadir',
                            data: data
                        }],
                        xaxis: {
                            categories: cat
                        }
                    };

                    var chart = new ApexCharts(document.querySelector("#chart"), options);
                    chart.render();
                },
                error: function(data) {
                    console.log("ERROR".concat(data));
                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#tabelabsen').DataTable();
        });
        // Mendapatkan elemen <select> berdasarkan atribut name
        var selectElement = document.querySelector('select[name="tabelabsen_length"]');

        // Mengatur properti style dengan nilai width:50px
        selectElement.style.width = '50px';
    </script>
    <script type="text/javascript">
        $('.show_confirm').click(function(event) {

            var form = $(this).closest("form");

            var name = $(this).data("name");
            console.log(name);
            event.preventDefault();

            swal({

                    title: `Are you sure you want to delete this record?`,

                    text: "If you delete this, it will be gone forever.",

                    icon: "warning",

                    buttons: true,

                    dangerMode: true,

                })

                .then((willDelete) => {

                    if (willDelete) {

                        form.submit();

                    }

                });

        });
        $('.tab1').click(function(event) {
            $(this).toggleClass('default-tab');
        })
        let defaultTab = document.querySelector(".default-tab");
        defaultTab.click();
        var element = document.querySelector(".trix-editor")
        element.editor // is a Trix.Editor instance
    </script>
