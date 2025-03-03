@extends('layout.main')

@section('title', $article->title)
@section('description', $article->description)
@section('content')
<main class=" min-h-screen pt-[150px] px-[5%] lg:px-[110px] flex flex-col gap-5 font-poppins text-primerText">
    <img src="{{asset('/storage/image/'.$article->foto)}}" alt="{{$article->title}}" class="object-top w-full h-auto max-h-[250px] lg:max-h-[500px] rounded-2xl"/>
    <h2 class="text-xl lg:text-4xl font-semibold">
        {{$article->title}}
    </h2>
    <p class="text-sm leading-[21px]">
        {{$article->description}}
    </p>
</main>
@endsection