@extends('layouts.app')

@section('content')
    @if ($message = Session::get('messages'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

        <form method="post" action ="{{route('form.store')}}">
            @csrf
            <label for="name"> Registered Secret Key</label>
            <input type="text" name="register_key" id="" class="form-control" value="{{$secretKey}}">

                <label for="name">Vessel Name</label>
                <input type="text" name="vessel_name" id="" class="form-control">
                <label for="name">Vessel Serial No.</label>
            <br>
                <input type="text" name="serial_no" id="" class="form-control">
                <select name="vessel_category_id">
                    @foreach($vesselCategories as $vesselCategory)
                        <option value="{{$vesselCategory->id}}">{{$vesselCategory->vessel_category}}</option>
                    @endforeach
                </select>
            <br>


            <button class="btn btn-primary" type="submit">Submit</button>
        </form>


@endsection
