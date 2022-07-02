@extends('admin.parent')
@section('title', 'Create Country')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">create country</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form method="POST" id="reset-form">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Country Name</label>
                                <input type="text" class="form-control"
                                    id="name" placeholder="Enter category name" name="name">
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
function createItem(){
    let data =  {name: document.getElementById('name').value}
    store('/admin/countries',data);
}
</script>
