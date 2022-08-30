@extends('layout.index')

@section('content')
  <div class="card mb-4">
    <div class="card-body">
      <div class="d-flex justify-content-between align-items-center">
        <h5>Edit Santri</h5>
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-body">
      @if($errors->any())
        <div class="alert alert-danger">
          <ul class="list-unstyled">
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif
      <form action="{{ route('santri.update', $santri->id)}}" method="post">
        @csrf
        @method('post')
        <div class="form-group">
          <label for="nama">Nama</label>
          <input type="text" name="nama" id="nama" class="form-control" value="{{$santri->nama}}" required>
        </div>
        <div class="form-group">
          <label for="pin">PIN</label>
          <input type="number" name="pin" id="pin" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" class="form-control" maxlength="6" value="{{$santri->pin}}" required>
        </div>
        <div class="form-group">
          <label for="saldo">Saldo</label>
          <input type="number" name="saldo" id="saldo" class="form-control" value="{{$santri->saldo}}" required>
        </div>
        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('santri.index')}}" class="btn btn-secondary">Kembali</a>
      </form>
    </div>
  </div>
@endsection