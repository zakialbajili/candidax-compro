<div class="w-full min-h-screen lg:h-fit bg-subtleGray py-10 px-[5%] flex flex-col lg:flex-row lg:justify-around gap-[38px] font-poppins">
    <div class="shrink-0 w-full lg:w-[70%] max-w-[700px] 2xl:max-w-[900px] h-[60vh] lg:h-[650px] 2xl:h-[700px] relative">
        <img src="{{asset('/assets/images/web/heroCollaboration.png')}}" alt="Contact Form Image 1" class="2xl:w-fit 2xl:h-fit lg:w-[439px] lg:h-[259px] w-[60%] h-fit absolute top-0 left-0">
        <img src="{{asset('/assets/images/web/example_article.png')}}" alt="Contact Form Image 1" class="lg:w-fit lg:h-fit w-[40%] h-fit absolute top-1/4 left-[35%] z-10">
        <img src="{{asset('/assets/images/web/contactForm.png')}}" alt="Contact Form Image 1" class="2xl:w-fit 2xl:h-fit lg:w-[373px] lg:h-[240px] w-[60%] h-fit absolute bottom-0 right-0">
    </div>
    <form action="{{route('createConsult')}}" method="POST" class="lg:p-5 flex flex-col gap-5 w-full lg:min-w-[374px] text-xs text-primerText">
        @csrf
        <h1 class="text-2xl font-semibold text-jungleGreen">Bermitra Sekarang!</h1>
        <div class="w-full flex flex-col gap-[10px]">
            <label for="name"><span class="text-cherryRed">*</span> Nama Lengkap</label>
            <input
                type="text"
                name="name"
                id="name"
                placeholder="Please input your name"
                class="py-[10px] px-3 rounded-xl border-2 border-primerText" />
            @error('name')
            <p class="text-xs text-cherryRed">{{$message}}</p>
            @enderror
        </div>
        <div class="w-full flex flex-col gap-[10px]">
            <label for="phone"><span class="text-cherryRed">*</span> No. Telepon</label>
            <input
                name="phone"
                id="phone"
                type="number"
                placeholder="Please input your name"
                class="py-[10px] px-3 rounded-xl border-2 border-primerText" />
            @error('phone')
            <p class="text-xs text-cherryRed">{{$message}}</p>
            @enderror
        </div>
        <div class="w-full flex flex-col gap-[10px]">
            <label for="email"><span class="text-cherryRed">*</span> Email</label>
            <input
                type="email"
                name="email"
                id="email"
                placeholder="Please input your email"
                class="py-[10px] px-3 rounded-xl border-2 border-primerText" />
            @error('email')
            <p class="text-xs text-cherryRed">{{$message}}</p>
            @enderror
        </div>
        <div class="w-full flex flex-col gap-[10px]">
            <label for="company"><span class="text-cherryRed">*</span> Nama Perusahaan</label>
            <input
                name="company"
                id="company"
                type="text"
                placeholder="Please input your name"
                class="py-[10px] px-3 rounded-xl border-2 border-primerText" />
            @error('company')
            <p class="text-xs text-cherryRed">{{$message}}</p>
            @enderror
        </div>
        <div class="w-full flex flex-col gap-[10px]">
            <label for="service"><span class="text-cherryRed">*</span> Status</label>
            <select name="service" id="service" class="py-[10px] px-3 rounded-xl border-2 border-primerText">
                <option value="Mentoring & Training">Mentoring & Training</option>
                <option value="Head Hunting">Head Hunting</option>
                <option value="Career Consulting">Career Consulting</option>
                <option value="CV Optimalization">CV Optimalization</option>
                <option value="Linkedin Optimalization">Linkedin Optimalization</option>
            </select>
            @error('service')
            <p class="text-xs text-cherryRed">{{$message}}</p>
            @enderror
        </div>
        <div class="w-full flex flex-col gap-[10px]">
            <label for="message"><span class="text-cherryRed">*</span> Kendala yang dihadapi</label>
            <textarea
                type="text"
                name="message"
                id="message"
                placeholder="Please input your name"
                class="py-[10px] px-3 rounded-xl border-2 border-primerText"></textarea>
            @error('message')
            <p class="text-xs text-cherryRed">{{$message}}</p>
            @enderror
        </div>
        <button type="submit" class="w-full mt-10 bg-jungleGreen text-white p-[10px] text-lg rounded-xl">
            Submit
        </button>
    </form>
</div>