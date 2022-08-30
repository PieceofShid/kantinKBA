@extends('layout.index')

@section('content')
  <div class="card mb-4">
    <div class="card-body">
      <div class="d-flex justify-content-between align-items-center">
        <h5>Manajemen Users</h5>
        <a href="{{ route('user.create')}}" class="btn btn-primary">Tambah</a>
      </div>
    </div>
  </div>
  @php
    if(session('success')){
      echo '  <div class="alert alert-success alert-dismissable fade show" role="alert">
                '.session('success').'
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>';
    }elseif(session('error')){
      echo '  <div class="alert alert-danger alert-dismissable fade show" role="alert">
                '.session('error').'
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>';
    }
  @endphp
  <div class="card">
    <div class="card-body">
      <div class="table-responsive text-nowrap">
        <table class="table" id="table">
          <thead>
            <tr>
              <th>#</th>
              <th>Nama</th>
              <th>Username</th>
              <th>Role</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($users as $user)
              <tr>
                <td></td>
                <td>{{$user->nama}}</td>
                <td>{{$user->username}}</td>
                <td>{{$user->role->nama}}</td>
                <td>
                  <a href="{{ route('user.edit', $user->id)}}" class="btn btn-sm text-warning"><i class="ti-pencil"></i></a>
                  <button class="btn btn-sm text-danger" onclick="hapus('{{$user->id}}')"><i class="ti-trash"></i></button>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="Labelmodal" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="Labelmodal">Hapus User</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="" method="post" id="formModal">
          <div class="modal-body">
            @csrf
            @method('delete')
            <h5 class="text-center">Apakah anda yakin ?</h5>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-danger">Delete</button>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection

@section('script')
  <script>
    $(document).ready(function(){
      $('#table').DataTable();
    })

    function hapus(id){
      var url = "{{ route('user.delete', ":id")}}";
      url = url.replace(':id', id);
      $('#formModal').attr('action', url);
      $('#modal').modal('show');
    }
  </script>
@endsection