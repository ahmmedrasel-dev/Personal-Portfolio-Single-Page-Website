@extends('backend.master')
@section('setting-active')
    active
    open
@endsection
@section('setting-sub-active')
    active
@endsection
@section('content')
    <div class="page-inner" style="min-height:663px !important">
        <div class="page-title">
            <div class="page-breadcrumb">
                <ol class="breadcrumb">
                    <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li class="active">Setting</li>
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
                                <h4 class="panel-title">Setting Section</h4>
                            </div>
                            <div class="text-right">
                                @if ($total == 0)
                                    <a href="{{ route('setting.create') }}" class="btn btn-outline-info mb-3"> <i class="icon-plus"></i> Add Setting</a>
                                @endif
                            </div>
                        </div>

                        <div class="panel-body">
                            <table id="datatable" class="table display">
                                <thead>
                                    <tr>
                                        <th>Site Title</th>
                                        <th>Meta Desc</th>
                                        <th>Copyright</th>
                                        <th>Site Logo</th>
                                        <th>Fav-Icon</th>
                                        <th width='50px'>Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ( $settings as $setting )
                                        <tr>
                                            <td>{{ $setting->site_title }}</td>
                                            <td>{{ Str::words($setting->meta_desc, 13) }}</td>
                                            <td>{!! $setting->copyright_text !!}</td>
                                            <td><img width="50px" src="{{ asset('images/logo/'.$setting->created_at->format('Y/m/').$setting->id .'/'. $setting->logo) }}" alt="{{ $setting->title }}"></td>
                                            <td><img width="50px" src="{{ asset('images/logo/'.$setting->created_at->format('Y/m/').$setting->id .'/'. $setting->favicon) }}" alt="{{ $setting->title }}"></td>
                                            <td>
                                                <a href="{{ route('setting.edit', $setting->id) }}" class="btn btn-info">Change Setting</a>
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
