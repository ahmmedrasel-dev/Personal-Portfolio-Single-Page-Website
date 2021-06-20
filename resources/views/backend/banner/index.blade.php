@extends('backend.master')
@section('banner-active')
    active
    open
@endsection
@section('banner-sub-active')
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
                                <h4 class="panel-title">Banner Section</h4>
                            </div>
                            <div class="text-right">
                                <a href="{{ route('banner.create') }}" class="btn btn-outline-info mb-3"> <i class="icon-plus"></i> Add Banner</a>
                            </div>
                        </div>

                        <div class="panel-body">
                            <table id="datatable" class="table display">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Title</th>
                                        <th>Sub-Title</th>
                                        <th>Short Desc.</th>
                                        <th>Phote</th>
                                        <th>Background</th>
                                        <th>Banner Status</th>
                                        <th width='150px'>Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ( $banners as $key => $banner )
                                        <tr>
                                            <td>{{ $key + 1}}</td>
                                            <td>{{ $banner->title }}</td>
                                            <td>{{ $banner->sub_title }}</td>
                                            <td>{{ Str::words($banner->short_description, 13) }}</td>
                                            <td><img width="50px" src="{{ asset('images/'.$banner->created_at->format('Y/m/').$banner->id .'/'. $banner->banner_photo) }}" alt="{{ $banner->title }}"></td>
                                            <td><img width="50px" src="{{ asset('images/'.$banner->created_at->format('Y/m/').$banner->id .'/'. $banner->background_photo) }}" alt="{{ $banner->title }}"></td>
                                            <td>
                                                @if ($banner->banner_status == 1 )
                                                    <a href="{{ route('bannerActive', $banner->id ) }}" class="btn btn-success">Activeted</a>
                                                @else
                                                    <a href="{{ route('bannerDeactive', $banner->id ) }}" class="btn btn-danger">Deactiveted</a>
                                                @endif
                                            </td>
                                            <td>
                                                <form action="{{ route('banner.destroy', $banner->id) }}" method="POST">
                                                    <a href="{{ route('banner.edit', $banner->id) }}" class="btn btn-info">Edit</a>
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
