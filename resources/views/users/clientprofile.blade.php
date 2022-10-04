@extends('layouts.app', ['page' => __('clientprofile'), 'pageSlug' => 'clientprofile'])

@section('content')
<table class="table tablesorter " id="">
    <thead class=" text-primary">
        <tr><th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">Contact</th>
        <th scope="col"></th></tr>
    </thead>
    <tbody>
            <tr>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->number}}</td>
            </tr>
    </tbody>
</table>

@endsection