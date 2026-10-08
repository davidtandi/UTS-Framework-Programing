@extends('layouts.app')

@section('content')

<div class="card shadow-sm">
    <div class="card-body">

        <h3>Tambah Buku Baru</h3>

        <form action="{{ route('books.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label class="form-label">Judul Buku</label>

                <input
                    type="text"
                    name="title"
                    class="form-control @error('title') is-invalid @enderror"
                    value="{{ old('title') }}"
                >

                @error('title')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Kategori</label>

                <select
                    name="category_id"
                    class="form-control @error('category_id') is-invalid @enderror"
                >
                    <option value="">-- Pilih Kategori --</option>

                    @foreach($categories as $cat)
                        <option
                            value="{{ $cat->id }}"
                            {{ old('category_id') == $cat->id ? 'selected' : '' }}
                        >
                            {{ $cat->name }}
                        </option>
                    @endforeach
                </select>

                @error('category_id')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Penulis</label>

                <input
                    type="text"
                    name="author"
                    class="form-control @error('author') is-invalid @enderror"
                    value="{{ old('author') }}"
                >

                @error('author')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Tahun Terbit</label>

                <input
                    type="number"
                    name="published_year"
                    class="form-control @error('published_year') is-invalid @enderror"
                    value="{{ old('published_year') }}"
                >

                @error('published_year')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Stok</label>

                <input
                    type="number"
                    name="stock"
                    class="form-control @error('stock') is-invalid @enderror"
                    value="{{ old('stock') }}"
                >

                @error('stock')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <button type="submit" class="btn btn-success">
                Simpan Buku
            </button>

            <a href="{{ route('books.index') }}" class="btn btn-secondary">
                Kembali
            </a>

        </form>

    </div>
</div>

@endsection