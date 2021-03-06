@extends('layouts.app')
@section('content')

<div class="box">
    <div class="columns">
        <div class="column">
            <img class="image is-rounded" src="/storage/avatars/{{$profile->profiles->avatar}}" alt="">
        </div>
        <div class="column is-two-thirds">
            <h1 class="title has-text-primary is-1">{{$profile->profiles->firstname}} {{ $profile->profiles->lastname}}</h1>
            <h2 class="subtitle has-text-primary is-3"><i>@ {{$profile->username}}</i></h2>
            <div class="field">
                <span class="icon has-text-primary is-medium">
                    <i class="fas fa-envelope"></i>
                </span>
                <span class="is-size-5">{{$profile->email}}</span>
            </div>
            <div class="field">
                <span class="icon has-text-primary is-medium">
                    <i class="fas fa-birthday-cake"></i>
                </span>
                <span class="is-size-5">{{$profile->profiles->birthdate}}</span>
            </div>
            <div class="field">
                <span class="icon has-text-primary is-medium">
                    <i class="fas fa-quote-left"></i>
                </span>
                <span class="is-size-5">{{$profile->profiles->bio}}</span>
                <span class="icon has-text-primary is-medium">
                    <i class="fas fa-quote-right"></i>
                </span>
            </div>
            <div class="field">
                <span class="icon has-text-primary is-medium">
                    <i class="fas fa-globe"></i>
                </span>
                <span class="is-size-5">{{$profile->profiles->location}}</span>
            </div>
            <div class="field">
                <span class="icon has-text-primary is-medium">
                    <i class="fas fa-calendar"></i>
                </span>
                <span class="is-size-5">Member since : {{$profile->created_at->format('m-d-Y')}}</span>
            </div>
            @if (Auth::user()->id == $profile->id)
                <a href="/profile/edit?id={{Auth::user()->id}}">
                    <button class="button is-medium is-info">
                        <span class="icon is-small">
                            <i class="fas fa-edit"></i>
                        </span>
                        <span>Edit Your Profile</span>
                    </button>
                </a>
            @endif
            @if (!(in_array($profile->id, Auth::user()->follows->pluck('followed_by')->toArray())))
                @if ($profile->id != Auth::user()->id)
                    <form action="/follows/followUser" method="get">
                        <button class="button is-large is-success" type="submit"name="id" value="{{$profile->id}}">Follow</button>
                    </form>
                @endif
            @else
                <form action="/follows/unfollowUser" method="get">
                    <button class="button is-large is-danger" type="submit" name="id" value="{{$profile->id}}">Unfollow</button>
                </form>
            @endif
        </div>
    </div>
</div>

<div class="card">
    <header class="card-header">
        <p class="card-header-title has-text-primary title is-3">Tweets</p>
    </header>
    <div class="card-content">
        <div class="content">
            @foreach ($profile->tweets as $tweet)
            <div class="box">
                @include('tweet.tweet')
            </div>
            @endforeach
        </div>
    </div>

</div>
@endsection


