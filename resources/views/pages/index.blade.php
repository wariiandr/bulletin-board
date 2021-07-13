@extends('layouts.main-layout')

@section('title', isset($category) ? $category['title'] : 'Bulletin Board')

@section('ads_title', isset($category) ? 'Newest ads in a category ' . $category['title'] : 'Newest ads')

@section('header')
<header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <a class="fs-3 navbar-brand" href="/">Bulletin Board</a>
            <div class="collapse navbar-collapse d-flex justify-content-between" id="navbarNav">
                <div>
                    <ul class="navbar-nav">
                    @foreach($categories as $category)
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="/category/{{ $category['title'] }}"> 
                                {{$category['title']}} 
                            </a>
                        </li>
                    @endforeach
                    </ul>
                </div>

                <div class="dropdown me-5">
                    <div class= "btn-group dropstart">
                        <button type="button" class="btn btn-outline-light dropdown-toggle" data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false">
                            Name
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-lg-start">
                            <li><a class="dropdown-item" href="#">My ads</a></li>
                            <li><a class="dropdown-item" href="#">Place an ad</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <div class="input-group mt-4 mx-auto w-75">
        <button type="button" class="btn btn-outline-secondary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
            Category
        </button>
        <ul class="dropdown-menu">
        @foreach($categories as $category)
            <li class="nav-item">
                {{$category['title']}} 
            </li>
        @endforeach
        </ul>
        <input type="text" class="form-control" placeholder="Search ads">
        <button type="button" class="btn btn-outline-secondary">Search</button>
    </div>

</header>
@endsection

@section('newest-ads')

<div class="mt-4 mx-4">
    <h2>@yield("ads_title")</h2>

    <div class="mt-4">
        @forelse($ads as $ad)
        <div>
            <h3>{{ $ad['title'] }}</h3>
            <div>
                <div class="h-100">
                    <img class="newest-ads__img" src="/img/{{ $ad['image'] }}" alt="{{ $ad['image'] }}">
                    <div class="newest-ads__text h-100 fs-6 d-inline-block mx-3">
                        <p>Author: {{$ad->user['name']}} </p>
                        <p>
                            Category: <a href="/category/{{ $ad->category['title'] }}"> {{$ad->category['title']}} </a> 
                        </p>
                        <p>
                            Price: {{ $ad['price'] }} RUB
                        </p>
                    </div>
                </div>
                <p class="mt-2">{{ $ad['text'] }}</p>
            </div>
            <hr>
            @empty
            <p class="fs-3 fw-bold font-monospace text-danger">Ads not found!</p>
        </div>
        @endforelse
    </div>

</div>

@endsection