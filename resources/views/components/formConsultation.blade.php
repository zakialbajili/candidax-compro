<div class="w-full bg-subtleGray py-10 px-[110px] flex justify-around gap-[38px] font-poppins">
    <div class="w-[70%] max-w-[900px] h-[700px] relative">
        <img src="{{asset('/assets/images/web/heroCollaboration.png')}}" alt="Contact Form Image 1" class="2xl:w-fit 2xl:h-fit w-[439px] h-[259px] absolute top-0 left-0">
        <img src="{{asset('/assets/images/web/example_article.png')}}" alt="Contact Form Image 1" class="w-fit h-fit absolute top-1/4 left-[35%] z-10">
        <img src="{{asset('/assets/images/web/contactForm.png')}}" alt="Contact Form Image 1" class="w-fit h-fit absolute bottom-0 right-0">
    </div>
    <form action="" class="p-5 flex flex-col gap-5 min-w-[374px] text-xs text-primerText">
        <h1 class="text-2xl font-semibold text-jungleGreen">Bermitra Sekarang!</h1>
        <div class="w-full flex flex-col gap-[10px]">
            <label for="name"><span class="text-cherryRed">*</span>  Nama Lengkap</label>
            <input
                type="text"
                placeholder="Please input your name"
                class="py-[10px] px-3 rounded-xl border-2 border-primerText"
            />
        </div>
        <div class="w-full flex flex-col gap-[10px]">
            <label for="name"><span class="text-cherryRed">*</span>  No. Telepon</label>
            <input
                type="text"
                placeholder="Please input your name"
                class="py-[10px] px-3 rounded-xl border-2 border-primerText"
            />
        </div>
        <div class="w-full flex flex-col gap-[10px]">
            <label for="name"><span class="text-cherryRed">*</span>  Email</label>
            <input
                type="text"
                placeholder="Please input your name"
                class="py-[10px] px-3 rounded-xl border-2 border-primerText"
            />
        </div>
        <div class="w-full flex flex-col gap-[10px]">
            <label for="name"><span class="text-cherryRed">*</span>  Nama Perusahaan</label>
            <input
                type="text"
                placeholder="Please input your name"
                class="py-[10px] px-3 rounded-xl border-2 border-primerText"
            />
        </div>
        <div class="w-full flex flex-col gap-[10px]">
            <label for="name"><span class="text-cherryRed">*</span>  Kendala yang dihadapi</label>
            <textarea
                type="text"
                name=""
                id=""
                placeholder="Please input your name"
                class="py-[10px] px-3 rounded-xl border-2 border-primerText"
            ></textarea>
        </div>
        <button class="w-full mt-10 bg-jungleGreen text-white p-[10px] text-lg rounded-xl">
            Submit
        </button>
    </form>
</div>