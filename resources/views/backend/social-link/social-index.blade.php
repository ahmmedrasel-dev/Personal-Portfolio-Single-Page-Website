@extends('backend.master')
@section('social-active')
    active
    open
@endsection
@section('social-sub-active')
    active
@endsection
@section('content')
    <div class="page-inner" style="min-height:663px !important">
        <div class="page-title">
            <div class="page-breadcrumb">
                <ol class="breadcrumb">
                    <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li class="active">Social</li>
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
                                <h4 class="panel-title">Social Section</h4>
                            </div>
                            <div class="text-right">
                                @if ( $totallinks == 0)
                                <a href="{{ route('sociallink.create') }}" class="btn btn-outline-primary mb-3"> <i class="icon-plus"></i> Add Social Link</a>
                                @endif

                            </div>
                        </div>
                        <div class="panel-body">
                            <table id="datatable" class="table display">
                                <thead>
                                    <tr>
                                        <th>Facebook</th>
                                        <th>Twitter</th>
                                        <th>Linkdin</th>
                                        <th>Instagram</th>
                                        <th>Github</th>
                                        <th>Behance</th>
                                        <th width='50px'>Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ( $sociallinks as $key => $social )
                                        <tr>
                                            <td>{{ $social->facebook }}</td>
                                            <td>{{ $social->twitter }}</td>
                                            <td>{{ $social->linkdin }}</td>
                                            <td>{{ $social->instagram }}</td>
                                            <td>{{ $social->github }}</td>
                                            <td>{{ $social->behance }}</td>
                                            <td>
                                                <a href="{{ route('sociallink.edit', $social->id) }}" class="btn btn-info">Edit</a>
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
            // Buttons examples
            var table = $('#datatable-buttons').DataTable({
                lengthChange: false,
                buttons: ['copy', 'excel', 'pdf', 'colvis']
            });

            table.buttons().container().appendTo('#datatable-buttons_wrapper .col-md-6:eq(0)');

        } );

    </script>
@endsection
