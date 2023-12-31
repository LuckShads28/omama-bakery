@extends('layouts')

@section('content')
    <!-- breadcrumbs area start -->
    <div class="breadcrumbs_aree breadcrumbs_bg mb-110" data-bgimg="assets/img/others/breadcrumbs-bg.png">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumbs_text">
                        <h1>Kode Unik</h1>
                        <ul>
                            <li><a href="{{ route('home') }}">Home </a></li>
                            <li>// Kode Unik</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumbs area end -->
    @if (!request('code'))
        <div class="login-register-area">
            <div class="container">
                @if (session()->has('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif
                <div class="row">
                    <div class="col-lg-12">
                        <form action="" method="GET" autocomplete="off">
                            <div class="login-form">
                                <h4 class="login-title">Cari Kode Unik</h4>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <label>Kode Unik*</label>
                                        <input type="text" placeholder="Kode Unik" name="code" />
                                    </div>
                                    <div class="col-lg-12">
                                        <button class="btn custom-btn md-size" type="submit">Cari Kode Unik</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endif

    @if (request('code') && $code == null)
        <div class="login-register-area">
            <div class="container">
                <div class="alert alert-danger">Kode unik tidak ditemukan atau sudah digunakan.</div>
                <div class="row">
                    <div class="col-lg-12">
                        <form action="" method="GET" autocomplete="off">
                            <div class="login-form">
                                <h4 class="login-title">Cari Kode Unik</h4>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <label>Kode Unik*</label>
                                        <input type="text" placeholder="Kode Unik" name="code"
                                            value="{{ request('code') }}" />
                                    </div>
                                    <div class="col-lg-12">
                                        <button class="btn custom-btn md-size" type="submit">Cari Kode Unik</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endif

    @if (request('code') && $code)
        <div class="login-register-area">
            <div class="container">
                <div class="alert alert-success">Kode unik ditemukan! Silahkan isi data diri anda, dan nanti admin akan
                    menghubungi anda untuk mendapatkan hadiah!</div>
                <div class="row">
                    <div class="col-lg-12">
                        <form action="{{ route('unique_code.use') }}" method="POST" autocomplete="off">
                            @csrf
                            @method('post')
                            <div class="login-form">
                                <h4 class="login-title">Cari Kode Unik</h4>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <label>Nama Lengkap *</label>
                                        <input type="text" placeholder="Nama Lengkap" name="name" required />
                                    </div>
                                    <div class="col-lg-12">
                                        <label>Kode Unik *</label>
                                        <input type="text" placeholder="Kode Unik" name="code"
                                            value="{{ $code->code }}" readonly required />
                                    </div>
                                    <div class="col-lg-12">
                                        <label>Nama Produk Yang Dibeli *</label>
                                        <input type="text" placeholder="Nama Produk Yang Dibeli" name="product_name"
                                            required />
                                    </div>
                                    <div class="col-lg-12">
                                        <label>Nomer WA Yang Dapat Dihubungi *</label>
                                        <input type="text" placeholder="Nomor WA" name="wa_number" required />
                                    </div>
                                    <div class="col-lg-12">
                                        <button class="btn custom-btn md-size" type="submit">Kirim Data Diri</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection
