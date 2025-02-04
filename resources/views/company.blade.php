@extends('layout.main')

@section('title', 'Candidax | Company')
@section('content')
<main>
    <x-hero.heroCompany />
    <x-listFounders />
    <div class="min-h-screen font-poppins text-white bg-subtleGray">
        <div class=" flex justify-evenly py-[45px] 2xl:px-[110px] bg-jungleGreen h-[552px] 2xl:gap-[70px]">
            <div class="flex-grow relative 2xl:max-w-[620px]">
                <img src="{{asset('/assets/images/web/instructor_materi.png')}}" alt="Instructor Materi" class="w-fit h-fit absolute top-0 left-0">
                <img src="{{asset('/assets/images/web/rais_provide_materi.png')}}" alt="Rais Provide Materi" class="w-fit h-fit absolute -bottom-[60%] right-0">
            </div>
            <div class="w-[50%] max-w-[598px] flex flex-col gap-5 items-center justify-center">
                <h1 class="text-xl 2xl:text-[32px] font-extrabold leading-[48px]">
                    Tingkatkan Potensi dan Peluang Karir Anda
                    <span class="text-primerText">bersama Program Berkualitas Kami!</span>
                </h1>
                <p class="text-sm 2xl:text-base">Jangan lewatkan kesempatan untuk memperluas wawasan dan meningkatkan keahlian Anda melalui program yang dirancang untuk menjawab kebutuhan karir Anda. Dengan materi-materi menarik dan narasumber yang ahli di bidangnya, program ini menjadi tempat yang tepat untuk belajar, berinovasi, dan berkembang!</p>
            </div>
        </div>
    </div>
    <div class=" pl-[110px] pt-[45px] bg-subtleGray">
        <x-alittleArticle/>
    </div>
    <x-alittleEvent class="bg-subtleGray"/>
</main>
@endsection