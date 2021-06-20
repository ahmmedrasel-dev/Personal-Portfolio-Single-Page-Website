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
                    <li class="active">About Edit</li>
                </ol>
            </div>
        </div>
        <div id="main-wrapper">
            <div class="row">
                {{-- Category Add Form --}}
                <div class="col-md-12">
                    <div class="panel panel-white p-4">
                        <div class="panel-heading clearfix">
                            <h3 class="panel-title">About Edit</h3>
                        </div>
                        <div class="panel-body">
                            <form action="{{ route('about.update', $about->id ) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="about_title">About Title</label>
                                        <input type="text" class="form-control m-t-xxs" id="about_title" name="about_title" value="{{ $about->about_title }}">
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="button_link">Button Link</label>
                                        <input class="form-control m-t-xxs" type="text" name="button_link" id="button_link" value="{{ $about->button_link }}">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="backgroun_photo">Chose About Photo(500X500)</label>
                                        <input type="file" name="about_photo" class="custom-file-input" id="image_id" onchange="document.getElementById('image_id2').src = window.URL.createObjectURL(this.files[0])">
                                    </div>
                                    <div class="col-md-3" id="image_preview">
                                        <img id="image_id2" width="50" src="{{ asset('images/'.$about->created_at->format('Y/m/').$about->id.'/'.$about->about_photo) }}" alt="{{ $about->about_title }}">
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="about_summary">About in Details</label>
                                        <textarea class="form-control m-t-xxs" name="about_summary" id="about_summary">{{ $about->about_summary }}</textarea>
                                    </div>
                                </div>
                               <div class="form-row">
                                    <div class="text-ceter col-md-6 col-md-offset-3">
                                        <button type="submit" class="btn btn-info center btn-inline">Update About</button>
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

        CKEDITOR.replace('about_summary', options);
      </script>
@endsection
