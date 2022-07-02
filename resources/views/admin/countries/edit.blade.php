@extends('admin.parent')
@section('title', 'Edit Category')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">edit country</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Country Name</label>
                                <input type="text" class="form-control"
                                    value="{{ $country->name }}"
                                    id="name" placeholder="Enter category name" name="name">
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="button" onclick="updateItem({{$country->id}})" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
<script>
  function updateItem(id) {
        let data = { name: document.getElementById('name').value }
        update('/admin/countries/'+id , data , '/admin/countries')
    }
</script>
