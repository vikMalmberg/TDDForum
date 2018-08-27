@component('profiles.activities.activity')
    @slot('heading')
        {{ $profileUser->name }} replied to "{{ $activity->subject->thread->title }}"
    @endslot


    @slot('body')
        {{ $activity->subject->body }}
    @endslot

@endcomponent
