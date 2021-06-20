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
                            <form action="{{ route('testimonial.update', $testimonial->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="client_name">Client Name</label>
                                        <input type="text" class="form-control m-t-xxs" id="client_name" name="client_name" value="{{ $testimonial->client_name }}">
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="location">Client Location</label>
                                        <input type="text" class="form-control m-t-xxs" id="location" name="location" value="{{ $testimonial->location }}">
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-3">
                                        <label for="client_photo">Upload Client Photo</label>
                                        <input type="file" class="form-control" name="client_photo" id="client_photo" onchange="document.getElementById('client_photo2').src = window.URL.createObjectURL(this.files[0])">
                                    </div>
                                    <div class="col-md-3">
                                        <img id="client_photo2" width="150" src="{{ asset('images/'.$testimonial->created_at->format('Y/m/').$testimonial->id.'/'.$testimonial->client_photo) }}" alt="{{ $testimonial->title }}">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="rating_number">Client Feedback Ratting(1-5)</label>
                                        <input type="number" name="rating_number" class="form-control" id="rating_number" value="{{ $testimonial->rating_number }}">
                                    </div>
                                </div>

                                <div class="form-group col-md-12">
                                    <label for="comment">Client Feedback Comment</label>
                                    <textarea class="form-control m-t-xxs" name="comment" id="comment">{{ $testimonial->comment }}</textarea>
                                </div>

                               <div class="form-row">
                                    <div class="text-ceter col-md-6 col-md-offset-3">
                                        <button type="submit" class="btn btn-info center btn-inline">Update Testimonial</button>
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
@endsection
