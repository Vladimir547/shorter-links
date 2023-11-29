@extends('layouts.app')
@section('content')
    <div class="container">
     <div class="row">
         <ul class="list-group list-group-flush">
         @foreach ($links as $link)
                 <li class="list-group-item d-flex">
                     <div class="col-8">
                         <a href='{{ asset("/redirect/{$link->internal_url}") }}' class="">{{ $link->name }}</a>
                         <p class="ml-1">Просмотров: {{$link->count}}</p>
                     </div>
                     <div class="col-4 d-flex justify-content-end flex-wrap gap-3">
                         <button class="btn btn-success"> Изменить</button>
                         <button class="btn btn-danger">Удалить</button>
                     </div>
                 </li>
         @endforeach
         </ul>

         <section class="pagination">
                 <div class="container">
                     <div class="row">
                         <div class="col-12">
                             {{ $links->onEachSide(0)->links() }}
                         </div>
                     </div>
                 </div>
     </div>
    </div>
@stop

