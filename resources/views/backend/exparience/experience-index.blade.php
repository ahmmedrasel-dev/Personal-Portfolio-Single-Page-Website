@extends('backend.master')
@section('experience-active')
    active
    open
@endsection
@section('experience-sub-active')
    active
@endsection
@section('content')
    <div class="page-inner" style="min-height:663px !important">
        <div class="page-title">
            <div class="page-breadcrumb">
                <ol class="breadcrumb">
                    <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li class="active">Experience</li>
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
                                <h4 class="panel-title">Experience Section</h4>
                            </div>
                            <div class="text-right">
                                <a href="{{ route('experience.create') }}" class="btn btn-outline-primary mb-3"> <i class="icon-plus"></i> Add Experience</a>
                            </div>
                        </div>
                        <div class="panel-body">
                            <table id="datatable" class="table display">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Institute Name</th>
                                        <th>Job Title</th>
                                        <th>Year</th>
                                        <th>Status</th>
                                        <th width='150px'>Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ( $experieces as $key => $experience )
                                        <tr>
                                            <td>{{ $key + 1}}</td>
                                            <td>{{ $experience->job_title }}</td>
                                            <td>{{ $experience->institute_name }}</td>
                                            <td>{{ $experience->year }}</td>
                                            <td>
                                                @if ($experience->status == 1 )
                                                    <a href="{{ route('experienceDeactive', $experience->id ) }}" class="btn btn-success">Activeted</a>
                                                @else
                                                    <a href="{{ route('experienceActive', $experience->id ) }}" class="btn btn-danger">Deactiveted</a>
                                                @endif
                                            </td>
                                            <td>
                                                <form action="{{ route('experience.destroy', $experience->id) }}" method="POST">
                                                    <a href="{{ route('experience.edit', $experience->id) }}" class="btn btn-info">Edit</a>
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
