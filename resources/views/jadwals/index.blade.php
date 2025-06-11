@extends('layout')

@section('content')
<h2>Data Jadwal</h2>
<a href="{{ route('jadwals.create') }}" class="btn btn-primary">Tambah</a>
<table class="table mt-3">
    <tr>
        <th>Kelas</th><th>Tahun</th><th>Semester</th><th>Mata Kuliah</th><th>Dosen</th><th>Sesi</th><th>Aksi</th>
    </tr>
    @foreach($jadwals as $j)
    <tr>
        <td>{{ $j->kelas }}</td>
        <td>{{ $j->tahun_akademik }}</td>
        <td>{{ $j->kode_smt }}</td>
        <td>{{ $j->mataKuliah->nama }}</td>
        <td>{{ $j->dosen->name }}</td>
        <td>{{ $j->sesi->nama }}</td>
        <td>
            <a href="{{ route('jadwals.edit', $j) }}" class="btn btn-warning btn-sm">Edit</a>
            <form action="{{ route('jadwals.destroy', $j) }}" method="POST" style="display:inline;">
                @csrf @method('DELETE')
                <button class="btn btn-danger btn-sm">Hapus</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
@endsection
