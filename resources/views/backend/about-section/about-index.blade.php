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
                    <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li class="active">Category</li>
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
                                <h4 class="panel-title">About Section</h4>
                            </div>
                            <div class="text-right">
                                <a href="{{ route('about.create') }}" class="btn btn-outline-primary mb-3"> <i class="icon-plus"></i> Add About</a>
                            </div>
                        </div>
                        <div class="panel-body">
                            <table id="datatable" class="table display">
                                <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Short Desc.</th>
                                        <th>Phote</th>
                                        <th width='150px'>Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                        <tr>
                                            <td>{{ $about->about_title ?? 'NA' }}</td>
                                            <td>{!! Str::words($about->about_summary, 30) !!}</td>
                                            <td><img width="50px" src="{{ asset('images/'.$about->created_at->format('Y/m/').$about->id .'/'. $about->about_photo) }}" alt="{{ $about->about_title }}"></td>
                                            <td>
                                                <a href="{{ route('about.edit', $about->id) }}" class="btn btn-info">Edit</a>
                                            </td>
                                        </tr>
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
