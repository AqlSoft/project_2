@extends('layouts.admin')
@section('header-links')
    <li class="breadcrumb-item"><a href="/admin/stores/home">Stores</a></li>
    <li class="breadcrumb-item active" aria-current="page">Home</li>
@endsection
@section('contents')
    <h1 class="mt-3">Stores Home</h1>
    <div class="row">
        <div class="col col-12 col-sm-6 col-lg-4">
            <a class="fw-bold" href="/admin/stores/index" class="link-item">
                <i class="fa fa-home fa-2x"></i>
                <span class="">All Stores</span>
            </a>
        </div>
        <div class="col col-12 col-sm-6 col-lg-4">
            <a class="fw-bold" href={{route('display-recepits-list',['0' ,'0'])}}" class="link-item">
                <i class="fa fa-home fa-2x"></i>
                <span class="">All Receipts</span>
            </a>
        </div>
    
        <div class="col col-12 col-sm-6 col-lg-4 mt-5">
            <a class="fw-bold" href="{{route('display-recepit-copy', ['0', '0'])}}" class="link-item">
                <i class="fa fa-home fa-2x"></i>
                <span class="">Receipts Copy</span>
            </a>
        </div>
    </div>
    <script></script>
@endsection
