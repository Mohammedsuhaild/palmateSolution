@extends('layouts.app')

@section('content')
<div class="container">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($googleSheetData as $data)
            <tr>
                <td>{{ $data->firstname }}</td>
                <td>{{ $data->lastname }}</td>
                <td>{{ $data->email }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
