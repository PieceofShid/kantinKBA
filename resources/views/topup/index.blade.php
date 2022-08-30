@extends('layout.index')

@section('content')
  <div class="card mb-4">
    <div class="card-body">
      <div class="d-flex justify-content-between align-items-center">
        <h5>Riwayat Topup</h5>
        <a href="{{ route('topup.create')}}" class="btn btn-primary">Tambah</a>
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-body">
        <table class="table" id="table">
          <thead>
            <tr>
              <th>Nama</th>
              <th>Nominal</th>
              <th>Tanggal</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($topups as $topup)
              <tr>
                <td>{{$topup->santri->nama}}</td>
                <td>Rp. {{number_format($topup->nominal, 0, '.', '.')}}</td>
                <td>{{date('d-m-Y', $topup->create_at)}}</td>
              </tr>
            @endforeach
          </tbody>
        </table>
    </div>
  </div>
@endsection

@section('script')
  <script>
    $(document).ready(function(){
      $('#table').DataTable({
        "lengthChange": false,
        "info": false
      });
    })
  </script>
@endsection