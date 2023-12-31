@extends('admin.admin_layouts')

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Tambah Kategori</h1>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3"></div>
            <div class="card-body">
                <form action="{{ route('admin.categories.store') }}" method="POST" autocomplete="off">
                    @csrf
                    @method('post')
                    <div class="form-group">
                        <label for="name">Nama Kategori</label>
                        <input type="text" class="form-control" id="name" name="name" aria-describedby="nameHelp"
                            placeholder="Nama Kategori" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>

    </div>
@endsection
