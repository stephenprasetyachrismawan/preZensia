<x-app-layout>
    <div class="container">
        <form action="{{route('classes.join.check')}}" method="post">
            @csrf
            <label for="kodeKelas">Kode Kelas</label>
            <input type="text" name="kodeKelas" placeholder="Masukan Kode Kelas" required><br>
            <button type="submit" class="btn btn-primary">Join</button>
        </form>
    </div>
</x-app-layout>