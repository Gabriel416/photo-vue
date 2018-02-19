@extends('layouts.app')
@section('styles')
<link rel="stylesheet" href="/css/walkthrough.css">
@endsection
@section('content')
 	<div id="app">
 		<router-view></router-view>
 	</div>
@endsection
@section('scripts')
<script src="https://unpkg.com/gif-frames@0.4.0?main=bundled-min"></script>

<script src="{{asset('js/app.js')}}"></script>
@endsection