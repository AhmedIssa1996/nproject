@extends('layout')
@section('title', 'Computer')
@section('content')
<div class="max-w-6xl mx-auto sm:px-6 lg:px8">
    <div class="flex justify-center ">
        <h1>Computer</h1>
    </div>
    <div >
        @if(count($computers)>0)
            <ul>
                @foreach($computers as $computer)
                <a href="{{route('computers.show',['computer'=>$computer['id']])}}">
                <li class='btn-computer'>{{$computer['name']}} is from <string>{{$computer['origin']}}</string>  <string>{{$computer['price']}}</string></li>
                </a>

                @endforeach
            </ul>
            @else
            <p>There are no computer to display</P>
            @endif
    </div>
</div>
@endsection


