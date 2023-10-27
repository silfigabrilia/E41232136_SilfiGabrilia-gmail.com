@extends('backend.layouts.template')

@section('content')
    <main id="main" class="main">
    {{-- Page Title --}}
    <div class="pagetitle">
        <h1>Riwayat Hidup</h1>
        <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item">Riwayat Hidup</li>
            <li class="breadcrumb-item active">Pendidikan</li>
        </ol>
        </nav>
    </div>
    <!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">
            <section class="card-body">
                <div class="card">
                    <div class="card-body">
                    <h5 class="card-title">Pendidikan</h5>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
                    <a href="{{ route('pendidikan.create') }}"><button class="btn btn-primary" type="button">
                        Tambah</button></a>
                    </div>

                     <!-- Table with stripped rows -->
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col"><i class="bi bi-bag-dash"></i> Nama</th>
                            <th scope="col"><i class="bi bi-receipt"></i> Tingkatan</th>
                            <th scope="col"><i class="bi bi-calendar-event"></i> Tahun Masuk</th>
                            <th scope="col"><i class="bi bi-calendar-event"></i> Tahun Keluar</th>
                            <th scope="col"><i class="bi bi-gear"></i> Action</th>
                        </tr>
                        </thead>
                       
                        <tbody>
                        @foreach ($pendidikan as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->nama }}</td>
                                <td>
                                    @if ($item->tingkatan==1)
                                       TK
                                    @elseif ($item->tingkatan==2)
                                        SD
                                    @elseif ($item->tingkatan==3)
                                        SMP
                                    @elseif ($item->tingkatan==4)
                                        SMA
                                    @elseif ($item->tingkatan==5)
                                        D3
                                    @elseif ($item->tingkatan==6)
                                        D4/S1
                                    @elseif ($item->tingkatan==7)
                                        S2
                                    @elseif ($item->tingkatan==8)
                                        S3
                                    @endif
                                </td>
                                <td>{{ $item->tahun_masuk }}</td>
                                <td>{{ $item->tahun_keluar }}</td>
                                <td>
                                    <div class="btn-group">
                                        <form action="{{ route('pendidikan.destroy', $item->id) }}" method="POST">
                                            <a href="{{ route('pendidikan.edit',$item->id) }}"
                                                class="btn btn-warning">
                                                <i class="bi bi-pencil-fill"></i>
                                            </a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger"
                                            onclick="return confirm('Apakah Anda yakin ingin menghapus data ini ?')">
                                                <i class="bi bi-trash-fill"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <!-- End Table with stripped rows -->

                </div>
            </section>
          </div>
        </div>
    </section>
</main>
@endsection