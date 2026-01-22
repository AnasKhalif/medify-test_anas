@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="form-group mb-2">
                    <a href="{{ url('category-items') }}" class="btn btn-secondary">Kembali ke Daftar Kategori</a>
                </div>

                <div class="card">
                    <div class="card-header">Detail Kategori</div>
                    <div class="card-body">
                        <table class="table">
                            <tr>
                                <th>Nama Kategori</th>
                                <td>:</td>
                                <td>{{ $category->name }}</td>
                            </tr>
                            <tr>
                                <th>Kode Kategori</th>
                                <td>:</td>
                                <td>{{ $category->kode }}</td>
                            </tr>
                            <tr>
                                <th>Dibuat</th>
                                <td>:</td>
                                <td>{{ $category->created_at->format('d/m/Y H:i') }}</td>
                            </tr>
                        </table>
                    </div>
                </div>

                <!-- Daftar Master Items dengan kategori ini -->
                <div class="card mt-3">
                    <div class="card-header">Master Items dengan Kategori "{{ $category->name }}"</div>
                    <div class="card-body">
                        @if ($masterItems->count() > 0)
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Kode</th>
                                        <th>Nama Item</th>
                                        <th>Jenis</th>
                                        <th>Harga Beli</th>
                                        <th>Supplier</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($masterItems as $item)
                                        <tr>
                                            <td>{{ $item->kode }}</td>
                                            <td>{{ $item->nama }}</td>
                                            <td>{{ $item->jenis }}</td>
                                            <td>Rp {{ number_format($item->harga_beli) }}</td>
                                            <td>{{ $item->supplier }}</td>
                                            <td>
                                                <a href="{{ url('master-items/view/' . $item->kode) }}"
                                                    class="btn btn-sm btn-info">Detail</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <p class="text-muted">Belum ada Master Items dengan kategori ini.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
