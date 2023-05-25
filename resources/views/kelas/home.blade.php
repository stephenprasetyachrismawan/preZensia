<x-app-layout>

    <div class="container">
        <div class="rounded border grid w-3/4 mx-auto mt-4">
            <!-- Tabs -->
            <div class="justify-self-center ">
                <ul id="tabs" class="inline-flex pt-2 px-1 w-full border-b">
                    <li
                        class="bg-white px-4 text-gray-800 font-semibold py-2 rounded-t border-t border-r border-l -mb-px">
                        <a id="default-tab" href="#first">Tab 1</a>
                    </li>
                    <li class="px-4 text-gray-800 font-semibold py-2 rounded-t"><a href="#second">Tab 2</a></li>
                    <li class="px-4 text-gray-800 font-semibold py-2 rounded-t"><a href="#third">Tab 3</a></li>
                    <li class="px-4 text-gray-800 font-semibold py-2 rounded-t"><a href="#fourth">Tab 4</a></li>
                </ul>
            </div>

            <!-- Tab Contents -->
            <div id="tab-contents">
                <div id="first" class="p-4">
                    Buat Presensi
                    <form action="{{ route('buatpresensi.store') }}" method="post" class="form-control">
                        @csrf
                        <div class="form-group">

                            <label for="datetime">Dimulai</label>
                            <input type="datetime-local" id="datetime" name="mulai">
                        </div>
                        <div>
                            <label for="datetime">Diakhiri</label>
                            <input type="datetime-local" id="datetime" name="akhir">
                        </div>
                        <div>

                            <label class="relative inline-flex items-center cursor-pointer">
                                <input type="checkbox" id="toggle" value="true" class="sr-only peer" name="ulangi">
                                <div
                                    class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600">
                                </div>
                                <div>
                                    <span
                                        class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-300 ">Ulangi?</span>

                                </div>

                            </label>

                            <div id="textDiv" class="hidden">
                                <div>
                                    <input type="radio" name="setiap" id="hari" class="radio radio-info"
                                        required value="hari" /><label for="hari">Setiap Hari</label>

                                </div>
                                <div>
                                    <input type="radio" id="minggu" name="setiap" class="radio radio-info"
                                        required value="minggu" /><label for="minggu">Setiap Minggu</label>

                                </div>
                                <div>
                                    <input type="radio" name="setiap" id="bulan" class="radio radio-info"
                                        required value="bulan" /><label for="bulan">Setiap Bulan</label>
                                </div>
                            </div>
                            <div class="hidden" id="kalihari"><label for="jumlah">Sampai </label><input
                                    type="number" name="jumlah" id="jumlah" value="1" min="1"
                                    max="365" width="10px">
                                <label for="jumlah"> kali</label>
                            </div>
                        </div>
                        <div>
                            <input type="hidden" name="idkelas" value="{{ $idk }}">
                            <input type="submit" class="btn btn-primary" name="store" value="Buat">
                        </div>
                    </form>

                </div>
                <div id="second" class="hidden p-4">
                    Second tab
                </div>
                <div id="third" class="hidden p-4">
                    Third tab
                </div>
                <div id="fourth" class="hidden p-4">
                    Fourth tab
                </div>
            </div>
        </div>
    </div>

</x-app-layout>

<script>
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
