@extends('layout.main')

@section('title', 'Candidax | Company')
@section('content')
<main>
    <x-hero.heroCompany />
    <x-listFounders />
    <div class="min-h-screen font-poppins text-white bg-subtleGray">
        <div class=" flex justify-center lg:justify-evenly flex-col items-center lg:flex-row py-[45px] 2xl:px-[110px] bg-jungleGreen lg:h-[552px] gap-[70px] gap-y-[10px] px-[5%]">
            <div class="relative w-full lg:max-w-[50%] h-full">
                <img src="{{asset('/assets/images/web/cek.png')}}"
                    alt="Instructor Materi"
                    class="w-full h-fit">
            </div>
            <div class="w-full lg:w-[50%] lg:max-w-[598px] flex flex-col gap-5 items-center justify-center">
                <h1 class="text-xl 2xl:text-[32px] font-extrabold leading-8 2xl:leading-[48px]">
                    Tingkatkan Potensi dan Peluang Karir Anda
                    <span class="text-primerText">bersama Program Berkualitas Kami!</span>
                </h1>
                <p class="text-sm 2xl:text-base">Jangan lewatkan kesempatan untuk memperluas wawasan dan meningkatkan keahlian Anda melalui program yang dirancang untuk menjawab kebutuhan karir Anda. Dengan materi-materi menarik dan narasumber yang ahli di bidangnya, program ini menjadi tempat yang tepat untuk belajar, berinovasi, dan berkembang!</p>
            </div>
        </div>
    </div>
    <div class=" pl-10 lg:pl-[110px] pt-[45px] bg-subtleGray">
        <x-alittle-article :listArticle="$articles" />
    </div>
    <x-alittle-event :listEvents="$events" class="bg-subtleGray" />
</main>
@endsection