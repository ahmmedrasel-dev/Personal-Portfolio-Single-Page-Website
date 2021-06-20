@extends('backend.master')
@section('education-active')
    active
    open
@endsection
@section('education-sub-active')
    active
@endsection
@section('content')
    <div class="page-inner" style="min-height:663px !important">
        <div class="page-title">
            <div class="page-breadcrumb">
                <ol class="breadcrumb">
                    <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li class="active">Education</li>
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
                                <h4 class="panel-title">Education Section</h4>
                            </div>
                            <div class="text-right">
                                <a href="{{ route('education.create') }}" class="btn btn-outline-primary mb-3"> <i class="icon-plus"></i> Add Education</a>
                            </div>
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
                                        <th width='150px'>Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ( $educations as $key => $education )
                                        <tr>
                                            <td>{{ $key + 1}}</td>
                                            <td>{{ $education->title }}</td>
                                            <td>{{ $education->sub_title }}</td>
                                            <td>{{ $education->year }}</td>
                                            <td>{{ $education->icon }}</td>
                                            <td>
                                                <form action="{{ route('education.destroy', $education->id) }}" method="POST">
                                                    <a href="{{ route('education.edit', $education->id) }}" class="btn btn-info">Edit</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button  class="btn btn-danger">Delete</button>
                                                </form>
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
