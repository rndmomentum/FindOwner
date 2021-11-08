@extends('layouts.app')

@section('content')
<style>
  .uper {
    margin-top: 5px;
  }
</style>
    <div class="card" style="padding-bottom: 30px;">  
        <div style="background-color: black; color:white; padding: 10px 30px 10px;">
            <h3> Vehicle List Detail </h3>
        </div></br>
        <div class="row" style="text-align: right; padding: 10px 10px 10px;">
            <!-- <a href="javascript:void(0);" data-target="#addModal" data-toggle="modal" class="btn btn-dark"> Add New Vehicle Details</a> -->
            <div class="col-md-4 col-sm-4">&nbsp;</div>
            <!-- search form -->
            <div class="col-md-5 col-sm-5" style="text-align: right">
                <form action="{{ route('FindMeNow/all') }}" method="GET" role="search">
                    <div class="input-group">
                        <span class="input-group-btn mr-5 mt-1">
                            <a href="{{ route('FindMeNow/all') }}" class="mt-1">
                                <span class="input-group-btn">
                                    <button class="btn btn-danger" type="button" title="Refresh page">
                                        <span class="fas fa-sync-alt"></span>
                                    </button>
                                </span>
                            </a>
                        </span>
                        <input type="text" class="form-control mr-2" name="all" placeholder="Search..." id="all">
                            <button class="btn btn-info" type="submit" title="Search projects">
                                <span class="fas fa-search"></span>
                            </button>
                    </div>
                </form>
            </div>
            <!-- button create page -->
            <div class="col-md-1 col-sm-1">
                <a class="btn btn-info" href="{{ route('FindMeNow/create') }}">Add New Vehicle Details</a> 
            </div>
        </div>
         
        @if(session('success'))
            <div class="alert alert-success">
				<strong>Successful!</strong> {{ session('success') }}
			</div>
        @endif
        <br>
        
        <!-- table vehicle list -->
        <div class="card-body" style="padding: 10px 80px 0px;">
            @if(!empty($lists) && $lists->count())
            <div class="table-responsive-md">
                <table class="table table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Type</th>
                            <th scope="col">Plate No</th>
                            <th scope="col">Name</th>
                            <th scope="col">Department</th>
                            <th scope="col">Phone No.</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>

                    <tbody>
                       
                        @foreach($lists as $data)
                            <tr>
                                <th scope="row">{{ $i++ }}</th>
                                <td>{{ $data->type }}</td>
                                <td style='text-transform:uppercase'>{{ $data->noplate }}</td>
                                <td style='text-transform:capitalize'>{{ $data->staffname }}</td>
                                <td>{{ $data->department }}</td>
                                <td>+6{{ $data->nophone }}</td>
                                <td>
                                    <!-- <a href="{{ route('FindMeNow/show', $data->id) }}" class="btn btn-dark btn-block btn-sm">View</a>
                                    &nbsp;
                                    <a href="{{ route('FindMeNow/edit', $data->id) }}" class="btn btn-dark btn-block btn-sm">Edit</a> -->
                                    <a href="" id="viewVehicle" data-toggle="modal" data-target='#practice_modal' data-id="{{ $data->id }}" class="btn btn-dark">View</a>
                                    <!-- <a href="" data-toggle="modal" data-target="#addPostModal" data-id="{{$data->id}}" data-noplate="{{$data->noplate}}" data-description="{{$data->description}}" data-action="view" class="btn btn-dark"> View </a> -->
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
</div>
            @else
                <h7 style="align: center; ">There are no data.</h7>
            @endif
        </div>
    </div> 

    <!-- Create post modal -->
    <div class="modal fade" id="practice_modal">
        <div class="modal-dialog">
            <form id="companydata">
                <div class="modal-content">
                <input type="hidden" id="vehicle_id" name="vehicle_id" value="">
                <div class="modal-body">
                    <input type="text" name="noplate" id="noplate" value="" class="form-control">
                </div>
                <input type="submit" value="Submit" id="submit" class="btn btn-sm btn-outline-danger py-0" style="font-size: 0.8em;">
            </div>
            </form>
        </div>
    </div>


        {{-- Pagination --}}
        <div class="d-flex justify-content-center">
            {!! $lists->links() !!}
        </div>
    <!-- {!! $lists->links() !!} -->
                        
@endsection

@push('script')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script>

$(document).ready(function () {

$('body').on('click', '#viewVehicle', function (event) {

    event.preventDefault();
    var id = $(this).data('id');
    $.get('vehicle/' + id + '/edit', function (data) {
         $('#userCrudModal').html("Edit category");
         $('#submit').val("Edit category");
         $('#practice_modal').modal('show');
         $('#vehicle_id').val(data.data.id);
         $('#noplate').val(data.data.name);
     })
});

}); 
</script>
@endpush  