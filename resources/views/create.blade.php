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
        <form action="{{ route('generate') }}" method="POST" class="form">
            @csrf
            <div class="form-group">
                <label for="url_external">Внешняя ссылка</label>
                <input type="texxt" class="form-control" id="url_external" name="url_external"
                       aria-describedby="external" placeholder="https:\\" required>
                <div id="validationUrlFeedback" class="invalid-feedback">
                    Ссылка должна быть в формате https://www.youtube.com/.
                </div>
            </div>
            <div class="form-group">
                <label for="url_internal">Внутреняя ссылка</label>
                <input type="text" class="form-control" id="url_internal" name="url_internal"
                       placeholder="Короткая ссылка ">
                <div id="validationUrlFeedback" class="invalid-feedback">
                    Только буквы и цифры.
                </div>
            </div>
            <div class="form-group">
                <label for="url_name">Название</label>
                <input type="text" class="form-control" id="url_name" name="url_name" placeholder="Название" required>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary mt-3" id="create">Отправить</button>
            </div>
        </form>
    </div>

@stop
