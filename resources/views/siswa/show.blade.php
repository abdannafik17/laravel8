@extends('template.index')

@section('title', 'Halaman Detail Siswa')

@section('css')
<link href="{{ asset('sb-admin/assets/vendor/simple-datatables/style.css') }}" rel="stylesheet">
@stop

@section('main')
<main id="main" class="main">

    <div class="pagetitle">
      <h1>Detail Siswa</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Siswa</li>
          <li class="breadcrumb-item active">Detail Siswa</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-6">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Detail Siswa</h5>

              <!-- General Form Elements -->
              <form>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">NISN</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="nisn" value="{{ $siswa->nisn }}" readonly>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Nama Siswa</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="nama" value="{{ $siswa->nama }}" readonly>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Tempat Lahir</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="tempat_lahir" value="{{ $siswa->tempat_lahir }}" readonly>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="tanggal_lahir" value="{{ $siswa->tanggal_lahir }}" readonly>
                  </div>
                </div>

              </form><!-- End General Form Elements -->

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