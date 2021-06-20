@extends('backend.master')
@section('service-active')
    active
    open
@endsection
@section('service-sub-active')
    active
@endsection
@section('content')
    <div class="page-inner" style="min-height:663px !important">
        <div class="page-title">
            <div class="page-breadcrumb">
                <ol class="breadcrumb">
                    <li><a href="{{ route('service.index') }}">Service</a></li>
                    <li class="active">Service Edit</li>
                </ol>
            </div>
        </div>
        <div id="main-wrapper">
            <div class="row">
                {{-- Category Add Form --}}
                <div class="col-md-12">
                    <div class="panel panel-white p-4">
                        <div class="panel-heading clearfix">
                            <h3 class="panel-title">Edit Service</h3>
                        </div>
                        <div class="panel-body">
                            <form action="{{ route('service.update', $services->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="skill_name">Service Name</label>
                                    <input type="text" class="form-control m-t-xxs" id="title" name="title" value="{{ $services->title }}">
                                </div>

                                <div class="form-group">
                                    <label for="icon">Service Icon</label>
                                    <input type="text" class="form-control m-t-xxs" id="icon" name="icon" value="{{ $services->icon }}">
                                </div>

                                <div class="form-group">
                                    <label class="control-label" for="summary">Service Sumamry</label>
                                    <textarea class="form-control m-t-xxs" name="summary" id="summary">{{ $services->summary }}</textarea>
                                </div>

                                <button type="submit" class="btn btn-info">Update Service</button>
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
<script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
<script>
    var options = {
      filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
      filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
      filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
      filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
    };

    CKEDITOR.replace('summary', options);
  </script>
@endsection
