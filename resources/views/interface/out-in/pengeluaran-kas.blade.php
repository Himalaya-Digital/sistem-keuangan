@extends('layouts.app')

@section('content')
<div class="section-header">
  <h1>Data Pengeluaran Kas</h1>
</div>

<div class="section-body">
  <div class="row">
    <div class="col-12">
      @if(session('success'))
      <div class="alert alert-success alert-dismissible show fade">
        <div class="alert-body">
          <button class="close" data-dismiss="alert">
            <span>×</span>
          </button>
          {{session('success')}}
        </div>
      </div>
      @endif
      <div class="card">
        <div class="card-body">
          <a href="{{ route('pengeluaran-kas.create') }}" type="button" class="btn btn-primary float-right mb-3">Tambah
            Data</a>
          <div class="table-responsive">
            <table class="table table-striped" id="table-1">
              <thead>
                <tr>
                  <th class="text-center">No</th>
                  <th>Id Pengeluaran</th>
                  <th>Nama Akun</th>
                  <th>Tanggal</th>
                  <th>Total Pengeluaran</th>
                  <th>Keterangan</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($pengeluarans as $pengeluaran)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $pengeluaran->id }}</td>
                  <td>{{ $pengeluaran->dataakun->nama_akun }}</td>
                  <td>{{ date( 'd/m/Y', strtotime($pengeluaran->tanggal_pengeluaran)) }}</td>
                  <td>
                    {{ number_format($pengeluaran->total_pengeluaran, 0, ',','.')}}
                  </td>
                  <td>{{ $pengeluaran->keterangan_pengeluaran }}</td>
                  <td>
                    <a href="{{ route('pengeluaran-kas.edit', $pengeluaran->id) }}" class="btn btn-sm btn-warning"
                      title="edit"><i class="far fa-edit"></i></a>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection