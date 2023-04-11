<x-app-layout>
    <div class="container">
        <form action="{{route('classes.create.store')}}" method="post">
            @csrf
            <label for="namaKelas" class="">Nama Kelas (required)</label>
            <input type="text" name="namaKelas" placeholder="Nama Kelas" required><br>
            <label for="namaSubject" class="">Subjek Kelas</label>
            <input type="text" name="namaSubject" placeholder="Subjek Kelas"><br>
            <label for="descKelas" class="">Deskripsi Kelas</label>
            <textarea name="descKelas" cols="30" rows="10" placeholder="Deskripsi Kelas"></textarea><br>
            <button type="submit" class="btn btn-info">Tambah</button>
        </form>
    </div>
</x-app-layout>