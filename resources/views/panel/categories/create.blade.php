@extends('panel.layout.app')
@section('content')

<div class="card p-2">
    <div class="card-header">
        <h2>Kategori Oluştur</h2>
    </div>
    <div class="card-body">
        <form action="{{route('categories.add')}}" method="POST">
            @csrf
            <label for="defaultFormControlInput" class="form-label">Kategori Adı : </label>
            <input type="text" class="form-control" name="name">
            <label for="defaultFormControlInput" class="form-label mt-3">Kategori Durumu : </label>
            <select name="is_active" id="is_active" class="form-select">
                <option selected disabled>Durum Seçin</option>
                <option value="1">Aktif</option>
                <option value="0">Pasif</option>
            </select>
            <button type="submit" class="btn btn-info mt-3">Kaydet</button>
        </form>
    </div>
</div>

@endsection
