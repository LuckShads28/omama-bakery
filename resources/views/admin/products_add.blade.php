@extends('admin.admin_layouts')

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Tambah Produk</h1>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3"></div>
            <div class="card-body">
                <form action="{{ route('admin.products.store') }}" class="needs-validation" method="POST" autocomplete="off"
                    enctype="multipart/form-data">
                    @csrf
                    @method('post')
                    <div class="form-group">
                        <label for="name">Nama Produk</label>
                        <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
                            id="name" aria-describedby="nameHelp" placeholder="Nama Produk" name="name" required
                            value="{{ old('name') }}">
                        @if ($errors->has('name'))
                            <div class="invalid-feedback">
                                {{ $errors->first('name') }}
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="description">Deskripsi Produk</label>
                        <textarea class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" name="description" cols="30"
                            rows="3" required>{{ old('description') }}</textarea>
                        @if ($errors->has('description'))
                            <div class="invalid-feedback">
                                {{ $errors->first('description') }}
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="category">Kategori</label>
                        <select class="form-control {{ $errors->has('category_id') ? 'is-invalid' : '' }}" id="category"
                            name="category_id" required>
                            @foreach ($categories as $c)
                                <option value="{{ $c->id }}">{{ $c->name }}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('category_id'))
                            <div class="invalid-feedback">
                                {{ $errors->first('category_id') }}
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="price">Harga</label>
                        <input type="text" class="form-control {{ $errors->has('price') ? 'is-invalid' : '' }}"
                            id="price" aria-describedby="priceHelp" name="price" placeholder="Harga Produk"
                            value="{{ old('price') }}" required>
                        @if ($errors->has('price'))
                            <div class="invalid-feedback">
                                {{ $errors->first('price') }}
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="product_pict">Foto Produk</label>
                        <input type="file"
                            class="form-control-file {{ $errors->has('product_pict') ? 'is-invalid' : '' }}"
                            id="product_pict" name="product_pict" required>
                        @if ($errors->has('product_pict'))
                            <div class="invalid-feedback">
                                {{ $errors->first('product_pict') }}
                            </div>
                        @endif
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>

    </div>
@endsection
