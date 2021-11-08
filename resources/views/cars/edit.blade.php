@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title"><center>Create Plate Details</center></h5>
            </div>

            <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div><br>
            @endif

                <form method="post" action="{{ route('FindMeNow/update', $car->id) }}">
                    @csrf
                    @method('PATCH')
                    <div class="fmn-3 row">
                        <label for="type" class="col-sm-2 col-form-label">Vehicle Type*</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="type" required>
                                <option value="Car" {{ $car->type == 'Car' ? 'selected' : '' }}>Car</option>
                                <option value="Motorcycle" {{ $car->type == 'Motorcycle' ? 'selected' : '' }}>Motorcycle</option>	
                            </select>
                        </div>
                    </div><br>

                    <div class="fmn-3 row">
                        <label for="plate" class="col-sm-2 col-form-label">Plate Number*</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" value="{{ $car->noplate }}" name="noplate" pattern="^[-a-zA-Z0-9@\.+_]+$" title="Please remove space between characters" placeholder="Masukkan nombor plat kenderaan (eg: JHR2038)" style='text-transform:uppercase' minlength="4" required/>
                        </div>
                    </div><br>

                    <div class="fmn-3 row">
                        <label for="name" class="col-sm-2 col-form-label">Team Name*</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" value="{{ $car->staffname }}" name="staffname" style=" text-transform:capitalize;" placeholder="Masukkan Nama Penuh" required/>
                        </div>
                    </div><br>

                    <div class="fmn-3 row">
                        <label for="nophone" class="col-sm-2 col-form-label">Phone Number*</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" value="{{ $car->nophone }}" name="nophone" placeholder="Masukkan Nombor Telefon (eg: 0141234459)" required/>
                        </div>
                    </div><br>

                    <div class="fmn-3 row">
                        <label for="department" class="col-sm-2 col-form-label">Department*</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="department" required>
                                <option value="COD" {{ $car->department == 'COD' ? 'selected' : '' }}>Corporate Office Division(COD)</option>
                                <option value="Operation" {{ $car->department == 'Operation' ? 'selected' : '' }}>Operation</option>
                                <option value="Marketing" {{ $car->department == 'Marketing' ? 'selected' : '' }}>Marketing</option>
                                <option value="Sales" {{ $car->department == 'Sales' ? 'selected' : '' }}>Sales</option>
                                <option value="R&D" {{ $car->department == 'R&D' ? 'selected' : '' }}>Research and Development(R&D)</option>
                            </select>
                        </div>
                    </div><br>

                    <div class="fmn-3 row">
                        <label for="unit" class="col-sm-2 col-form-label">Unit</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" value="{{ $car->unit }}" name="unit" style="text-transform:capitalize;" placeholder="Masukkan Unit Jabatan"/>
                        </div>
                    </div><br>

                    <div class="fmn-3 row">
                        <label for="description" class="col-sm-2 col-form-label">Vehicle Description:</label>
                        <div class="col-sm-10">
                            <textarea rows="2" class="form-control" id="editor" name="description" placeholder="Eg: Brand, Type, Color of Vehicle, etc." >{!! $car->description !!}</textarea>
                            
                        </div>
                    </div><br>
                    <a href="{{ route('FindMeNow/all') }}" class="btn btn-danger">Cancel</a>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Initialize Quill editor -->
    <script>
    var quill = new Quill('#editor', {
        theme: 'snow'
    });
    </script>
@endsection