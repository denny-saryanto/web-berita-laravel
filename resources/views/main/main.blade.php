@extends('layout.main')

@section('title', 'Home')

@section('main')
    <div class="content-header">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Articles</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a>Home</a></li>
                        <li class="breadcrumb-item active"><a>Articles</a></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="container">
            <div class="row">
                @foreach ($articles as $data)
                    <!-- Article -->
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header bg-white">
                                <div class="row">
                                    <div class="col-10">
                                        <h3 class="card-title">
                                            <a>{{ $data->title }}</a>
                                        </h3>
                                    </div>
                                    <div class="col-2">
                                        <div class="card-tools">
                                            <span class="badge badge-primary"><a class="text-white text-decoration-none" href="{{ route('category.id', $data->category_id) }}">{{ $data->categoryname }}</a></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <p class="card-text">
                                    Some Text Content Article
                                </p>
                                <a href="{{ route('articles.detail', $data->id) }}" class="card-link btn btn-sm btn-primary float-right">Read More</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection