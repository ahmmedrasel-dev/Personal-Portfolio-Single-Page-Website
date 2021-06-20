@extends('backend.master')
@section('banner-active')
    active
    open
@endsection
@section('content')
    <div class="page-inner" style="min-height:663px !important">
        <div class="page-title">
            <div class="page-breadcrumb">
                <ol class="breadcrumb">
                    <li><a href="{{ route('banner.index') }}">Banner</a></li>
                    <li class="active">Banner Edit</li>
                </ol>
            </div>
        </div>
        <div id="main-wrapper">
            <div class="row">
                {{-- Category Add Form --}}
                <div class="col-md-12">
                    <div class="panel panel-white p-4">
                        <div class="panel-heading clearfix">
                            <h3 class="panel-title">Edit Banner</h3>
                        </div>
                        <div class="panel-body">
                            <form action="{{ route('banner.update', $banner->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="baner_title">Banner Title</label>
                                        <input type="text" class="form-control m-t-xxs" id="category" name="title" value="{{ $banner->title }}">
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="baner_subtitle">Banner Subtitle</label>
                                        <input type="text" class="form-control m-t-xxs" id="category" name="sub_title" value="{{ $banner->sub_title }}">
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-3">
                                        <label for="banner_photo">Chose Banner Photo</label>
                                        <input type="file" name="banner_photo" id="productImage" onchange="document.getElementById('image_id2').src = window.URL.createObjectURL(this.files[0])">
                                    </div>
                                    <div class="col-md-3">
                                        <img id="image_id2" width="250" src="{{ asset('images/'.$banner->created_at->format('Y/m/').$banner->id.'/'.$banner->banner_photo) }}" alt="{{ $banner->title }}">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="backgroun_photo">Chose Banner Background</label>
                                        <input type="file" name="background_photo" class="custom-file-input" id="background_photo" onchange="document.getElementById('image_id').src = window.URL.createObjectURL(this.files[0])">
                                    </div>
                                    <div class="col-md-3" id="image_preview2">
                                        <img id="image_id" width="250" src="{{ asset('images/'.$banner->created_at->format('Y/m/').$banner->id.'/'.$banner->background_photo) }}" alt="{{ $banner->title }}">
                                    </div>
                                </div>

                                <div class="form-group col-md-12">
                                    <label for="baner_subtitle">Banner Short Description</label>
                                    <textarea class="form-control m-t-xxs" name="short_description" id="description">{{ $banner->short_description }}</textarea>
                                </div>

                               <div class="form-row">
                                    <div class="text-ceter col-md-6 col-md-offset-3">
                                        <button type="submit" class="btn btn-info center btn-inline">Update Banner</button>
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

        $('#productImage').on('change', function() {
            imagesPreview(this, 'div#image_preview');
        });

        $('#productImage2').on('change', function() {
            imagesPreview2(this, 'div#image_preview2');
        });
    });

    </script>
@endsection
