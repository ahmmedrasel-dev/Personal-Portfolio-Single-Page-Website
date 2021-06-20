@extends('backend.master')
@section('about-active')
    active
    open
@endsection
@section('about-sub-active')
    active
@endsection
@section('content')
    <div class="page-inner" style="min-height:663px !important">
        <div class="page-title">
            <div class="page-breadcrumb">
                <ol class="breadcrumb">
                    <li><a href="{{ route('about.index') }}">About</a></li>
                    <li class="active">About Create</li>
                </ol>
            </div>
        </div>
        <div id="main-wrapper">
            <div class="row">
                {{-- Category Add Form --}}
                <div class="col-md-12">
                    <div class="panel panel-white p-4">
                        <div class="panel-heading clearfix">
                            <h3 class="panel-title">Create About</h3>
                        </div>
                        <div class="panel-body">
                            <form action="{{ route('about.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="about_title">About Title</label>
                                        <input type="text" class="form-control m-t-xxs" id="about_title" name="about_title" placeholder="Enter  About Tttle">
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="button_link">Button Link</label>
                                        <input class="form-control m-t-xxs" type="text" name="button_link" id="button_link" placeholder="www.yourlink.com">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="backgroun_photo">Chose About Photo(500X500)</label>
                                        <input type="file" name="about_photo" class="form-control" id="image_id" onchange="preview_image()">
                                    </div>
                                    <div class="col-md-3" id="image_preview"></div>
                                    <div class="form-group col-md-12">
                                        <label for="about_summary">About in Details</label>
                                        <textarea class="form-control m-t-xxs" name="about_summary" id="about_summary"></textarea>
                                    </div>
                                </div>
                               <div class="form-row">
                                    <div class="text-ceter col-md-6 col-md-offset-3">
                                        <button type="submit" class="btn btn-info center btn-inline">Create Banner</button>
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
                        $($.parseHTML('<img width="50" class="mr-2">')).attr('src', event.target.result).appendTo(placeToInsertImagePreview);
                    }
                    reader.readAsDataURL(input.files[i]);
                }
            }
        };

        $('#image_id').on('change', function() {
            imagesPreview(this, 'div#image_preview');
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

        CKEDITOR.replace('about_summary', options);
      </script>
@endsection
