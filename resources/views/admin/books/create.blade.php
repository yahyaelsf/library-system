@extends('admin.parent')
@section('style')
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('admin/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
@endsection
@section('title', 'Create Book')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">create Book</h3>
                    </div>

                    <!-- /.card-header -->
                    <!-- form start -->
                    <form method="POST" id="reset-form">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label>Category</label>
                                <select class="form-control select2" style="width: 100%;" id="category_id"
                                    name="category_id">

                                    {{-- <option selected="selected">Alabama</option> --}}
                                    @foreach ($data as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1"> Name</label>
                                <input type="text" class="form-control" id="name" placeholder="Enter book name"
                                    name="name">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1"> Year</label>
                                <input type="number" class="form-control" id="year" placeholder="Enter book year"
                                    name="year">
                            </div>
                            <div class="form-group">
                                <label>Language</label>
                                <select class="form-control select2" style="width: 100%;" id="language" name="language">
                                    <option  value="en">English</option>
                                    <option  value="ar">Arabic</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Quantity</label>
                                <input type="number" class="form-control" id="quantity" placeholder="Enter book Quantity"
                                    name="quantity">
                            </div>
                            <div class="form-group">
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="active" checked
                                        name="active">
                                    <label class="custom-control-label" for="customSwitch1">Active</label>
                                </div>
                            </div>
                        </div>

                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="button" onclick="createItem()" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

<script>
    function createItem() {
        let data = {
            category_id: document.getElementById('category_id').value,
            name: document.getElementById('name').value,
            year: document.getElementById('year').value,
            language: document.getElementById('language').value,
            quantity: document.getElementById('quantity').value,
            active: document.getElementById('active').checked

        }
        store('/admin/books', data);
    }
</script>
@section('script')
    <!-- Select2 -->
    <script src="{{ asset('admin/plugins/select2/js/select2.full.min.js') }}"></script>
    <script>
        //  $('.select2').select2()

        //Initialize Select2 Elements
        $('.select2').select2({
            theme: 'bootstrap4'
        })
    </script>
@endsection
