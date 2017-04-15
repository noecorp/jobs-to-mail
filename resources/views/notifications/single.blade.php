@extends('layouts.app')

@section('title', config('app.description'))

@section('content')

@include('layouts.sitetitle')

<div class="row searches">
    <div class="col-lg-8 offset-lg-2 col-sm-12 offset-sm-0">
        <h3>{{ count($notification->data) }} Jobs found on {{ date("F jS, Y", strtotime($notification->created_at)) }}</h3>
        <p>Searching for "{{ $notification->search->keyword }} in {{ $notification->search->location }}" across {{ count(config('jobboards')) }} job boards.</p>

        @include('notifications.components.share')

        @foreach($notification->data as $job)
            <div class="card card-block">
                <h4 class="card-title">
                    <a href="{{ $job['url'] }}" target="_blank">{{ $job['title'] }}</a>
                </h4>
                @if($job['datePosted'])
                    <p>Posted on {{ date("F jS, Y", strtotime($job['datePosted'])) }}</p>
                @endif
                <p>Company: {{ $job['company'] }}</p>
                <p>Location: {{ $job['location'] }}</p>
            </div>
        @endforeach
    </div>
</div>

@endsection
