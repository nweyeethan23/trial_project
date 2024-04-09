@extends('layouts.app')

@section('content')
<div class="home-container">
    <div class="row home">
        <div class="col-4 col-sm-4 col-md-4">
            <a href="{{ route('clinics') }}" class="btn home-btn">診察時間編集</a>
        </div>
        <div class="col-4 col-sm-4 col-md-4">
            <a href="{{ route('long_vocation') }}" class="btn home-btn">長期休業設定</a>
        </div>
        <div class="col-4 col-sm-4 col-md-4 home-div-bg"></div>
    </div>
    <div class="row home mt-5">
        <div class="col-4 col-sm-4 col-md-4 home-div-bg"></div>
    </div>
    <div class="row home mt-5">
        <div class="col-4 col-sm-4 col-md-4">
            <a href="{{ route('user') }}" class="btn home-btn">アカウント情報t</a>
        </div>
    </div>
</div>
@endsection
