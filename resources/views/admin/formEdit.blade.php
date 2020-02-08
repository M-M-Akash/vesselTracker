@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><h4><strong>Edit </strong>{{$vessel->vessel_name}}</h4></div>

                    <div class="card-body">
                        <form action="{{route('form.update', [encrypt($vessel->id)])}}" method="post">
                            @csrf
                            @method('PATCH')
                            <div class="form-group">

                            </div>
                            <label for="name"> Registered Secret Key</label>
                            <input type="text" name="register_key" id="" class="form-control" value="{{$vessel->register_key}}">

                            <label for="name">Vessel Name</label>
                            <input type="text" name="vessel_name" id="" class="form-control" value="{{$vessel->vessel_name}}">
                            <label for="name">Vessel Serial No.</label>
                            <br>
                            <input type="text" name="serial_no" id="" class="form-control" value="{{$vessel->serial_no}}">
                            <label for="name">Selected Category:</label>{{$selectedCategory->vessel_category}}<br>
                            <select name="vessel_category_id">

                                @foreach($vesselCategories as $vesselCategory)
                                    <option   value="{{$vesselCategory->id}}" >{{$vesselCategory->vessel_category}}</option>
                                @endforeach
                            </select>
                            <br>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
