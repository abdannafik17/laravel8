@extends('template.index')

@section('title', 'Halaman Edit Data Siswa')

@section('css')
<link href="{{ asset('sb-admin/assets/vendor/simple-datatables/style.css') }}" rel="stylesheet">
@stop

@section('main')
<main id="main" class="main">

    <div class="pagetitle">
      <h1>Tambah Data Siswa</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item"><a href="{{ url('siswa') }}" >Siswa </a></li>
          <li class="breadcrumb-item active">Edit Data Siswa</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-6">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Edit Data Siswa</h5>

              <!-- General Form Elements -->
              <form method="post" action="{{ url('siswa/'.$siswa->id_siswa) }}">
                @csrf
                @method('PATCH')
                
                <input type="hidden" class="form-control" name="id" value="{{ $siswa->id_siswa }}">
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">NISN</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="nisn" value="{{ $siswa->nisn }}" readonly>
                    @if($errors->has('nisn'))
                      <span style="color:red">{{ $errors->first('nisn') }}</span>
                    @endif
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Nama Siswa</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="nama" value="{{ $siswa->nama }}">
                    @if($errors->has('nama'))
                      <span style="color:red">{{ $errors->first('nama') }}</span>
                    @endif
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Tempat Lahir</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="tempat_lahir" value="{{ $siswa->tempat_lahir }}">
                    @if($errors->has('tempat_lahir'))
                      <span style="color:red">{{ $errors->first('tempat_lahir') }}</span>
                    @endif
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                  <div class="col-sm-10">
                    <input type="date" class="form-control" name="tanggal_lahir" value="{{ $siswa->tanggal_lahir }}">
                    @if($errors->has('tanggal_lahir'))
                      <span style="color:red">{{ $errors->first('tanggal_lahir') }}</span>
                    @endif
                  </div>
                </div>

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Jenis Kelamin</label>
                  <div class="col-sm-10">
                    <select class="form-select" name="jenis_kelamin">
                      <option value="null" selected>--Pilih Jenis Kelamin--</option>
                      @if($siswa->jenis_kelamin == 'L')
                        <option value="L" selected>Laki - Laki</option>
                      @else
                      <option value="L">Laki - Laki</option>
                      @endif

                      @if($siswa->jenis_kelamin == 'P')
                      <option value="P" selected>Perempuan</option>
                      @else
                      <option value="P">Perempuan</option>
                      @endif
                    </select>
                    @if($errors->has('jenis_kelamin'))
                      <span style="color:red">{{ $errors->first('jenis_kelamin') }}</span>
                    @endif
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">No HP</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="no_telepon" value="{{ $siswa->no_telepon }}">
                    @if($errors->has('no_telepon'))
                      <span style="color:red">{{ $errors->first('no_telepon') }}</span>
                    @endif
                  </div>
                </div>

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Kelas</label>
                  <div class="col-sm-10">
                    <select class="form-select" name="id_kelas">
                      <option value="" selected>--Pilih kelas--</option>
                      @foreach($list_kelas as $kelas)
                        <option @if($siswa->id_kelas == $kelas->id) selected @endif 
                            value="{{ $kelas->id }}">{{ $kelas->nama_kelas }}</option>
                      @endforeach
                    </select>
                    @if($errors->has('id_kelas'))
                      <span style="color:red">{{ $errors->first('id_kelas') }}</span>
                    @endif
                  </div>
                </div>
                
                <div class="row mb-3">
                  <legend class="col-form-label col-sm-2 pt-0">Hobi</legend>
                  <div class="col-sm-10">
                    @foreach($list_hobi as $lh)
                      @php
                        $i='true';
                      @endphp

                      @foreach($siswa->hobi as $h)
                        @if($lh->id == $h->id)
                          <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="gridCheck1" name="hobi[]" value="{{$lh->id}}" checked>
                            <label class="form-check-label" for="gridCheck1">
                              {{ $lh->nama_hobi }}
                            </label>
                          </div>
                          @php
                            $i='false';
                          @endphp
                          @break;
                        @endif
                      @endforeach
                      
                      @if($i == 'true')
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" id="gridCheck1" name="hobi[]" value="{{$lh->id}}">
                          <label class="form-check-label" for="gridCheck1">
                            {{ $lh->nama_hobi }}
                          </label>
                        </div>
                      @endif
                    @endforeach
                    
                  </div>
                </div>

                <div class="row mb-3">
                  <div class="col-sm-10">
                    <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
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