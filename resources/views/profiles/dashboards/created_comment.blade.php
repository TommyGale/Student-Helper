@component('profiles.dashboards.dashboard')
    @slot('heading')
        {{ $profileUser->name }} commented on
        <a href="{{ $dashboard->subject->post->path() }}">"{{ $dashboard->subject->post->title }}"</a>
    @endslot

    @slot('body')
        {{ $dashboard->subject->description }}
    @endslot
@endcomponent