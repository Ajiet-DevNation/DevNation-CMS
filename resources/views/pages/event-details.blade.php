<x-layout>
    <header class="header" style="background-image: url({{ $event->banner }});">
        <x-nav />
        <div class="h">
            <h1>{{ $event->name }}</h1>
            <ul class="post-meta text-center">
                <li class="post-date"><i class="uil uil-calendar-alt"></i><span>{{ $event->start_date }}</span>
                </li>
                <li class="post-comments"><i class="uil uil-map-marker fs-15"></i>{{ $event->location }}
                </li>
            </ul>
        </div>
    </header>
    <main>
        <div class="container">
            <div>
                <h3><i class="uil uil-info-circle uil-fw"></i>About</h3>
                <p>{{ $event->description }}</p>
                <p>Event Type: {{ $event->event_type }}</p>
            </div>
            <div style="border-left: 1px solid black;">
                <h3><i class="uil uil-microphone uil-fw"></i>Speaker</h3>
                <p>{{ $event->speaker }}<br/> {{ $event->speaker_mail ? ' (' . $event->speaker_mail . ')' : '' }}</p>
            </div style="grid-column: 1 / -1">
            <div>
                @if ($event->has_certificate)
                    <h6><i class="uil uil-award uil-fw"></i>Certificate available!</h6>
                @endif
                {{-- need to reverify --}}
                @if ($event->start_date > now())
                    <button><span>Register Now</span></button>
                @endif
                @if ($event->start_date < now())
                    <button disabled><span>Register Closed</span></button>
                @endif
            </div>
        </div>
    </main>

</x-layout>
