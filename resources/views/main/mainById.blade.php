@extends('layout.main')

@section('title', 'Article')
    
@section('main')
    <div class="content-header">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-left">
                        <li class="breadcrumb-item"><a>Home</a></li>
                        <li class="breadcrumb-item"><a>Articles</a></li>
                        <li class="breadcrumb-item"><a>{{ $article->id }}</a></li>
                    </ol>
                </div>
                <div class="col-sm-6">
                    <div class="float-sm-right">
                        Publish on {{ $article->created_at }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h2><b>{{ $article->title }}</b><h2>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div id="content"></div>
                            {{-- {{ $article->content }} --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('javascript')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(() => {

            decodeHtml = (html) => {
                var txt = document.createElement("textarea");
                txt.innerHTML = html;
                return txt.value;
            }

            let text = decodeHtml(`{{ $article->content }}`);
            // let strnew = text.replace("\n", '<br>');

            console.log(decodeHtml(text));

            $('#content').append(decodeHtml(text));
        });
    </script>
@endsection