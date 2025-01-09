@extends('panel.layout.app')
@section('content')

    <div class="card p-2">
        <div class="card-header">
           <h2> Görev Oluştur. </h2>
        </div>

        <div class="card-body">
            <form action="{{route('addTask')}}" method="post">
                @csrf
                <div class="card-body">
                    <div>
                        <label for="defaultFormControlInput" class="form-label">Başlık :</label>
                        <input type="text" class="form-control" name="title" id="title">

                        <label for="defaultFormControlInput" class="form-label">İçerik :</label>
                        <input type="text" class="form-control" name="content" id="content">

                        <label for="defaultFormControlInput" class="form-label">Durum :</label>
                        <select name="status" id="status" class="form-control">
                            <option selected disabled>Lütfen seçim yapınız</option>
                            <option value="0">Yapılmadı</option>
                            <option value="1">Yapılıyor</option>
                            <option value="2">Ertelendi</option>
                            <option value="3">İptal Edildi</option>
                        </select>

                        <label for="defaultFormControlInput" class="form-label">Bitiş tarihi :</label>
                        <input type="datetime-local" class="form-control" name="deadline" id="deadline">

                        <button type="submit" class="btn btn-primary mt-3">Gönder</button>
                    </div>
                </div>

            </form>
        </div>
    </div>

@endsection
