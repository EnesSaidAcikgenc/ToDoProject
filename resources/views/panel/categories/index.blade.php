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
           <h3>Kategoriler</h3>
           <a href="{{route('categories.create')}}" class="btn btn-lg btn-success" >Yeni kategori Oluştur</a>
       </div>
       <div class="card-body">
           <div class="card">
               <div class="table-responsive text-nowrap">
                   @if($categories->first())
                       <table class="table table-striped">
                           <thead>
                           <tr>
                               <th>#</th>
                               <th>Kategori Adı</th>
                               <th>Durumu</th>
                               <th>Oluşturulma Tarihi</th>
                               <th>İşlemler</th>
                           </tr>
                           </thead>

                           <tbody class="table-border-bottom-0">
                           @foreach($categories as $categorie)
                               <tr>
                                   <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{$categorie->id}}</strong></td>
                                   <td>{{$categorie->name}}</td>
                                   <td>
                                       @if($categorie->is_active == 1)
                                           Aktif
                                       @else
                                           Pasif
                                       @endif
                                   </td>
                                   <td>{{$categorie->created_at}}</td>
                                   <td>
                                       <div class="dropdown">
                                           <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                               <i class="bx bx-dots-vertical-rounded"></i>
                                           </button>
                                           <div class="dropdown-menu">
                                               <a class="dropdown-item" href="{{route('categories.edit',$categorie->id)}}"><i class="bx bx-edit-alt me-1"></i>Güncelle</a>
                                               <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-trash me-1"></i>Sil</a>
                                           </div>
                                       </div>
                                   </td>
                               </tr>
                           @endforeach
                           </tbody>

                       </table>

                   @else
                       <p>Henüz bir kategori girişi yapılmadı.</p>
                   @endif

               </div>
           </div>
       </div>
   </div>
@endsection
