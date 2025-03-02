@extends('layout.main')

@section('title', 'Candidax | Article')
@section('content')
<main class="pt-[170px] px-[5%] lg:px-[110px] flex flex-col gap-5 font-poppins text-primerText">
    <a href="/company" class="text-2xl font-semibold flex items-center gap-[10px]">
        <x-icons.arrowLeft width="32" height="32" />
        <p>Detail Article</p>
    </a>
    @foreach($listArticles as $article)
    <a href="{{route('detailArticle', $article->id)}}" class="lg:py-4 lg:pr-14 flex flex-col lg:flex-row gap-[26px] items-center">
        <img src="{{asset('/storage/image/'.$article->foto)}}" alt="Article Thumbnail" class="w-full lg:w-[236px] h-[377px]">
        <div class="flex flex-col gap-5 max-h-[308px] w-full text-start lg:w-[974px]]">
            <h2 class="text-xl 2xl:text-2xl font-semibold">
                {{$article->title}}
            </h2>
            <p class="text-sm leading-[21px] line-clamp-[10]">
                {{$article->description}}
            </p>
        </div>
    </a>
    @endforeach
</main>
@endsection