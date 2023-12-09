@extends('layout.main')

@section('content')
    <h4>DATA MAHASISWA</h4>
    <div class="card">
        <div class="card-header">
            <button type="button" class="btn btn-sm btn-primary" onclick="window.location='{{ url('mahasiswa/add') }}'">
                <i class="fas fa-plus-circle"> Tambahkan Data Baru</i>
            </button>
        </div>
        <div class="card-body">
            @if (session('msg'))
                <div class="alert alert-success" role="alert">
                    <h4 class="alert-heading">Sukses</h4>
                    {{ session('msg') }}
                </div>
            @endif

            <form method="GET">
                <div class="row mb-3">
                    <label for="Cari" class="col-sm-2 col-form-label">Cari Data</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control form-control-sm" id="cari" name="cari"
                            placeholder="Ketik Data yang ingin kamu cari" autofocus>
                        @error('fullname')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

            </form>

            <table class="table table-sm table-striped table-bordered">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>NPM</th>
                        <th>Nama Lengkap</th>
                        <th>Nama Panggilan</th>
                        <th>Kelas</th>
                        <th>Gender</th>
                        <th>Alamat</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($mahasiswa as $row)
                        <tr>
                            <th>{{ $loop->iteration }}</th>
                            <td>{{ $row->npm }}</td>
                            <td>{{ $row->fullname }}</td>
                            <td>{{ $row->nickname }}</td>
                            <td>{{ $row->class }}</td>
                            <td>{{ $row->gender == 'M' ? 'Laki-Laki' : 'Perempuan   ' }}</td>
                            <td>{{ $row->address }}</td>
                            <td>
                                <button onclick="window.location='{{ url('mahasiswa/' . $row->npm) }}'" type="button"
                                    class="btn btn-sm btn-info" title="Edit Data">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <form onsubmit="return deleteData('{{ $row->fullname }}')" style="display: inline"
                                    method="POST" action="{{ url('mahasiswa/' . $row->npm) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" title="Hapus Data">
                                        <i class="fas fa-trash"></i>
                                    </button>

                                </form>

                            </td>



                        </tr>
                    @endforeach
                </tbody>

            </table>
        </div>
        <script>
            function deleteData(name) {
                return confirm('Yakin data ' + name + ' akan dihapus?');
            }
        </script>
    @endsection
