@extends('admin.admin_layouts')

@section('content')
    @push('css')
        <link href="{{ asset('/') }}assets/sbadmin/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    @endpush

    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Data Produk</h1>

        @if (session()->has('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
            </div>
            <div class="card-body">
                <div class="d-flex justify-content-end mb-3">
                    <a href="{{ route('admin.products.create') }}" class="btn btn-primary">Tambah</a>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Deskripsi</th>
                                <th>Kategori</th>
                                <th>Harga</th>
                                <th>Best Seller?</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $d)
                                <tr>
                                    <td>{{ $d->name }}</td>
                                    <td>{{ $d->description }}</td>
                                    <td>
                                        {{ $d->category != null ? $d->category->name : '-' }}
                                    </td>
                                    <td>{{ $d->price }}</td>
                                    <td>
                                        @if ($d->is_best_seller == 'ya')
                                            <div class="badge badge-success">
                                                Ya
                                            </div>
                                        @else
                                            <div class="badge badge-danger">
                                                Tidak
                                            </div>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="d-flex">
                                            <div class="mx-1">
                                                <button type="button" class="btn btn-primary viewPhotoBtn"
                                                    value="{{ $d->product_pict }}" data-value-2="{{ $d->name }}"
                                                    data-toggle="modal" data-target="#viewPhotoModal">
                                                    Cek Foto
                                                </button>
                                            </div>
                                            <div class="mx-1">
                                                <a href="{{ route('admin.products.edit', $d->id) }}"
                                                    class="btn btn-warning">Edit</a>
                                            </div>
                                            <div class="mx-1">
                                                <button type="button" class="btn btn-danger deleteConfirmationBtn"
                                                    value="{{ $d->id }}" data-value-2="{{ $d->name }}"
                                                    data-toggle="modal" data-target="#deleteConfirmationModal">
                                                    Hapus
                                                </button>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="deleteConfirmationModal" tabindex="-1" aria-labelledby="deleteConfirmationModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <form action="{{ route('admin.products.destroy') }}" method="POST">
                    @csrf
                    @method('delete')
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="deleteConfirmationModalLabel">Konfirmasi</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" name="product_id" id="product_id">
                            <p>Anda yakin ingin menghapus produk <span id="product_name" style="font-weight: bold"></span>?
                            </p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Hapus</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="modal fade" id="viewPhotoModal" tabindex="-1" aria-labelledby="viewPhotoModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="viewPhotoModalLabel">Foto Produk <span style="font-weight: bold"
                                id="product_name_img"></span>
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <img class="img-fluid" id="product_img" src="" alt="foto produk">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    </div>
                </div>
            </div>
        </div>


    </div>

    @push('script')
        <script src="{{ asset('/') }}assets/sbadmin/vendor/datatables/jquery.dataTables.min.js"></script>
        <script src="{{ asset('/') }}assets/sbadmin/vendor/datatables/dataTables.bootstrap4.min.js"></script>

        <!-- Page level custom scripts -->
        <script src="{{ asset('/') }}assets/sbadmin/js/demo/datatables-demo.js"></script>

        <script>
            $(document).ready(function() {
                $('.deleteConfirmationBtn').click(function(e) {
                    e.preventDefault();

                    var productId = $(this).val()
                    var productName = $(this).attr('data-value-2');

                    $('#product_id').val(productId);
                    $('#product_name').text(productName);
                })

                $('.viewPhotoBtn').click(function(e) {
                    var defaultPath = "{{ asset('storage/') }}";
                    var imgPath = $(this).val();

                    var productName = $(this).attr('data-value-2');

                    $('#product_img').attr('src', defaultPath + '/' + imgPath)
                    $('#product_name_img').text(productName);
                })
            })
        </script>
    @endpush
@endsection
