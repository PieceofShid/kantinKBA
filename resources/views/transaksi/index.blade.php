@extends('layout.index')

@section('content')
  <div class="card mb-4">
    <div class="card-body">
      <div class="d-flex justify-content-between align-items-center">
        <h5>Riwayat Transaksi</h5>
        <div class="btn-group" role="group" aria-label="button-group">
          <a href="{{ route('transaksi.create')}}" class="btn btn-sm btn-primary">Tambah</a>
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
              <th>#</th>
              <th>Nama</th>
              <th>Tanggal</th>
              <th>Nominal</th>
              <th>Deskripsi</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($transaksis as $transaksi)
              <tr>
                <td></td>
                <td>{{$transaksi->nama}}</td>
                <td>{{date('d-m-Y', $transaksi->create_at)}}</td>
                <td>Rp. {{number_format($transaksi->nominal, 0, '.', '.')}}</td>
                <td>{{$transaksi->deskripsi}}</td>
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
        "responsive": true,
        "dom": 'Bfrtip',
        "buttons": [{
            extend: 'excel',
            title: 'Riwayat Transaksi'
        }]
      });

      table.buttons('.buttons-excel').nodes().addClass('d-none');

      $('#download').click(function(){
        table.buttons('.buttons-excel').trigger();
      });
    })
  </script>
@endsection