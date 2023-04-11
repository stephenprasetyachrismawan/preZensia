<x-app-layout>
    <div class="drawer drawer-mobile ">
        <input id="my-drawer-2" type="checkbox" class="drawer-toggle" />

        <div class="drawer-content  m-3 lg:flex lg:flex-col lg:items-center lg:justify-center">
            <!-- Page content here -->
            <div class="m-3 flex flex-col items-start justify-start">
                <label for="my-drawer-2" class="btn btn-primary drawer-button lg:hidden"><i
                        class="fa-solid fa-list-ul"></i></label>
            </div>
            <article class="m-3 my-10 flex flex-col items-center justify-center prose">
                <h2 class="h1">Daftar Presensi Anda ..⏳</h2>
            </article>
            <div class="m-3 relative overflow-x-auto flex">
                <div class=" overflow-x">
                    <table class="table table-auto overflow-scroll table-zebra w-full block">
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
                            <tr>
                                <th>1</th>
                                <td>
                                    <div class="dropdown dropdown-right">

                                        <button class="btn btn-secondary">Terlambat</button>
                                    </div>
                                </td>
                                <td>06/04/2023 (11.00 - 12.00)</td>
                                <td>Menguji pemahaman</td>
                            </tr>
                            <!-- row 2 -->
                            <tr>
                                <th>2</th>
                                <td>
                                    <div class="dropdown dropdown-right">

                                        <button class="btn btn-warning">Sudah</button>
                                    </div>
                                </td>
                                <td>06/04/2023 (11.00 - 12.00)</td>
                                <td>Menguji pemahaman</td>
                            </tr>
                            <!-- row 3 -->
                            <tr>
                                <th>3</th>

                                <td>
                                    <div class="dropdown dropdown-right dropdown-end">
                                        <label tabindex="0" class="btn btn-info m-1">Isi 🖋</label>
                                        <ul tabindex="0"
                                            class="dropdown-content menu p-2 shadow bg-base-100 rounded-box w-52">



                                            <form action="/presensi" method="post">
                                                @csrf
                                                <input type="hidden" name="ket" value="hadir">
                                                <li class="">
                                                    <input type="submit" value="Hadir"
                                                        class="flex flex-col items-center justify-center hover:bg-success">
                                                </li>
                                            </form>





                                            <form action="/presensi" method="post">
                                                @csrf
                                                <input type="hidden" name="ket" value="ijin">
                                                <li>
                                                    <input type="submit" value="Ijin"
                                                        class="flex flex-col items-center justify-center hover:bg-warning">
                                                </li>
                                            </form>





                                            <form action="/presensi" method="post">
                                                @csrf
                                                <input type="hidden" name="ket" value="sakit">
                                                <li>
                                                    <input type="submit" value="Sakit"
                                                        class="flex flex-col items-center justify-center hover:bg-warning">
                                                </li>
                                            </form>



                                        </ul>
                                    </div>
                                </td>
                                <td>06/04/2023 (11.00 - 12.00)</td>
                                <td>Menguji pemahaman</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>


        <div class="drawer-side ">
            <label for="my-drawer-2" class="drawer-overlay"></label>
            <ul class="menu p-4 w-80 bg-accent text-base-content">
                <!-- Sidebar content here -->
                <li><a>Sidebar Item 1</a></li>
                <li><a>Sidebar Item 2</a></li>
            </ul>

        </div>
    </div>

</x-app-layout>
