@extends('panel.layout.app')
@section('content')

    <div class="card p-3">
        <div>
            @if(session('success'))
                <div class="alert alert-success alert-dismissible" role="alert">
                    {{session('success')}}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger alert-dismissible" role="alert">
                    {{session('error')}}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

        </div>
        <div class="card-header">
            <h3>Tasklar Tablosu</h3>
            <a href="{{route('create')}}" class="btn btn-success mt-3">Yeni Task Oluştur</a>
        </div>
        <div class="card-body">
            <div class="card">
                <div class="table-responsive text-nowrap">
                    @if($tasks->first())
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Task Başlığı</th>
                                <th>İçeriği</th>
                                <th>Kategorisi</th>
                                <th>Kategori Durumu</th>
                                <th>Durumu</th>
                                <th>Oluşturulma Tarihi</th>
                                <th>Bitiş Tarihi</th>
                                <th>İşlemler</th>
                            </tr>
                            </thead>

                            <tbody class="table-border-bottom-0">
                            @foreach($tasks as $task)
                                <tr>
                                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{$task->id}}</strong></td>
                                    <td>{{$task->title}}</td>
                                    <td>{{$task->content}}</td>
                                    <td>{{$task->category_id}}</td>
                                    <td>
                                        @if($task->is_active == 1)
                                            Aktif
                                        @else
                                            Pasif
                                        @endif
                                    </td>
                                    <td>{{$task->status}}</td>
                                    <td>{{$task->created_at->diffForHumans()}}</td>
                                    <td>{{$task->deadline}}</td>
                                    <td>
                                        <div class="dropdown">
                                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                                <i class="bx bx-dots-vertical-rounded"></i>
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href=""><i class="bx bx-edit-alt me-1"></i>Güncelle</a>
                                                <a class="dropdown-item" href=""><i class="bx bx-trash me-1"></i>Sil</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>

                        </table>

                    @else
                        <p>Henüz bir task girişi yapılmadı.</p>
                    @endif

                </div>
            </div>
        </div>
    </div>

@endsection
