@extends('admin.parent')
@section('title', 'Books')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Books Table</h3>
                </div>

                <!-- /.card-header -->
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Active</th>
                                <th>Category</th>
                                <th>Language</th>
                                <th>Year</th>
                                <th>Quantity</th>
                                <th>Created_At</th>
                                <th>Updated_At</th>
                                <th>Settings</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $book)
                                <tr>
                                    <td>{{ $book->id }}</td>
                                    <td>{{ $book->name }}</td>
                                    <td>
                                        <span
                                            class="badge @if ($book->active == 0) bg-danger @else bg-success @endif">{{ $book->active_name }}</span>
                                    </td>
                                    <td>{{ $book->category->name }}</td>
                                    <td>{{ $book->language_name }}</td>
                                    <td>{{ $book->year }}</td>
                                    <td>{{ $book->quantity }}</td>
                                    <td>{{ $book->created_at }}</td>
                                    <td>{{ $book->updated_at }}</td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="{{ route('books.edit', $book->id) }}" class="btn btn-info">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a onclick="destroy({{ $book->id }},this , '/admin/books/')" class="btn btn-danger">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
                <div class="card-footer clearfix">
                    <ul class="pagination pagination-sm m-0 float-right">
                        <li class="page-item"><a class="page-link" href="#">«</a></li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">»</a></li>
                    </ul>
                </div>
            </div>

        </div>
    </div>
    <script>
    </script>
@endsection

