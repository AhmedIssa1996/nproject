@extends('layout')
@section('title', 'show Computer')
@section('content')
<div class="max-w-6xl mx-auto sm:px-6 lg:px8">
    <div class="flex justify-center pt-8">
        <h1>Computer</h1>
    </div>
    <div class="mt-8">


        <P>{{$computer['name']}} is from ({{$computer['origin']}}) - <string>{{$computer['price']}} $ </string></P>
        <a class="edit-btn btn-show" href="{{route('computers.edit',$computer->id)}}">Edit</a>
        <form action="{{route('computers.destroy',$computer->id)}}" method="post" >
            @csrf
            @method('DELETE')
            <input class="delete-btn" type="submit"value="Delete">
    </form>
    </div>


</div>
@endsection


