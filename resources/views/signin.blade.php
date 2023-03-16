@extends('layout.layout')

@section('content')
    <section class="singup">
        <h1>
            Аунтентификация
        </h1>

        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger" role="alert">
                    {{$error}}
                </div>
            @endforeach
        @endif

        <form action="{{ route('auth.signin') }}" class="form-signup" method="POST" enctype="multipart/form-data">
            @csrf
            <div>
                <label for="email">Почта</label>
                <input placeholder="Почта" type="text" name="email" id="email">
            </div>
            <div>
                <label for="password">Пароль</label>
                <input placeholder="Пароль" type="password" name="password" id="password">
            </div>

            <button>Войти</button>
        </form>
    </section>
@endsection
