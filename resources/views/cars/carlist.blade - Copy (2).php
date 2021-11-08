@extends('layouts.app')

@section('content')
<style>
  .uper {
    margin-top: 5px;
  }
</style>
    <!-- <div class="card shadow-lg col-md-10 text-center">   -->
    <div class="card shadow-lg col-10 mx-auto text-center">
        <br>
        <div style="background-color: #810000; color:white; padding: 10px 30px 10px;">
            <h3> Vehicle List Detail </h3>
        </div></br>
        <div class="row">
            <!-- <a href="javascript:void(0);" data-target="#addModal" data-toggle="modal" class="btn btn-dark"> Add New Vehicle Details</a> -->
            <!-- search form -->
            <div class="col-md-5">
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
                            <th style="text-align: center;">#</th>
                            <th style="text-align: center;">Type</th>
                            <th style="text-align: center;">Plate No</th>
                            <th style="text-align: center;">Name</th>
                            <th style="text-align: center;">Department</th>
                            <th style="text-align: center;">Phone No.</th>
                            <th style="text-align: center;">Action</th>
                        </tr>
                    </thead>

                    <tbody>
                       
                        @foreach($lists as $data)
                            <tr>
                                <th scope="row" style="text-align: center;">{{ $i++ }}</th>
                                <td style="text-align: center;">{{ $data->type }}</td>
                                <td style='text-transform:uppercase; text-align: center;'>{{ $data->noplate }}</td>
                                <td style='text-transform:capitalize'>{{ $data->staffname }}</td>
                                <td style="text-align: center;">{{ $data->department }}</td>
                                <td style="text-align: center;">+6{{ $data->nophone }}</td>
                                <td>
                                    <!-- <a href="{{ route('FindMeNow/show', $data->id) }}" class="btn btn-dark btn-block btn-sm">View</a>
                                    &nbsp;
                                    <a href="{{ route('FindMeNow/edit', $data->id) }}" class="btn btn-dark btn-block btn-sm">Edit</a> -->
                                    <a style="position: center;" href="{{ route('FindMeNow/show', $data->id) }}" class="btn btn-dark">View</a>
                                    <!-- <a href="" data-toggle="modal" data-target="#addPostModal" data-id="{{$data->id}}" data-noplate="{{$data->noplate}}" data-description="{{$data->description}}" data-action="view" class="btn btn-dark"> View </a> -->
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <br>
                {{-- Pagination --}}
                <div class="d-flex justify-content-center">
                    {!! $lists->links() !!}
                </div>
        </div>
            @else
                <h7 style="align: center; ">There are no data.</h7>
            @endif
        </div>
        <br>
        
    </div> 
       
    <!-- {!! $lists->links() !!} -->
                        
@endsection