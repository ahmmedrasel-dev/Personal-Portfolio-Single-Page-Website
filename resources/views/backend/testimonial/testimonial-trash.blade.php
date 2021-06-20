@extends('backend.master')
@section('testimonial-active')
    active
    open
@endsection
@section('testimonial-trash-active')
    active
@endsection
@section('content')
    <div class="page-inner" style="min-height:663px !important">
        <div class="page-title">
            <div class="page-breadcrumb">
                <ol class="breadcrumb">
                    <li><a href="{{ route('testimonial.index') }}">Testimonial</a></li>
                    <li class="active">Trash</li>
                </ol>
            </div>
        </div>
        <div id="main-wrapper">
            <div class="row">
                {{-- Category List View --}}
                <div class="col-md-12">
                    <div class="panel panel-white p-">
                        <div class="panel-heading clearfix">
                            <div class="text-left">
                                <h4 class="panel-title">Testimonial Trash</h4>
                            </div>
                        </div>
                        <div class="panel-body">
                            <table id="datatable" class="table display">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Client Name</th>
                                        <th>Address</th>
                                        <th>Client Feedback</th>
                                        <th>Client Photo</th>
                                        <th>Ratting</th>
                                        <th width='170px'>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ( $trashed as $key => $testimonial )
                                        <tr>
                                            <td>{{ $key + 1}}</td>
                                            <td>{{ $testimonial->client_name }}</td>
                                            <td>{{ $testimonial->location }}</td>
                                            <td>{{ Str::words($testimonial->comment, 13) }}</td>
                                            <td><img width="50px" src="{{ asset('images/'.$testimonial->created_at->format('Y/m/').$testimonial->id .'/'. $testimonial->client_photo) }}" alt="{{ $testimonial->client_name }}"></td>
                                            <td>{{ $testimonial->rating_number }}</td>
                                            <td>
                                                <a href="{{ route('restore', $testimonial->id) }}" class="btn btn-info">Restore</a>
                                                <a href="{{ route('permanentDelete', $testimonial->id) }}" class="btn btn-danger">Delete</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
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
