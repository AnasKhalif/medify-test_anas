<form method="POST">
    @csrf
    @if ($method == 'edit')
        <div class="form-group">
            <label>Kode Kategori</label>
            <input type="text" class="form-control" name="kode" required readonly value="{{ $item->kode ?? '' }}">
        </div>
    @endif

    <div class="form-group">
        <label>Nama Kategori</label>
        <input type="text" class="form-control" name="name" required value="{{ $item->name ?? '' }}">
    </div>

    <button type="submit" class="btn btn-primary mt-3">
        @if ($method == 'new')
            Simpan
        @else
            Update
        @endif
    </button>
    <a href="{{ url('category-items') }}" class="btn btn-secondary mt-3 ms-2">Batal</a>
</form>
