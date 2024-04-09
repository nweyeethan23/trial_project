@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center login-form">
        <div class="col-md-5">
            <div class="card">
                <div class="card-body mt-4 mb-4">
                    <div class="text-center mb-5">管理画面ログイン</div>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">ログインID</label>

                            <div class="col-md-6">
                                <input id="email" type="email" name="email" value="{{ old('email') }}" class="form-control email" required autocomplete="email" autofocus>
                                @if(session('email') == 'invalid')
                                    <div class="text-danger fw-semibold mt-3">Login ID does not exist</div>
                                @endif
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">パスワード</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control password" name="password" required autocomplete="current-password">
                                @if(session('password') == 'incorrect')
                                    <div class="text-danger fw-semibold mt-3">Password is incorrect</div>
                                @endif
                            </div>
                        </div>
                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    ログイン
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
