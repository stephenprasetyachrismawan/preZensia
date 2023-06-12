<x-app-layout>
    @slot('title', 'Class')
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
            <div class="justify-self-center mb-4 border-b">
                <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="myTab" data-tabs-toggle="#myTabContent" role="tablist">
                    <li class="mr-2" role="presentation">
                        <button class="tab-button inline-block p-4 border-b-2 rounded-t-lg" id="presensi-tab" data-tabs-target="#presensi" type="button" role="tab" aria-controls="presensi" aria-selected="false">Presensi</button>
                    </li>
                    <li class="mr-2" role="presentation">
                        <button class="tab-button inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="partisipan-tab" data-tabs-target="#partisipan" type="button" role="tab" aria-controls="partisipan" aria-selected="false">Partisipan</button>
                    </li>
                </ul>
            </div>

            <!-- Tab Contents -->
            <div id="myTabContent">
                <div class="tab-content hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="presensi" role="tabpanel" aria-labelledby="presensi-tab">
                    <div class="container lg:flex lg:flex-col lg:items-center lg:justify-center">
                        <article class="flex flex-col items-center justify-center prose my-3">
                            <h2 class="h1">Daftar Presensi Anda ..⏳</h2>
                        </article>

                        <div class="relative overflow-x-auto flex my-3 w-4/5">
                            <div class="w-full table-auto">
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
                                            @if (Carbon\Carbon::parse($li->tanggal)->setTimeFrom(Carbon\Carbon::parse($li->timeend)) < Carbon\Carbon::now() &&
                                                    $li->status_presensi == 0)
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
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-content hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="partisipan" role="tabpanel" aria-labelledby="partisipan-tab">
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
                        <table id="students" class="mt-3 mb-5 pop-del" 
                        @if ($par->user->id==Auth::id())
                            data-popover-target="popover-del" data-id="{{ $par->user->id }}" data-name="{{ $par->user->name }}" data-kelas="{{ $par->class_id }}"
                        @endif
                        >
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="avatar mx-3">
                                            <div
                                                class="w-8 rounded-full ring ring-primary ring-offset-base-100 ring-offset-2">
                                                <img src="{{ $par->user->url_photo }}" />
                                            </div>
                                        </div>
                                    </td>
                                    <td><span class="uppersize">{{ $par->user->name }}</span></td>
                                    <td>
                                        @if ($par->user->id==Auth::id())
                                            <span class="badge badge-success">You</span>
                                        @endif
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        @endforeach
                </div>
            </div>
        </div>
    </div>
@include('components.unenroll-popover')
@include('components.unenroll-modal')
<script>
    // Get all tab buttons
    const tabButtons = document.querySelectorAll('.tab-button');

    // Add event listener to each tab button
    tabButtons.forEach((button) => {
        button.addEventListener('click', function () {
            // Remove the 'border-transparent' class from all tab buttons
            tabButtons.forEach((btn) => {
                btn.classList.add('border-transparent');
            });

            // Remove the 'selected' class from all tab buttons
            tabButtons.forEach((btn) => {
                btn.setAttribute('aria-selected', 'false');
            });

            // Add the 'border-transparent' class and 'selected' class to the clicked tab button
            this.classList.remove('border-transparent');
            this.setAttribute('aria-selected', 'true');

            // Store the ID of the active tab in localStorage
            localStorage.setItem('activeTab', this.id);

            // Show the corresponding tab content
            const tabContentId = this.getAttribute('data-tabs-target');
            const tabContent = document.querySelector(tabContentId);
            if (tabContent) {
            // Hide all tab contents
            document.querySelectorAll('.tab-content').forEach((content) => {
                content.style.display = 'none';
            });

            // Show the selected tab content
            tabContent.style.display = 'block';
            }
        });
    });

    // Retrieve the active tab ID from localStorage
    const activeTab = localStorage.getItem('activeTab');

    // If there's an active tab, click on it to trigger the event
    if (activeTab) {
        const activeTabButton = document.getElementById(activeTab);
        if (activeTabButton) {
            activeTabButton.click();
        }
    }
    $(document).ready(function() {
        $('#tabelabsen').DataTable();

        $('.pop-del').hover(function(){
            var id = $(this).data('id')
            var kelas = $(this).data('kelas')
            var name = $(this).data('name')
            $('.unenroll').attr('data-id', id)
            $('.unenroll').attr('data-kelas', kelas)
            $('.name').text(name)
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
    });
    // Mendapatkan elemen <select> berdasarkan atribut name
    var selectElement = document.querySelector('select[name="tabelabsen_length"]');

    // Mengatur properti style dengan nilai width:50px
    selectElement.style.width = '50px';
</script>
</x-app-layout>
