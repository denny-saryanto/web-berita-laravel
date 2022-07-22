@extends('layout.dashboard')

@section('title', 'Show Article')

@section('main')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h1 class="m-0">Show Articles</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">Home</li>
                        <li class="breadcrumb-item">Articles</li>
                        <li class="breadcrumb-item active">Show</li>
                    </ol>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Articles</h3>
                            <div class="card-tools">
                                <div class="input-group input-group-sm" style="width: 150px;">
                                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-default">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover">
                                <thead>
                                    <tr class="text-center">
                                        <th class="align-middle">Title</th>
                                        <th class="align-middle">Content</th>
                                        <th class="align-middle">Image</th>
                                        <th class="align-middle">Publisher</th>
                                        <th class="align-middle">Category</th>
                                        <th colspan="2" class="align-middle">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($articles as $data)
                                    <tr>
                                        <td>{{ $data->title }}</td>
                                        <td>{{ $data->content }}</td>
                                        <td>{{ $data->image }}</td>
                                        <td class="text-center align-middle">{{ $data->username }}</td>
                                        <td class="text-center align-middle">{{ $data->categoryname }}</td>
                                        <td class="align-middle">
                                            <button id="btnUpdate" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#updateModal" onclick="setData('{{ $data->id }}', '{{ $data->title }}', '{{ $data->content }}', '{{ $data->image }}')">Update</button>
                                        </td>
                                        <td class="align-middle"><button class="btn btn-sm btn-danger" onclick="deleteData({{ $data->id }})">Delete</button></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer clearfix">
                            {{ $articles->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-center" id="exampleModalLabel">Update Data</h5>
                    {{-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> --}}
                </div>
                <div class="modal-body">
                    <form method="POST">
                        @csrf
                        Title : <input id="titleForm" class="form-control" type="text" name="title">
                        Content : <textarea id="contentForm" class="form-control" type="text" name="content" rows="3" style="resize:none"></textarea>
                        Image : <input id="imageForm" class="form-control" type="text" name="image">
                        <input type="hidden" id="newsId" value="">
                    </form>
                </div>
                <div class="modal-footer">
                    <button id="saveModal" type="button" class="btn btn-primary" onclick="updateData()">Save changes</button>
                    <button id="closeModal" type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('javascript')
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script>
        $(document).ready( () => {

            deleteData = (id) => {
                let token = `{{ Cookie::get('access_token') }}`;
                $.ajax({
                    url: '/api/v1/articles/delete',
                    type: 'DELETE',
                    dataType: 'JSON',
                    contentType: 'application/json',
                    beforeSend: function(request) {
                        request.setRequestHeader("Authorization", "Bearer "+token);
                    },
                    data: JSON.stringify({
                        id: id,
                    }),
                }).done( (response) => {
                    window.alert(response.message);
                    window.location = '{{ route("articles.show") }}';
                }).fail( (error) => {
                    window.alert(error.responseJSON.message);
                });
            }

            setData = (id, title, content, image) => {
                $('#titleForm').val(title);
                $('#contentForm').val(content);
                $('#imageForm').val(image);
                $('#newsId').val(id);
            }

            updateData = () => {
                let token = `{{ Cookie::get('access_token') }}`;
                $.ajax({
                    url: '/api/v1/articles/update',
                    type: 'PUT',
                    dataType: 'JSON',
                    contentType: 'application/json',
                    beforeSend: function(request) {
                        request.setRequestHeader("Authorization", "Bearer "+token);
                    },
                    data: JSON.stringify({
                        id: $('#newsId').val(),
                        data : [
                            {
                                title: $('#titleForm').val(),
                                content: $('#contentForm').val(),
                                image: $('#imageForm').val(),
                                user_id: {{ Auth::user()->id }},
                            }
                        ]
                    }),
                }).done( (response) => {
                    window.alert(response.message);
                    window.location = '{{ route("articles.show") }}';
                }).fail( (error) => {
                    console.log(error);
                    window.alert(error.responseJSON.message);
                });
            }
        });
    </script>
@endsection