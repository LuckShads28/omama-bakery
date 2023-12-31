@extends('admin.admin_layouts')

@section('content')
    @push('css')
        <link href="{{ asset('/') }}assets/sbadmin/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    @endpush

    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Data Kategori</h1>

        @if (session()->has('success'))
            <div class="alert alert-success" role="alert">
                {{ session()->get('success') }}
            </div>
        @endif

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
            </div>
            <div class="card-body">
                <div class="d-flex justify-content-end mb-3">
                    <a href="{{ route('admin.categories.create') }}" class="btn btn-primary">Tambah</a>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Nama Kategori</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $d)
                                <tr>
                                    <td>{{ $d->name }}</td>
                                    <td>
                                        <div class="d-flex">
                                            <div class="mx-1">
                                                <a href="{{ route('admin.categories.edit', $d->id) }}"
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

        <div class="modal fade" id="deleteConfirmationModal" tabindex="-1" aria-labelledby="deleteConfirmationModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <form action="{{ route('admin.categories.destroy') }}" method="POST">
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
                            <input type="hidden" name="category_id" id="category_id">
                            <p>Anda yakin ingin menghapus Kategori <span id="category_name"
                                    style="font-weight: bold"></span>?
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

                    var categoryId = $(this).val()
                    var categoryName = $(this).attr('data-value-2');

                    $('#category_id').val(categoryId);
                    $('#category_name').text(categoryName);
                })
            })
        </script>
    @endpush
@endsection
