@extends('portal.problem._layout')

@section('title')
    {{ $problem->title() }} Problem Statistics
@endsection

@section('problem_content')
    @include('portal.problem._stats')
@endsection
