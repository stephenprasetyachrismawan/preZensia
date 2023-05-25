<x-app-layout>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
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
                        <a id="default-tab" href="#first">Tab 1</a></li>
                    <li class="px-4 text-gray-800 font-semibold py-2 rounded-t"><a href="#second">Tab 2</a></li>
                    <li class="px-4 text-gray-800 font-semibold py-2 rounded-t"><a href="#third">Tab 3</a></li>
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
                </div>
                <div id="second" class="hidden p-4">
                    Second tab
                </div>
                <div id="third" class="hidden p-4">
                    Third tab
                </div>
            </div>
        </div>
    </div>

</x-app-layout>

<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
{{-- <script src="https://cdn.datatables.net/1.13.4/js/dataTables.material.min.js"></script> --}}
<script>

    $(document).ready(function () {
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
</script>
