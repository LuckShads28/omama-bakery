@extends('admin.admin_layouts')

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Edit Produk</h1>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3"></div>
            <div class="card-body">
                <form action="{{ route('admin.products.update', $data->id) }}" class="needs-validation" method="POST"
                    autocomplete="off" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label for="name">Nama Produk</label>
                        <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
                            id="name" aria-describedby="nameHelp" placeholder="Nama Produk" name="name" required
                            value="{{ old('name', $data->name) }}">
                        @if ($errors->has('name'))
                            <div class="invalid-feedback">
                                {{ $errors->first('name') }}
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="description">Deskripsi Produk</label>
                        <textarea class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" name="description" cols="30"
                            rows="3" required>{{ old('description', $data->description) }}</textarea>
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
                                <option value="{{ $c->id }}" {{ $c->id == $data->category_id ? 'selected' : '' }}>
                                    {{ $c->name }}</option>
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
                            value="{{ old('price', $data->price) }}" required>
                        @if ($errors->has('price'))
                            <div class="invalid-feedback">
                                {{ $errors->first('price') }}
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="best_seller">Best Seller</label>
                        <select class="form-control {{ $errors->has('is_best_seller') ? 'is-invalid' : '' }}"
                            id="is_best_seller" name="is_best_seller" required>
                            <option value="ya" {{ $data->is_best_seller == 'ya' ? 'selected' : '' }}>Ya</option>
                            <option value="tidak" {{ $data->is_best_seller == 'tidak' ? 'selected' : '' }}>Tidak</option>
                        </select>
                        @if ($errors->has('category_id'))
                            <div class="invalid-feedback">
                                {{ $errors->first('category_id') }}
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="product_pict">Foto Produk</label>
                        <input type="file"
                            class="form-control-file {{ $errors->has('product_pict') ? 'is-invalid' : '' }}"
                            id="product_pict" name="product_pict">
                        @if ($errors->has('product_pict'))
                            <div class="invalid-feedback">
                                {{ $errors->first('product_pict') }}
                            </div>
                        @endif
                        <small id="emailHelp" class="form-text text-danger">Tidak perlu upload foto jika tidak
                            dirubah</small>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>

    </div>
@endsection
