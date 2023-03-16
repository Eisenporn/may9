@extends('layout.layout')

@section('content')
    <section class="singup">
        <h1>
            Регистрация
        </h1>

        @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div class="alert alert-danger" role="alert">
                {{$error}}
            </div>
        @endforeach

        @endif

        <form action="{{ route('auth.signup') }}" class="form-signup" method="POST" enctype="multipart/form-data">
            @csrf
            <div>
                <label for="name">Имя пользователя</label>
                <input placeholder="Имя пользователя" type="text" name="name" id="name">
            </div>
            <div>
                <label for="email">Почта</label>
                <input placeholder="Почта" type="text" name="email" id="email">
            </div>
            <div>
                <label for="password">Пароль</label>
                <input placeholder="Пароль" type="password" name="password" id="password">
            </div>
            <div>
                <label for="re_password">Подверждение пароля</label>
                <input placeholder="Подверждение пароля" type="password" name="re_password" id="re_password">
            </div>

            <button>Зарегистрироваться</button>
        </form>
    </section>
@endsection
