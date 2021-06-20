@extends('backend.master')
@section('testimonial-active')
    active
    open
@endsection
@section('testimonial-sub-active')
    active
@endsection
@section('content')
    <div class="page-inner" style="min-height:663px !important">
        <div class="page-title">
            <div class="page-breadcrumb">
                <ol class="breadcrumb">
                    <li><a href="{{ route('testimonial.index') }}">Testimonial</a></li>
                    <li class="active">Testimonial Create</li>
                </ol>
            </div>
        </div>
        <div id="main-wrapper">
            <div class="row">
                {{-- Category Add Form --}}
                <div class="col-md-12">
                    <div class="panel panel-white p-4">
                        <div class="panel-heading clearfix">
                            <h3 class="panel-title">Create Testimonial</h3>
                        </div>
                        <div class="panel-body">
                            <form action="{{ route('testimonial.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="client_name">Client Name</label>
                                        <input type="text" class="form-control m-t-xxs" id="client_name" name="client_name" placeholder="Enter  Client Name">
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="location">Client Location</label>
                                        <input type="text" class="form-control m-t-xxs" id="location" name="location" placeholder="Enter  Client Location">
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-3">
                                        <label for="client_photo">Upload Client Photo</label>
                                        <input type="file" class="form-control" name="client_photo" id="client_photo" onchange="preview_image()">
                                    </div>
                                    <div class="col-md-3" id="image_preview"></div>
                                    <div class="form-group col-md-6">
                                        <label for="rating_number">Client Feedback Ratting(1-5)</label>
                                        <input type="number" name="rating_number" class="form-control" id="rating_number" placeholder="Enter Ratting Between 1-5">
                                    </div>
                                </div>

                                <div class="form-group col-md-12">
                                    <label for="comment">Client Feedback Comment</label>
                                    <textarea class="form-control m-t-xxs" name="comment" id="comment"></textarea>
                                </div>

                               <div class="form-row">
                                    <div class="text-ceter col-md-6 col-md-offset-3">
                                        <button type="submit" class="btn btn-info center btn-inline">Save Testimonial</button>
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


        $('#client_photo').on('change', function() {
            imagesPreview(this, 'div#image_preview');
        });

    });

    </script>
@endsection
