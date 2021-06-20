@extends('backend.master')
@section('experience-active')
    active
    open
@endsection
@section('experience-sub-active')
    active
@endsection
@section('experience-trash-active')
    active
@endsection
@section('content')
    <div class="page-inner" style="min-height:663px !important">
        <div class="page-title">
            <div class="page-breadcrumb">
                <ol class="breadcrumb">
                    <li><a href="{{ route('experience.index') }}">Experience</a></li>
                    <li class="active">Trashed</li>
                </ol>
            </div>
        </div>
        <div id="main-wrapper">
            <div class="row">
                {{-- Category Add Form --}}
                <div class="col-md-12">
                    <div class="panel panel-white p-4">
                        <div class="panel-heading clearfix">
                            <h4 class="panel-title">Experience Trash List</h4>
                        </div>
                        <div class="panel-body">
                            <table id="datatable" class="table display">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Institute Name</th>
                                        <th>Job Title</th>
                                        <th>Year</th>
                                        <th width='200px'>Action</th>
                                </thead>

                                <tbody>
                                    @foreach ( $trashed as $key => $experience )
                                    <tr>
                                        <td>{{ $key + 1}}</td>
                                            <td>{{ $experience->job_title }}</td>
                                            <td>{{ $experience->institute_name }}</td>
                                            <td>{{ $experience->year }}</td>
                                            <td>
                                                <a href="{{ route('restore', $experience->id) }}" class="btn btn-info">Restore</a>
                                                <a href="{{ route('permanentDelete', $experience->id) }}" class="btn btn-danger">Delete</a>
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
