@extends('admin.parent')
@section('title', 'Edit Category')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">edit category</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{ route('categories.update',$category->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            @if ($errors->any())
                                <div class="alert alert-danger alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    <h5><i class="icon fas fa-ban"></i> Errors!</h5>
                                    @foreach ($errors->all() as $error)
                                        <li> {{ $error }}</li>
                                    @endforeach
                                </div>
                            @endif
                            <div class="form-group">
                                <label for="exampleInputEmail1">Category Name</label>
                                <input type="text" class="form-control"
                                    @if (old('name')) value="{{ old('name') }}" @else value="{{ $category->name }}" @endif
                                    id="exampleInputEmail1" placeholder="Enter category name" name="name">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Description</label>
                                <input type="text" class="form-control"
                                    @if (old('description')) value="{{ old('description') }}" @else value="{{ $category->description }}" @endif
                                    id="exampleInputPassword1" placeholder="Enter category description" name="description">
                            </div>
                            <div class="form-group">
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="customSwitch1"
                                        @if ($category->is_visible) checked @endif name="is_visible">
                                    <label class="custom-control-label" for="customSwitch1">Visible</label>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
