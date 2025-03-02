<div class="flex flex-col gap-5 font-poppins text-primerText">
    <h1 class="2xl:text-[32px] text font-extrabold">Article</h1>
    <div class="w-full flex gap-5 lg:gap-16 overflow-x-auto snap-x snap-mandatory scroll-smooth">
        @foreach($listArticle as $article)
        <div class="lg:py-4 lg:pr-14 flex flex-col lg:flex-row gap-[26px] items-center">
            <img src="{{asset('/storage/image/'.$article->foto)}}" alt="Article Thumbnail" class="w-[236px] h-[377px]">
            <div class="flex flex-col gap-5 max-h-[308px] w-[310px] lg:w-[974px] h-[320px] text-ellipsis">
                <h2 class="text-xl 2xl:text-2xl font-semibold">
                    {{$article->title}}
                </h2>
                <p class="text-sm leading-[21px] line-clamp-[10]">
                    {{$article->drscription}}
                </p>
            </div>
        </div>
        @endforeach
    </div>
    <a href="/articles" class="self-center h-[47px] w-[209px] text-lg border-2 border-jungleGreen text-jungleGreen rounded-xl hover:border-0 hover:bg-jungleGreen hover:text-white flex items-center justify-center">
        Lainnya
    </a>
</div>