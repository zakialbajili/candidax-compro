@extends('layout.main')

@section('title', 'Candidax | Collaboration')
@section('content')
<main>
    <x-hero.heroCollaboration/>
    <div class="pt-[100px] font-poppins mb-[94px]">
        <h2 class="text-center text-jungleGreen text-2xl 2xl:text-[32px] leading-8 2xl:leading-[48px] font-extrabold px-[10%] mb-10">
            Our Partner & Client
        </h2>
       <x-slider-testimoni :listShowPartners="$listShowPartners"/>
    </div>
</main>
@endsection