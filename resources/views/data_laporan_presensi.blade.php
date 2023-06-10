<x-app-layout>
    @slot('title', 'Report')
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css"> --}}
    {{-- <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css"> --}}
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css"> --}}
    {{-- <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css"> --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    {{-- <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.material.min.css"> --}}
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-components-web/4.0.0/material-components-web.min.css"> --}}

    <div class="container">
        <div class="rounded border grid w-3/4 mx-auto mt-4">
            <div class="container lg:flex lg:flex-col lg:items-center lg:justify-center ">
                <article class="flex flex-col items-center justify-center prose my-3">
                    <h2 class="h1">Daftar Presensi Anda ..⏳</h2>
                </article>

                <div class="flex justify-centerrelative overflow-x-auto  my-3 w-4/5">
                    <div class="w-full table-auto">
                        <table id="tabelabsen" class="stripe w-full table-auto" style="width:100%">
                            <!-- head -->
                            <thead>
                                <tr>
                                    <th>No.</th>

                                    <th>Nama</th>
                                    <th>Waktu</th>
                                    <th>Keterangan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- row 1 -->
                                @php
                                    $no = 1;
                                    
                                @endphp


                                @foreach ($data as $d)
                                    <tr>
                                        <td>{{ $no++ }}</td>

                                        <td>

                                            <span
                                                class="text-sm font-weight-normal text-gray-900 truncate dark:text-white">
                                                {{ $d->nama }}
                                            </span>
                                        </td>
                                        <td>

                                            {{ $d->time }}
                                        </td>
                                        <td>

                                            {{ $d->keterangan }}
                                        </td>
                                        <td class="flex">

                                            <div class="dropdown dropdown-left dropdown-end">
                                                <label tabindex="0" class="btn btn-info m-1">Edit
                                                    🖋</label>
                                                <ul tabindex="0"
                                                    class="dropdown-content menu p-2 shadow bg-base-100 rounded-box w-52">

                                                    <form action="/listpresensi/edit" method="post">
                                                        @csrf
                                                        <input type="hidden" name="ket" value="1">
                                                        <input type="hidden" name="pres_id"
                                                            value="{{ $d->id }}">
                                                        <input type="hidden" name="status" value="edit">
                                                        <input type="hidden" name="idp"
                                                            value="{{ $d->presensi_id }}">
                                                        <li class="">
                                                            <input type="submit" value="Hadir"
                                                                class="flex flex-col items-center justify-center hover:bg-success">
                                                        </li>
                                                    </form>

                                                    <form action="/listpresensi/edit" method="post">
                                                        @csrf
                                                        <input type="hidden" name="ket" value="3">
                                                        <input type="hidden" name="pres_id"
                                                            value="{{ $d->id }}">
                                                        <input type="hidden" name="status" value="edit">
                                                        <input type="hidden" name="idp"
                                                            value="{{ $d->presensi_id }}">
                                                        <li>
                                                            <input type="submit" value="Ijin"
                                                                class="flex flex-col items-center justify-center hover:bg-warning">
                                                        </li>
                                                    </form>

                                                    <form action="/listpresensi/edit" method="post">
                                                        @csrf
                                                        <input type="hidden" name="ket" value="2">
                                                        <input type="hidden" name="pres_id"
                                                            value="{{ $d->id }}">
                                                        <input type="hidden" name="status" value="edit">
                                                        <input type="hidden" name="idp"
                                                            value="{{ $d->presensi_id }}">
                                                        <li>
                                                            <input type="submit" value="Sakit"
                                                                class="flex flex-col items-center justify-center hover:bg-warning">
                                                        </li>
                                                    </form>
                                                    <form action="/listpresensi/edit" method="post">
                                                        @csrf
                                                        <input type="hidden" name="ket" value="4">
                                                        <input type="hidden" name="pres_id"
                                                            value="{{ $d->id }}">
                                                        <input type="hidden" name="status" value="edit">
                                                        <input type="hidden" name="idp"
                                                            value="{{ $d->presensi_id }}">
                                                        <li>
                                                            <input type="submit" value="Absen"
                                                                class="flex flex-col items-center justify-center hover:bg-secondary">
                                                        </li>
                                                    </form>

                                                </ul>
                                            </div>



                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

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
        });

    });
    let defaultTab = document.querySelector(".default-tab");
    defaultTab.click();
</script>
