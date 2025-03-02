@extends('layout.main')

@section('title', 'Candidax | Article')
@section('content')
<main class=" min-h-screen pt-[150px] px-[5%] lg:px-[110px] flex flex-col gap-5 font-poppins text-primerText">
    <img src="{{asset('/storage/image/'.$event->foto)}}" alt="{{$event->title}}" class="object-top w-full h-auto max-h-[250px] lg:max-h-[500px] rounded-2xl"/>
    <h2 class="text-xl lg:text-4xl font-semibold">
        {{$event->title}}
    </h2>
    <p class="text-sm leading-[21px]">
        {{$event->description}}
    </p>
</main>
@endsection