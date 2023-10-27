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
                    {{-- Create Form Pendidikan --}}
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">
                                {{ isset($admin_lecturer) ? 'Mengubah' : 'Menambahkan' }} Pendidikan
                            </h5>
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <strong>Whoops</strong> Ada yang salah dengan yang kamu inputkan. <br><br>
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <!-- Vertical Form -->
                            <form class="row g-3" action="{{ isset($pendidikan) ?
                            route('pendidikan.update', $pendidikan->id) : route('pendidikan.store') }}"
                            id="pendidikan_form" method="POST">
                                {!! csrf_field() !!}
                                {!! isset($pendidikan) ? method_field('PUT') : '' !!}
                                <div class="col-12">
                                    <label for="cname" class="form-label">Nama Sekolah
                                        <span class="required">*</span></label>
                                    <input type="text" class="form-control" id="nama"
                                    name="nama" value="{{ isset($pendidikan) ? $pendidikan->nama : '' }}"
                                    required>
                                </div>
                                <div class="col-12">
                                    <label for="validationDefault04" class="form-label">Tingkatan
                                        <span class="required">*</span></label>
                                    <select class="form-select" name="tingkatan" id="tingkatan" required>
                                        <option selected disabled value="">Pilih Tingkatan...</option>
                                        <option value="1 {{ (isset($pendidikan) && $pendidikan->tingkatan == 1)
                                            ? 'selected' : '' }}">TK</option>
                                        <option value="2 {{ (isset($pendidikan) && $pendidikan->tingkatan == 2)
                                            ? 'selected' : '' }}">SD</option>
                                        <option value="3 {{ (isset($pendidikan) && $pendidikan->tingkatan == 3)
                                            ? 'selected' : '' }}">SMP</option>
                                        <option value="4 {{ (isset($pendidikan) && $pendidikan->tingkatan == 4)
                                            ? 'selected' : '' }}">SMA</option>
                                        <option value="5 {{ (isset($pendidikan) && $pendidikan->tingkatan == 5)
                                            ? 'selected' : '' }}">D3</option>
                                        <option value="6 {{ (isset($pendidikan) && $pendidikan->tingkatan == 6)
                                            ? 'selected' : '' }}">D4/S1</option>
                                        <option value="7 {{ (isset($pendidikan) && $pendidikan->tingkatan == 7)
                                            ? 'selected' : '' }}">S2</option>
                                        <option value="8 {{ (isset($pendidikan) && $pendidikan->tingkatan == 8)
                                            ? 'selected' : '' }}">S3</option>
                                    </select>
                                </div>
                                <div class="col-12">
                                    <label for="cname" class="form-label">Tahun Masuk
                                        <span class="required">*</span></label>
                                    <input type="text" class="form-control" id="tahun_masuk"
                                    name="tahun_masuk" value="{{ isset($pendidikan) ?
                                        $pendidikan->tahun_masuk : '' }}" required>
                                </div>
                                <div class="col-12">
                                    <label for="cname" class="form-label">Tahun Keluar
                                        <span class="required">*</span></label>
                                    <input type="text" class="form-control" id="tahun_keluar"
                                    name="tahun_keluar" value="{{ isset($pendidikan) ?
                                        $pendidikan->tahun_keluar : '' }}" required>
                                </div>
                                <div class="text-center">
                                    <button class="btn btn-primary" type="submit">Save</button>
                                    <a href="{{ route('pendidikan.index') }}">
                                        <button class="btn btn-secondary" type="button">Cancel</button>
                                    </a>
                                </div>
                            </form>
                            <!-- Vertical Form -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection
