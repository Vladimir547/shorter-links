@extends('layouts.app')
@section('content')
    <div class="container col-lg-6 col-md-9 col-12">
        <form>
            <div class="form-group">
                <label for="url_external">Внешняя ссылка</label>
                <input type="texxt" class="form-control" id="url_external" aria-describedby="external" placeholder="https:\\">
            </div>
            <div class="form-group">
                <label for="url_internal">Веутреняя ссылка</label>
                <input type="text" class="form-control" id="url_internal" placeholder="Короткая ссылка ">
            </div>
            <div class="form-group">
                <label for="url_name">Название</label>
                <input type="text" class="form-control" id="url_name" placeholder="Название">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary mt-3">Отправить</button>
            </div>
        </form>
    </div>

@stop
