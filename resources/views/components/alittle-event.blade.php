<div class="pt-[81px] pb-[112px] w-full pl-10 lg:px-[10%] flex flex-col gap-8 font-poppins text-primerText bg-subtleGray">
    <h1 class="2xl:text-[32px] text font-extrabold">Event</h1>
    <div class="w-full flex justify-between gap-5 lg:gap-16 overflow-x-scroll lg:overflow-x-hidden">
        @if(!empty($listEvents[0]))
            <a href="{{route('detailEvent', $listEvents[0]->id)}}" class="w-full lg:w-[50%] flex flex-col lg:flex-row lg:justify-between gap-[26px]">
                <img src="{{ asset('/storage/image/'.$listEvents[0]->foto) }}" alt="Article Thumbnail" class="w-full lg:w-[292px] h-[465px]">
                <div class="flex flex-col gap-5 w-[309px] lg:w-full lg:min-h-[320px] text-ellipsis">
                    <h2 class="text-xl 2xl:text-2xl font-semibold">
                        {{ $listEvents[0]->title }}
                    </h2>
                    <p class="text-sm leading-[21px] line-clamp-[10]">
                        {{ $listEvents[0]->description }}
                    </p>
                </div>
            </a>
        @endif
        <div class="w-full lg:w-[50%] flex lg:flex-col gap-5 lg:gap-[32px]">
        @for($i = 1; $i < count($listEvents); $i++)
            <a href="{{route('detailEvent', $listEvents[$i]->id)}}" class="w-full flex flex-col lg:flex-row items-center gap-x-5 gap-y-[26px]">
                <img src="{{ asset('/storage/image/'.$listEvents[$i]->foto) }}" alt="Article Thumbnail" class=" w-full h-[465px] lg:w-[170px] lg:h-[212px]">
                <div class="flex flex-col gap-5 flex-grow 2xl:w-full lg:h-[227px] w-[309px]">
                    <h2 class="text-xl 2xl:text-2xl font-semibold">
                        {{ $listEvents[$i]->title }}
                    </h2>
                    <p class="text-sm leading-[21px] line-clamp-[10] lg:line-clamp-3 2xl:line-clamp-5">
                        {{ $listEvents[$i]->description }}
                    </p>
                </div>
            </a>
            @endfor
        </div>
    </div>
    <a href="/events" class="self-center h-[47px] w-[209px] text-lg border-2 border-jungleGreen text-jungleGreen rounded-xl hover:border-0 hover:bg-jungleGreen hover:text-white flex items-center justify-center">
        Lainnya
    </a>
</div>