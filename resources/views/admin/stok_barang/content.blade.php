<br>
<!-- include summernote css/js-->
<div class="flash-message" style="margin-left: -16px;margin-right: -16px; margin-top: 13px;">
  @foreach (['danger', 'warning', 'success', 'info'] as $msg)
  @if(Session::has('alert-' . $msg))
<div class="alert alert-{{ $msg }}">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <p class="" style="border-radius: 0">{{ Session::get('alert-' . $msg) }}</p>
</div>
  {!!Session::forget('alert-' . $msg)!!}
  @endif
  @endforeach
</div>
<div style="margin-bottom: 10px">
  <a href="{{url('stok_barang/tambah')}}" type="button" class="btn btn-info btn-md" >
    <i class="fa fa-plus-square"></i>Tambah Stok</a>
</div>
<div style="overflow: auto">
<table id="myTable" class="table table-striped table-bordered" cellspacing="0">
  <thead>
    <tr>
      <th>No.</th>
      <th style="text-align:center">Nama Barang</th>
      <th style="text-align:center">Satuan Stok</th>
      <th style="text-align:center">Jumlah Stok</th>
      <th style="text-align:center">Action</th>
    </tr> </thead>
  <tbody>
   @forelse($stok_barang as $i => $sb) 
    <tr>
      <td>{{ $i+1 }}</td>
      <td width="28%" style="text-align:center">{{$sb->barang->nama_barang}}</td>
      <td width="10%" style="text-align:center">{{$sb->satuan_stok}}</td>
      <td width="10%" style="text-align:center">{{$sb->jumlah_stok}}</td>
      <td style="text-align:center" ><a onclick="return confirm('Anda yakin untuk menghapus barang ini?');" href="{{url('stok_barang/'.$sb->id.'/hapus/')}}" class="btn btn-danger btn-xs">
        <i class="fa fa-trash-o"></i> Hapus</a>
        <a href="{{url('stok_barang/'.$sb->id.'/edit/')}}" class="btn btn-warning btn-xs">
        <i class="fa fa-pencil-square-o"></i> Edit</a>
        </td>
    </tr>
     
     @empty
        <tr>
          <td colspan="5"><center>Belum ada barang</center></td>
        </tr>
    @endforelse
  </tbody>
</table>
</div>