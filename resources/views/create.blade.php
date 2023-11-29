@extends('layouts.app')
@section('content')
    <div class="container col-lg-6 col-md-9 col-12">
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
        <form action="{{ route('generate') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="url_external">Внешняя ссылка</label>
                <input type="texxt" class="form-control" id="url_external" name="url_external"
                       aria-describedby="external" placeholder="https:\\" required>
            </div>
            <div class="form-group">
                <label for="url_internal">Веутреняя ссылка</label>
                <input type="text" class="form-control" id="url_internal" name="url_internal"
                       placeholder="Короткая ссылка ">
            </div>
            <div class="form-group">
                <label for="url_name">Название</label>
                <input type="text" class="form-control" id="url_name" name="url_name" placeholder="Название" required>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary mt-3">Отправить</button>
            </div>
        </form>
    </div>

@stop
