@extends('layout.index')

@section('content')
  <div class="card mb-4">
    <div class="card-body">
      <div class="d-flex justify-content-between align-items-center">
        <h5>Riwayat Topup</h5>
        <div class="btn-group" role="group" aria-label="button-group">
          <a href="{{ route('topup.create')}}" class="btn btn-sm btn-primary">Tambah</a>
          <button type="button" class="btn btn-sm btn-outline-primary" id="download">Download</button>
        </div>
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
                <td>{{$topup->nama}}</td>
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
    var table;
    $(document).ready(function(){
      table = $('#table').DataTable({
        "lengthChange": false,
        "info": false,
        "dom": 'Bfrtip',
        "buttons": [{
            extend: 'excel',
            title: 'Riwayat Topup'
          }]
      });

      table.buttons('.buttons-excel').nodes().addClass('d-none');

      $('#download').click(function(){
        table.buttons('.buttons-excel').trigger();
      });
    })

  </script>
@endsection