@extends('template.index')

@section('title', 'Halaman Awal')

@section('css')
<link href="{{ asset('sb-admin/assets/vendor/simple-datatables/style.css') }}" rel="stylesheet">
@stop

@section('main')
<main id="main" class="main">

    <div class="pagetitle">
      <h1>Data Tables</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Data Siswa</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Datatables</h5>
              <a href="{{ url('siswa/create') }}">
                  <button type="button" class="btn btn-primary">Tambah Data Siswa</button>
              </a>

              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">NISN</th>
                    <th scope="col">Nama Siswa</th>
                    <th scope="col">Tempat Lahir</th>
                    <th scope="col">Tanggal Lahir</th>
                    <th scope="col">Jenis Kelamin</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($siswa_list as $anak)
                  <tr>
                    <th scope="row">{{ $anak->id_siswa }}</th>
                    <td>{{ $anak->nisn }}</td>
                    <td>{{ $anak->nama }}</td>
                    <td>{{ $anak->tempat_lahir }}</td>
                    <td>{{ $anak->tanggal_lahir }}</td>
                    <td>{{ $anak->jenis_kelamin }}</td>

                    
                    <td>
                        <a href="{{ url('siswa/'.$anak->id_siswa) }}">
                            <button type="button" class="btn btn-primary">Detail</button>
                        </a>
                        <a href="{{ url('siswa/'.$anak->id_siswa.'/edit') }}">
                            <button type="button" class="btn btn-primary">Edit</button>
                        </a>
                        <form method="post" action="{{ url('siswa/'.$anak->id_siswa) }}">
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="btn btn-danger">Hapus</button>
                        </form>
                    </td>
                    
                  </tr>
                  @endforeach
                </tbody>
              </table>
              <!-- End Table with stripped rows -->

            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->
@stop

@section('js')
<script src="{{ asset('sb-admin/assets/vendor/simple-datatables/simple-datatables.js') }}"></script>
@stop