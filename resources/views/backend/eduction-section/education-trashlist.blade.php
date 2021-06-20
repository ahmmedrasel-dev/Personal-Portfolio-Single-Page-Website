@extends('backend.master')
@section('education-active')
    active
    open
@endsection
@section('education-sub-active')
    active
@endsection
@section('education-trash-active')
    active
@endsection
@section('content')
    <div class="page-inner" style="min-height:663px !important">
        <div class="page-title">
            <div class="page-breadcrumb">
                <ol class="breadcrumb">
                    <li><a href="{{ route('education.index') }}">Education</a></li>
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
                            <h4 class="panel-title">Education Trash List</h4>
                        </div>
                        <div class="panel-body">
                            <table id="datatable" class="table display">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Title</th>
                                        <th>Institute Name</th>
                                        <th>Year</th>
                                        <th>Icon Name</th>
                                        <th width='200px'>Action</th>
                                </thead>

                                <tbody>
                                    @foreach ( $education as $key => $education )
                                    <tr>
                                        <td>{{ $key + 1}}</td>
                                        <td>{{ $education->title }}</td>
                                        <td>{{ $education->sub_title }}</td>
                                        <td>{{ $education->year }}</td>
                                        <td>{{ $education->icon }}</td>
                                        <td>
                                                <a href="{{ route('restore', $education->id) }}" class="btn btn-info">Restore</a>
                                                <a href="{{ route('permanentDelete', $education->id) }}" class="btn btn-danger">Delete</a>
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
