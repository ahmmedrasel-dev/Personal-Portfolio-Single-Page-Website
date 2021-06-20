@extends('backend.master')
@section('active')
    active
    open
@endsection
@section('category-active')
    active
@endsection
@section('content')
    <div class="page-inner" style="min-height:663px !important">
        <div class="page-title">
            <div class="page-breadcrumb">
                <ol class="breadcrumb">
                    <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li class="active">Category</li>
                </ol>
            </div>
        </div>
        <div id="main-wrapper">
            <div class="row">
                {{-- Category List View --}}
                <div class="col-md-6">
                    <div class="panel panel-white p-4">
                        <div class="panel-heading clearfix">
                            <h4 class="panel-title">Category List</h4>
                        </div>
                        <div class="panel-body">
                            <table id="datatable" class="table display">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Category Name</th>
                                        <th>Total Project</th>
                                        <th>Action</th>
                                </thead>

                                <tbody>
                                    @foreach ( $categories as $key => $category )
                                        <tr>
                                            <td>{{ $key + 1}}</td>
                                            <td>{{ $category->category_name }}</td>
                                            <td>{{ $category->Project->count() }}</td>
                                            <td>
                                                <form action="{{ route('category.destroy', $category->id) }}" method="POST">
                                                    @if ($category->id == 1)
                                                        <button class="btn btn-danger" disabled >Not Allow</button>
                                                     @else
                                                        <a href="{{ route('category.edit', $category->id) }}" class="btn btn-info">Edit</a>
                                                        @csrf
                                                        @method('DELETE')
                                                        <button  class="btn btn-danger">Delete</button>
                                                    @endif
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                {{-- Category Add Form --}}
                <div class="col-md-6">
                    <div class="panel panel-white p-4">
                        <div class="panel-heading clearfix">
                            <h3 class="panel-title">Add Category</h3>
                        </div>
                        <div class="panel-body">
                            <form action="{{ route('category.store') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="category">Category Name</label>
                                    <input type="text" class="form-control m-t-xxs" id="category" name="category_name" placeholder="Enter  Category Name">
                                </div>

                                <div class="form-group">
                                    <label>Category Slug</label>
                                    <input type="text" class="form-control m-t-xxs" id="slug" name="category_slug" placeholder="Category Slug">
                                </div>

                                <button type="submit" class="btn btn-info">Add Category</button>
                            </form>
                        </div>

                        {{-- Error Message Dispaly --}}
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                    </div>
                </div>
            </div>
        </div><!-- Main Wrapper -->
        <div class="page-footer">
            <p class="no-s">Made with <i class="fa fa-heart"></i> by rasel</p>
        </div>
    </div>
@endsection
@section('footer_js')
    <script type="text/javascript">
        // Data Table
        $(document).ready(function() {
            $('#datatable').DataTable();
            //Buttons examples
            var table = $('#datatable-buttons').DataTable({
                lengthChange: false,
                buttons: ['copy', 'excel', 'pdf', 'colvis']
            });

            table.buttons().container().appendTo('#datatable-buttons_wrapper .col-md-6:eq(0)');

        } );

        // Add Permalink Slug.
        $('#category').keyup(function() {
            $('#slug').val($(this).val().toLowerCase().split(',').join('').replace(/\s/g,"-"));
        });

    </script>
@endsection
