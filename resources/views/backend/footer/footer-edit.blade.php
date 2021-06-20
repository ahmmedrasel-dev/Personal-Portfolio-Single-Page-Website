@extends('backend.master')
@section('footer-active')
    active
    open
@endsection
@section('footer-sub-active')
    active
@endsection
@section('content')
    <div class="page-inner" style="min-height:663px !important">
        <div class="page-title">
            <div class="page-breadcrumb">
                <ol class="breadcrumb">
                    <li><a href="{{ route('footer.index') }}">Footer</a></li>
                    <li class="active">Footer Edit</li>
                </ol>
            </div>
        </div>
        <div id="main-wrapper">
            <div class="row">
                {{-- Category Add Form --}}
                <div class="col-md-12">
                    <div class="panel panel-white p-4">
                        <div class="panel-heading clearfix">
                            <h3 class="panel-title">Edit Footer</h3>
                        </div>
                        <div class="panel-body">
                            <form action="{{ route('footer.update', $footer->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="fiverr">Fiverr</label>
                                        <input type="text" class="form-control m-t-xxs" id="fiverr" name="fiverr" value="{{ $footer->fiverr }}">
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="upwork">Upwork</label>
                                        <input type="text" class="form-control m-t-xxs" id="upwork" name="upwork" value="{{ $footer->upwork }}">
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="fiverr">Freelancer</label>
                                        <input type="text" class="form-control m-t-xxs" id="freelancer" name="freelancer" value="{{ $footer->freelancer }}">
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="peopleperhour">People Per Hour</label>
                                        <input type="text" class="form-control m-t-xxs" id="peopleperhour" name="peopleperhour" value="{{ $footer->peopleperhour }}">
                                    </div>

                                    <div class="col-md-12">
                                        <label for="footer_text">Footer Text</label>
                                        <textarea class="form-control m-t-xxs" name="footer_text" id="footer_text">{{ $footer->footer_text }}</textarea>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="text-ceter col-md-6 col-md-offset-3 m-t-xs">
                                        <button type="submit" class="btn btn-info center btn-inline">Update Contact</button>
                                    </div>
                                </div>
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
<script src="//cdn.ckeditor.com/4.6.2/full/ckeditor.js"></script>
<script>
    var options = {
      filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
      filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
      filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
      filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
    };

    CKEDITOR.replace('footer_text', options);
  </script>
@endsection
