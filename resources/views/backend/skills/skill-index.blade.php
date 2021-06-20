@extends('backend.master')
@section('skill-active')
    active
    open
@endsection
@section('skill-sub-active')
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
                <div class="col-md-8">
                    <div class="panel panel-white p-4">
                        <div class="panel-heading clearfix">
                            <h4 class="panel-title">Skill List</h4>
                        </div>
                        <div class="panel-body">
                            <table id="datatable" class="table display">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Name</th>
                                        <th>Percentage</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                </thead>

                                <tbody>
                                    @foreach ( $skills as $key => $skill )
                                        <tr>
                                            <td>{{ $key + 1}}</td>
                                            <td>{{ $skill->skill_name }}</td>
                                            <td>{{ $skill->skill_percentage }}</td>
                                            <td>
                                                @if ( $skill->status == 1 )
                                                    <a href="{{ route('skillDeactive', $skill->id) }}" class="btn btn-info">Activeted</a>
                                                @else
                                                    <a href="{{ route('skillActive', $skill->id) }}" class="btn btn-danger">Deactiveted</a>
                                                @endif
                                            </td>
                                            <td>
                                                <form action="{{ route('skill.destroy', $skill->id) }}" method="POST">
                                                    <a href="{{ route('skill.edit', $skill->id) }}" class="btn btn-info">Edit</a>
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

                {{-- Category Add Form --}}
                <div class="col-md-4">
                    <div class="panel panel-white p-4">
                        <div class="panel-heading clearfix">
                            <h3 class="panel-title">Add Skill</h3>
                        </div>
                        <div class="panel-body">
                            <form action="{{ route('skill.store') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="skill_name">Skill Name</label>
                                    <input type="text" class="form-control m-t-xxs" id="skill_name" name="skill_name" placeholder="Enter  Skill Name">
                                </div>

                                <div class="form-group">
                                    <label class="control-label">Skill Percentage</label>
                                    <select name="skill_percentage" id="skill_percentage" class="form-control">
                                        <option value="">Select Percentage</option>
                                        @for ($i=40; $i <= 100; $i +=1)
                                            @if ($i % 3 == 0)
                                                <option value="{{ $i }}">{{ $i }}</option>
                                            @endif
                                        @endfor
                                    </select>
                                </div>

                                <button type="submit" class="btn btn-info">Save Skill</button>
                            </form>
                        </div>

                        {{-- Error Message Dispaly --}}
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

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
