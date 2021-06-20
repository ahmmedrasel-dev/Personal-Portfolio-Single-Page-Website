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
                    <li class="active">Setting Create</li>
                </ol>
            </div>
        </div>
        <div id="main-wrapper">
            <div class="row">
                {{-- Setting Add Form --}}
                <div class="col-md-12">
                    <div class="panel panel-white p-4">
                        <div class="panel-heading clearfix">
                            <h3 class="panel-title">Create Banner</h3>
                        </div>
                        <div class="panel-body">
                            <form action="{{ route('setting.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="site_title">Site Title</label>
                                        <input type="text" class="form-control m-t-xxs" id="site_title" name="site_title" placeholder="Website Title Here">
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label for="meta_desc">Website Mete Description</label>
                                        <textarea class="form-control m-t-xxs" name="meta_desc" id="meta_desc" rows="5" placeholder="Lorem ipsum dolor sit amet consectetur adipisicing elit..."></textarea>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-3">
                                        <label for="logo">Upload Logo: (Recommended- 150x56px)</label>
                                        <input type="file" class="form-control" name="logo" id="logo" onchange="preview_image()">
                                    </div>
                                    <div class="col-md-3" id="image_preview"></div>
                                    <div class="form-group col-md-3">
                                        <label for="favicon">Upload Favicon: (Recommended- 20x20px)</label>
                                        <input type="file" name="favicon" class="form-control" id="favicon" onchange="preview_image2()">
                                    </div>
                                    <div class="col-md-3" id="image_preview2"></div>
                                </div>

                                <div class="form-group col-md-12">
                                    <label for="copyright_text">Copyright Text.</label>
                                    <textarea class="form-control m-t-xxs" name="copyright_text" id="copyright_text"></textarea>
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

    // Multiple images preview in browser
    $(function() {
        var imagesPreview = function(input, placeToInsertImagePreview) {
            if (input.files) {
                var filesAmount = input.files.length;
                for (i = 0; i < filesAmount; i++) {
                    var reader = new FileReader();
                    reader.onload = function(event) {
                        $($.parseHTML('<img width="150" class="mr-2">')).attr('src', event.target.result).appendTo(placeToInsertImagePreview);
                    }
                    reader.readAsDataURL(input.files[i]);
                }
            }
        };

        var imagesPreview2 = function(input, placeToInsertImagePreview) {
            if (input.files) {
                var filesAmount = input.files.length;
                for (i = 0; i < filesAmount; i++) {
                    var reader = new FileReader();
                    reader.onload = function(event) {
                        $($.parseHTML('<img width="150" class="mr-2">')).attr('src', event.target.result).appendTo(placeToInsertImagePreview);
                    }
                    reader.readAsDataURL(input.files[i]);
                }
            }
        };

        $('#logo').on('change', function() {
            imagesPreview(this, 'div#image_preview');
        });

        $('#favicon').on('change', function() {
            imagesPreview2(this, 'div#image_preview2');
        });
    });

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
