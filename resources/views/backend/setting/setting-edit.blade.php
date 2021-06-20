@extends('backend.master')
@section('setting-active')
    active
    open
@endsection
@section('setting-sub-active')
    active
@endsection
@section('content')
    <div class="page-inner" style="min-height:663px !important">
        <div class="page-title">
            <div class="page-breadcrumb">
                <ol class="breadcrumb">
                    <li><a href="{{ route('setting.index') }}">Setting</a></li>
                    <li class="active">Setting Change</li>
                </ol>
            </div>
        </div>
        <div id="main-wrapper">
            <div class="row">
                {{-- Setting Add Form --}}
                <div class="col-md-12">
                    <div class="panel panel-white p-4">
                        <div class="panel-heading clearfix">
                            <h3 class="panel-title">Change Setting</h3>
                        </div>
                        <div class="panel-body">
                            <form action="{{ route('setting.update', $setting->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="site_title">Site Title</label>
                                        <input type="text" class="form-control m-t-xxs" id="site_title" name="site_title" value="{{ $setting->site_title }}">
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label for="meta_desc">Website Mete Description</label>
                                        <textarea class="form-control m-t-xxs" name="meta_desc" id="meta_desc" rows="5">{{ $setting->meta_desc }}</textarea>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-3">
                                        <label for="logo">Upload Logo: (Recommended- 150x56px)</label>
                                        <input type="file" class="form-control" name="logo" id="logo" onchange="document.getElementById('logo').src = window.URL.createObjectURL(this.files[0])">
                                    </div>

                                    <div class="col-md-3" id="image_preview">
                                        <img id="logo" width="120" src="{{ asset('images/logo/'.$setting->created_at->format('Y/m/').$setting->id.'/'.$setting->logo) }}" alt="{{ $setting->site_title }}">
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label for="favicon">Upload Favicon: (Recommended- 20x20px)</label>
                                        <input type="file" name="favicon" class="form-control" id="favicon" onchange="document.getElementById('favicon').src = window.URL.createObjectURL(this.files[0])">
                                    </div>
                                    <div class="col-md-3" id="image_preview">
                                        <img id="favicon" width="50" src="{{ asset('images/logo/'.$setting->created_at->format('Y/m/').$setting->id.'/'.$setting->favicon) }}" alt="{{ $setting->site_title }}">
                                    </div>

                                </div>

                                <div class="form-group col-md-12">
                                    <label for="copyright_text">Copyright Text.</label>
                                    <textarea class="form-control m-t-xxs" name="copyright_text" id="copyright_text">{{ $setting->copyright_text }}</textarea>
                                </div>

                               <div class="form-row">
                                    <div class="text-ceter col-md-6 col-md-offset-3">
                                        <button type="submit" class="btn btn-info center btn-inline">Save Setting</button>
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

    </script>
    <script src="//cdn.ckeditor.com/4.6.2/full/ckeditor.js"></script>
    <script>
        var options = {
          filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
          filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
          filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
          filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
        };

        CKEDITOR.replace('copyright_text', options);
      </script>
@endsection
