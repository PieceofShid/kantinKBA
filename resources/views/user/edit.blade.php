@extends('layout.index')

@section('content')
  <div class="card mb-4">
    <div class="card-body">
      <div class="d-flex justify-content-between align-items-center">
        <h5>Edit User</h5>
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-body">
      <form action="{{ route('user.update', $user->id)}}" method="post">
        @csrf
        @method('post')
        <div class="form-group">
          <label for="nama">Nama</label>
          <input type="text" name="nama" id="nama" class="form-control" value="{{$user->nama}}" required>
        </div>
        <div class="form-group">
          <label for="username">Username</label>
          <input type="text" name="username" id="username" class="form-control" value="{{$user->username}}" required>
        </div>
        <div class="form-group">
          <label for="role">Role</label>
          <select name="role" id="role" class="form-control" required>
            <option value="">-- Pilih Data --</option>
            @foreach ($roles as $role)
              <option value="{{$role->id}}" @if ($user->role_id == $role->id) selected @endif>{{ucwords($role->nama)}}</option>
            @endforeach
          </select>
        </div>
        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" name="password" id="password" class="form-control">
        </div>
        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('user.index')}}" class="btn btn-secondary">Kembali</a>
      </form>
    </div>
  </div>
@endsection