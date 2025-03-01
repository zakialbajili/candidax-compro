@extends('layout.main')

@section('title', 'Candidax')
@section('content')
<main>
    <x-hero.heroHome></x-hero.heroHome>
    <x-service />
    <div class="py-[50px] lg:py-[100px] font-poppins mb-[94px]">
        <h2 class="text-jungleGreen text-xl 2xl:text-[32px] leading-8 2xl:leading-[48px] font-extrabold px-[8%] mb-[33px] lg:mb-10">
            Collaboration is the key to success. <br class="hidden lg:block"/>
            <span class="text-black">Let’s grow together !</span>
        </h2>
        <x-slider-testimoni/>
    </div>
    <x-cta />
</main>
@endsection