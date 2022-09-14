@extends('layout.index')

@section('content')
  <div class="card mb-4">
    <div class="card-body">
      <div class="d-flex justify-content-between align-items-center">
        <h5>Tambah Transaksi</h5>
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
      <form>
        @csrf
        @method('post')
        <div class="form-group">
          <label for="santri_id">Santri</label>
          <select name="santri_id" id="santri_id" class="form-control" style="width: 100%" required>
            <option></option>
            <option value="0">Non-Santri</option>
            @foreach ($santris as $santri)
              <option value="{{$santri->id}}">{{$santri->nama}}</option>
            @endforeach
          </select>
        </div>
        <div class="form-group">
          <label for="nominal">Nominal</label>
          <input type="number" name="nominal" id="nominal" class="form-control" required>
        </div>
        <div class="form-group">
          <label for="deskripsi">Deskripsi</label>
          <input type="text" name="deskripsi" id="deskripsi" class="form-control" required>
        </div>
        <button type="button" onclick="valid()" class="btn btn-success">Simpan</button>
        <a href="{{ route('transaksi.index')}}" class="btn btn-secondary">Riwayat transaksi</a>
      </form>
    </div>
  </div>

  <div class="modal fade" id="inputPIN" tabindex="-1" role="dialog" aria-labelledby="Labelmodal" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
          <div class="modal-body">
            <label for="santri_pin">Masukkan pin transaksi <span class="font-weight-bold text-uppercase" id="nama_santri"></span></label>
            <input type="number" id="santri_pin" class="form-control" required>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-success" onclick="validasi()">Submit</button>
          </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="modalScs" tabindex="-1" role="dialog" aria-labelledby="Labelmodal" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
          <div class="modal-body">
            <div class="font-weight-bold text-center" id="berhasil"></div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" onclick="done()">Tutup</button>
          </div>
      </div>
    </div>
  </div>
@endsection

@section('script')
  <script>
    var pin, saldo, santri_id, nominal, deskripsi;
    $(document).ready(function(){
      $('#santri_id').select2({
        placeholder: "Pilih santri",
        allowClear: true
      });
    })

    function valid(){
      santri_id = $('#santri_id').val();
      if(santri_id == 0){
        validasi();
      }else{
        var url = "{{ route('transaksi.check', ":santri_id")}}";
        url = url.replace(':santri_id', santri_id);
        $.ajax({
          url: url,
          method: 'GET',
          success: function(data){
            var nama = data['nama'];
            pin  = data['pin'];
            saldo = data['saldo'];
            $('#nama_santri').html(nama);
            $('#inputPIN').modal('show');
          },error: function(){
            alert('Terjadi kesalahan silahkan coba lagi nanti');
          }
        });
      }
    }

    function validasi(){
      nominal = $('#nominal').val();
      deskripsi = $('#deskripsi').val();

      if (santri_id == 0){
        postSubmit();
      }else if($('#santri_pin').val() != pin){
        $('#berhasil').html('Nomor pin anda salah masukkan lagi');
        $('#inputPIN').modal('hide');
        $('#modalScs').modal('show');
      }else if(saldo < nominal){
        $('#berhasil').html('Saldo anda tidak mencukupi, sisa saldo anda ' + saldo);
        $('#inputPIN').modal('hide');
        $('#modalScs').modal('show');
      }else if($('#santri_pin').val() == pin && saldo > nominal){
        postSubmit()
      }
    }

    function postSubmit(){
      $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });

        $.ajax({
           type:'POST',
           url:"{{ route('transaksi.post') }}",
           data:{santri_id:santri_id, nominal:nominal, deskripsi:deskripsi},
           success:function(data){
              $('#berhasil').html(data.success);
              $('#inputPIN').modal('hide');
              $('#modalScs').modal('show');
           },error:function(data){
              alert(data.error);
           }
        });
    }

    function done(){
      window.location.reload();
    }
  </script>
@endsection