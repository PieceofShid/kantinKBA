@extends('layout.index')

@section('content')
  <div class="card mb-4">
    <div class="card-body">
      <div class="d-flex justify-content-between align-items-center">
        <h5>Top up</h5>
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
            @foreach ($santris as $santri)
              <option value="{{$santri->id}}">{{$santri->nama}}</option>
            @endforeach
          </select>
        </div>
        <div class="form-group">
          <label for="nominal">Nominal</label>
          <input type="number" name="nominal" id="nominal" class="form-control" required>
        </div>
        <button type="button" onclick="topup()" class="btn btn-success">Simpan</button>
        <a href="{{ route('topup.index')}}" class="btn btn-secondary">Riwayat Topup</a>
      </form>
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
    var pin;
    $(document).ready(function(){
      $('#santri_id').select2({
        placeholder: "Pilih santri",
        allowClear: true
      });
    })

    function topup(){
        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });

        var santri_id = $('#santri_id').val();
        var nominal = $('#nominal').val();

        $.ajax({
           type:'POST',
           url:"{{ route('topup.post') }}",
           data:{santri_id:santri_id, nominal:nominal},
           success:function(data){
              $('#berhasil').html(data.success);
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