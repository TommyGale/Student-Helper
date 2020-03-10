@component('profiles.dashboards.dashboard')
    @slot('heading')
        {{ $profileUser->name }} posted
        <a href="{{ $dashboard->subject->path() }}">{{ $dashboard->subject->title }}</a>
    @endslot

    @slot('body')
        {{ $dashboard->subject->description }}
    @endslot
@endcomponent