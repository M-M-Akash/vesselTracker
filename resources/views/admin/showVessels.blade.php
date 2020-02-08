@extends('layouts.app')

@section('content')
    <div>


        @foreach($vessels as $vessel)
            <strong>Vessel Name:</strong><a href="{{route('form.edit',[encrypt($vessel->id)])}}" class="link-stabilize">{{$vessel->vessel_name}}</a>
            <br>
            <strong>Vessel Serial No:</strong>{{$vessel->serial_no}}
            <br>
            {{base64_decode('c2ltdWxhdG9yOnBhc3MA')}}
            @endforeach

    </div>
@endsection
