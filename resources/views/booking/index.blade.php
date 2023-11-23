@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Your Appointments ({{$appointments->count()}})</div>

                <div class="card-body">
                   <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Doctor</th>
                                <th scope="col">Time</th>
                                <th scope="col">Date for</th>
                                <th scope="col">Created date</th>
                                <th scope="col">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($appointments as $key=>$appointments)
                            <tr>
                                <th scope="row">{{$key+1}}</th>
                                <th>{{$appointments->doctor->name}}</th>
                                <th>{{$appointments->time}}</th>
                                <th>{{$appointments->date}}</th>
                                <th>{{$appointments->created_at}}</th>
                                <th>@if($appointments->status==0)
                                    <button class="btn btn-primary">Not visited</button>
                                    @else
                                    <button class="btn btn-success">Checked</button>
                                    @endif
                                </th>
                            </tr>
                            @empty
                            <td>You have no any appointments</td>
                            @endforelse
                        </tbody>
                   </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
