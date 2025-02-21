@extends('layout.main')

@section('title', 'Admin | Candidax')
@section('content')
<main class="min-h-screen pt-[200px] font-poppins text-primerText">
    <div class="flex flex-col gap-20">
        <article>
            <h1 class="font-semibold text-2xl px-[10%] mb-5">Article List</h1>
            <x-tableArticle/>
        </article>
        <article>
            <h1 class="font-semibold text-2xl px-[10%] mb-5">Event List</h1>
            <x-tableEvent/>
        </article>
        <article>
            <h1 class="font-semibold text-2xl px-[10%] mb-5">Partner & Client List</h1>
            <x-tablePartner/>
        </article>
    </div>
</main>
@endsection