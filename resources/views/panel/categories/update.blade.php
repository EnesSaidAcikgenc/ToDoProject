@extends('panel.layout.app')
@section('content')
<div class="card">
    <div class="card-header">
   <h3>Güncelleme Sayfası</h3>
        @if($errors->any())
            <div class="alert alert-danger alert-dismissible" role="alert">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </ul>
            </div>
        @endif

    </div>
    <div class="card-body">
{{--        parametre ile idyi göndermek istediğinizde aşağıdaki routeun içinede , $değişken adı ->id diyorsunuz.--}}
        <form action="{{route('categories.update')}}" method="POST">
            @csrf
        <input type="hidden" value="{{$c->id}}" name="catID">

            <label for="">Kategori Adı :</label>
            <input type="text" class="form-control" value="{{$c->name}}" name="name">

            <label for="" class="mt-3">Kategori Durumu :</label>
            <select name="is_active" id="is_active" class="form-select" >
                <option value="1" @if($c->is_active == 1) selected @endif >Aktif</option>
                <option value="0" @if($c->is_active == 0) selected @endif >Pasif</option>
            </select>

            <button type="submit" class="btn btn-primary mt-3">Güncelle</button>
        </form>
    </div>
</div>

@endsection
