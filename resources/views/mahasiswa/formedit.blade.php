@extends('layout.main')

@section('content')
    <h4>Form Edit Data Mahasiswa</h4>
    <div class="card">
        <div class="card-header">
            <button type="button" class="btn btn-sm btn-warning" onclick="window.location='{{ url('mahasiswa') }}'">
                Kembali
            </button>
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form method="POST" action="{{ url('mahasiswa/' . $npm) }}">
                @csrf
                @method('PUT')
                <div class="row mb-3">
                    <label for="npm" class="col-sm-2 plaintext">NPM</label>
                    <div class="col-sm-6">
                        <input type="number" class="form-control-plaintext" id="npm" name="npm"
                            value="{{ $npm }}">
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="fullname" class="col-sm-2 col-form-label">Nama Lengkap</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control form-control-sm @error('fullname') is-invalid @enderror"
                            id="fullname" name="fullname" value="{{ $fullname }}">
                        @error('fullname')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="nickname" class="col-sm-2 col-form-label">Nama Panggilan</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control form-control-sm @error('nickname') is-invalid @enderror"
                            id="nickname" name="nickname" value="{{ $nickname }}">
                        @error('nickname')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="class" class="col-sm-2 col-form-label">Kelas</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control form-control-sm @error('class') is-invalid @enderror"
                            id="class" name="class" value="{{ $class }}">
                        @error('class')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                </div>

                <div class="row mb-3">
                    <label for="gender" class="col-sm-2 col-form-label">Gender</label>
                    <div class="col-sm-4">
                        <select class="form-select form-select-sm @error('gender') is-invalid @enderror" name="gender"
                            id="gender">
                            <option value="" selected> Pilih </option>
                            <option value="M" {{ $gender == 'M' ? 'selected' : '' }}> Laki Laki </option>
                            <option value="F" {{ $gender == 'F' ? 'selected' : '' }}> Perempuan </option>
                        </select>
                        @error('gender')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="address"
                        class="col-sm-2 col-form-label @error('alamat') is-invalid @enderror">Alamat</label>
                    <div class="col-sm-6">
                        <textarea class="form-control" name="address" id="address" cols="50" rows="5">{{ $address }}</textarea>
                        @error('address')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="" class="col-sm-2 col-form-label"></label>
                    <div class="col-sm-6">
                        <button type="submit" class="btn btn-sm btn-primary">Update</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
@endsection
