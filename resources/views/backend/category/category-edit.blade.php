@extends('backend.master')
@section('content')
    <div class="page-inner" style="min-height:663px !important">
        <div class="page-title">
            <div class="page-breadcrumb">
                <ol class="breadcrumb">
                    <li><a href="{{ route('category.index') }}">Category</a></li>
                    <li class="active">Category Edit</li>
                </ol>
            </div>
        </div>
        <div id="main-wrapper">
            <div class="row">
                {{-- Category Add Form --}}
                <div class="col-md-6 col-md-offset-3">
                    <div class="panel panel-white p-4">
                        <div class="panel-heading clearfix">
                            <h3 class="panel-title">Eidt Category</h3>
                        </div>

                        <div class="panel-body">
                            <form action="{{ route('category.update', $category->id) }}" method="POST">
                                @csrf
                                @method('PUT')

                                <div class="form-group">
                                    <label for="category">Category Name</label>
                                    <input type="text" name="category_name" class="form-control m-t-xxs" id="category" value="{{ $category->category_name }}" name="category" placeholder="Enter  Category Name">
                                </div>

                                <div class="form-group">
                                    <label>Category Slug</label>
                                    <input type="text" name="category_slug" class="form-control m-t-xxs" id="slug" value="{{ $category->category_slug }}" name="slug" placeholder="Category Slug">
                                </div>

                                <button type="submit" class="btn btn-info">Update Category</button>
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
        // Add Permalink Slug.
        $('#category').keyup(function() {
            $('#slug').val($(this).val().toLowerCase().split(',').join('').replace(/\s/g,"-"));
        });

        setTimeout(function() {
        toastr.options = {
            closeButton: true,
            progressBar: true,
            showMethod: 'fadeIn',
            hideMethod: 'fadeOut',
            timeOut: 5000
        };
    }, 1800);
    </script>
@endsection
