@extends('backend.master')
@section('skill-active')
    active
    open
@endsection
@section('skill-trash-active')
    active
@endsection
@section('content')
    <div class="page-inner" style="min-height:663px !important">
        <div class="page-title">
            <div class="page-breadcrumb">
                <ol class="breadcrumb">
                    <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li class="active">Skill</li>
                </ol>
            </div>
        </div>
        <div id="main-wrapper">
            <div class="row">
                {{-- Category List View --}}
                <div class="col-md-6 col-md-offset-3">
                    <div class="panel panel-white p-4">
                        <div class="panel-heading clearfix">
                            <h4 class="panel-title">Skill Trash List</h4>
                        </div>
                        <div class="panel-body">
                            <table id="datatable" class="table display">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Name</th>
                                        <th>Percentage</th>
                                        <th>Action</th>
                                </thead>

                                <tbody>
                                    @foreach ( $trashed as $key => $skill )
                                        <tr>
                                            <td>{{ $key + 1}}</td>
                                            <td>{{ $skill->skill_name }}</td>
                                            <td>{{ $skill->skill_percentage }}</td>
                                            <td>
                                                <a href="{{ route('restore', $skill->id) }}" class="btn btn-info">Restore</a>
                                                <a href="{{ route('permanentDelete', $skill->id) }}" class="btn btn-danger">Delete</a>
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
