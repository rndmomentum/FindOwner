@extends('layouts.app')

@section('content')
    
    <div class="row">
        <div class="col-md-12 mt-3">
            @if(session('success'))
                <div class="alert alert-success">
                    <small><strong>Successful!</strong> {{ session('success') }}</small>
                </div>
            @endif  
        </div>
    </div>
    
    <small><nav aria-label="breadcrumb" >
        <ol class="breadcrumb" >
            <li class="breadcrumb-item"><a href="{{ url('search') }}/{{ $refer_id }}" style="color: black"><i class="bi bi-arrow-left pl-2 pr-2"></i></a>
            <li class="breadcrumb-item"><a href="{{ url('search') }}/{{ $refer_id }}" style="color: black">Search</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="">Home</a></li>
        </ol>
    </nav></small>
        
</div>

    <div class="mx-3">
    <div class="col-12 align-center card shadow-lg mb-4">
        <div class="card-body ">
            <div class="row">  
                <div class="col-md-12 mb-3">
                    <div style="background-color: #810000; color:white; padding: 10px 30px 10px; text-align: center">
                        <h5> Vehicle List Detail </h5>
                    </div>
                </div>

                <div class="col-md-12 mb-3 text-end">
                    <a class="btn btn-dark btn-sm float-right" href="{{ url('create') }}/{{ $refer_id }}"><i class="bi bi-plus-lg"></i> Add</a> 
                </div>

                <!-- search form -->
                <div class="col-md-12 mb-3">
                    <form action="{{ url('carlist') }}/{{ $refer_id }}" method="GET" role="search">
                        <div class="input-group">
                            <button href="{{ url('carlist') }}/{{ $refer_id }}" class="btn btn-danger btn-sm"><span class="bi bi-arrow-repeat"></span></button>
                            <input type="text" class="form-control form-control-sm" name="all" placeholder="Search..." id="all">
                            <button class="btn btn-dark btn-sm" type="submit">
                                <span class="bi bi-search"></span>
                            </button>
                        </div>
                    </form>
                </div>

                <!-- table list -->
                <div class="col-md-12">
                    @if(!empty($lists) && $lists->count())
                    <div class="table-responsive">
                        <table class="table table-hover text-center" style="font-size: 10pt">
                            <thead class="thead" style="background-color: #810000; color: white;">
                                <tr>
                                    <th>#</th>
                                    <th>Type</th>
                                    <th>Plate No</th>
                                    <th>Name</th>
                                    <th>Department</th>
                                    <th>Phone No.</th>
                                    <th>View</th>
                                </tr>
                            </thead>

                            <tbody>
                            <!-- @php($i = 1) -->
                            <?php $i = ($lists->currentpage()-1)* $lists->perpage(); ?>
                                @foreach($lists as $data)
                                    <tr>
                                        <th scope="row" style="text-align: center;">{{ $i += 1 }}</th>
                                        <td>{{ $data->type }}</td>
                                        <td style="text-transform:uppercase">{{ $data->noplate }}</td>
                                        <td style="text-transform:capitalize">{{ $data->staffname }}</td>
                                        <td>{{ $data->department }}</td>
                                        <td><a href="tel:+6{{ $data->nophone }}">+6{{ $data->nophone }}</a></td>
                                        <td><a style="position: center;" href="{{ url('show') }}/{{ $refer_id }}/{{ $data->noplate }}" class="btn btn-dark btn-sm"><i class="bi bi-chevron-right "></i></a></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    
                    <div class="float-right pt-3">{{$lists->links('pagination::bootstrap-4')}}</div>
                   
                    @else
                        <h7 class="text-center">There are no data.</h7>
                    @endif
                </div>

            </div>
        </div>        
    </div>
    </div> 
                        
@endsection