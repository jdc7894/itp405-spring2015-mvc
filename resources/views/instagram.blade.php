@extends('layout')
@section('content')
	@foreach($instagrams as $instagram)
		<img src="{{$instagram->images->low_resolution->url}}">
	@endforeach
@stop