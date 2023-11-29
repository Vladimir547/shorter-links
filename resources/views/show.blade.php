@extends('layouts.app')
@section('content')
    <section class='links'>
        <div class="container">
            <div class="row">
                @if($errors->any())
                    @foreach($errors->all() as $err)
                        <div class="alert alert-danger" role="alert">
                            {{ $err }}
                        </div>
                    @endforeach
                @endif
                @if(session()->has('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session()->get('success') }}
                    </div>
                @endif
                @if(session()->has('error'))
                    <div class="alert alert-danger" role="alert">
                        {{ session()->get('error') }}
                    </div>
                @endif
                <ul class="list-group list-group-flush">
                    @foreach ($links as $link)
                        <li class="list-group-item d-flex">
                            <div class="col-8">
                                <a href='{{ asset("/redirect/{$link->internal_url}") }}' class="">{{ $link->name }}</a>
                                <p class="ml-1">Просмотров: {{$link->count}}</p>
                            </div>
                            <div class="col-4 d-flex justify-content-end flex-wrap gap-3">
                                <a href='{{asset("/update/{$link->id}")}}'
                                   class="btn btn-success d-flex justify-content-center align-items-center">
                                    Изменить</a>
                                <a href='{{asset("/delete/{$link->id}")}}'
                                   class="btn btn-danger d-flex justify-content-center align-items-center">
                                    Удалить</a>
                            </div>
                        </li>
                    @endforeach
                </ul>

                <div class="pagination">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                {{ $links->onEachSide(0)->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop

