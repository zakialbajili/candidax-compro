@extends('layout.main')

@section('title', 'Candidax | Events')
@section('content')
<main class="pt-[150px] px-[5%] lg:px-[110px] flex flex-col px-auto gap-5 font-poppins text-primerText">
    <a href="/company" class="text-2xl font-semibold flex items-center gap-[10px]">
        <x-icons.arrowLeft width="32" height="32" />
        <p>Detail Event</p>
    </a>
    <article class="flex flex-col gap-5">
        @foreach($listEvents as $event)
        <div class="flex flex-col lg:flex-row gap-[26px]">
            <img src="{{asset('/storage/image/'.$event->foto)}}" alt="Article Thumbnail" class="w-full h-fit lg:w-[236px] lg:h-[377px]">
            <div class="flex flex-col gap-5">
                @php
                    $eventDate = \Carbon\Carbon::parse($event->event_date);
                    $today = now()
                @endphp
                @if($eventDate->isPast())
                <p class="text-cherryRed text-2xl font-semibold self-end">{{ date_format($eventDate, "j F Y") }}</p>
                @else
                <p class="text-softBlue text-2xl font-semibold self-end">{{ date_format($eventDate, "j F Y") }}</p>
                @endif
                <div class="flex flex-col gap-5">
                    <h2 class="text-xl 2xl:text-2xl font-semibold">
                        {{$event->title}}
                    </h2>
                    <p class="text-sm leading-[21px] text-justify line-clamp-[10]">
                        {{$event->description}}
                    </p>
                </div>
            </div>
        </div>
        @endforeach
    </article>

</main>
@endsection