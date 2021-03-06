@extends('layouts.app')

@section('content')
<div class="section-header">
  <h1>Data Proyek</h1>
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
      @if(session('failed'))
      <div class="alert alert-danger alert-dismissible show fade">
        <div class="alert-body">
          <button class="close" data-dismiss="alert">
            <span>×</span>
          </button>
          {{session('failed')}}
        </div>
      </div>
      @endif
      <div class="card">
        <div class="card-body">
          <a href="{{route('data-proyek.create')}}" type="button" class="btn btn-primary float-right mb-3"
            title="add">Tambah Data</a>
          <div class="table-responsive">
            <table class="table table-striped" id="table-1">
              <thead>
                <tr>
                  <th class="text-center">No</th>
                  <th>ID Proyek</th>
                  <th>Nama Customer</th>
                  <th>Nama Proyek</th>
                  <th>Total Bayar</th>
                  <th>Bayar</th>
                  <th>Sisa Bayar</th>
                  <th>Status</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($projects as $project)
                <tr>
                  <td>{{$loop->iteration}}</td>
                  <td>{{$project->id_proyek}}</td>
                  <td>{{$project->customer == null ? '' : $project->customer->nama_customer}}</td>
                  <td>{{$project->nama_proyek}}</td>
                  <td>{{number_format($project->total_bayar, 0, ',', '.')}}</td>
                  <td>{{number_format($project->bayar, 0, ',', '.')}}</td>
                  <td>{{number_format($project->sisa_bayar, 0, ',', '.')}}</td>
                  <td>
                    <a href="{{route('pelunasan-proyek.show', ['id_proyek' => $project->id])}}">
                      {{$project->status}}
                    </a>
                  </td>
                  <td>
                    <a href="{{route('data-proyek.edit', $project->id)}}" class="btn btn-link btn-sm" title="edit"><i
                        class="far fa-edit"></i></a>
                    <a href="{{route('data-proyek.show', $project->id)}}" class="btn btn-link btn-sm" title="edit"><i
                        class="far fa-eye"></i></a>
                    <a href="{{route('pelunasan-proyek.create', ['id_proyek' => $project->id])}}"
                      class="btn btn-link btn-sm" title="edit"><i class="far fa-money-bill-alt"></i></a>
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