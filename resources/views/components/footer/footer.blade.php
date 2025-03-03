<footer class="bg-white py-[100px] flex justify-center font-poppins font-medium w-full">
    <div class="flex justify-between flex-wrap gap-5 w-[80%]">
        <div>
            <img src="{{ asset( '/assets/images/web/logo_candidax.png' )}}" alt="logo" class="mb-2">
            <div class="flex flex-col gap-1 text-primerText text-wrap">
                <div class="flex gap-5">
                    <x-icons.placeIcon/>
                    <p>Jakarta Barat, Jakarta</p>
                </div>
                <a href="https://bit.ly/CallCandidax" class="flex gap-5">
                    <x-icons.whatsappIcon/>
                    <p>+62 895-4046-32933</p>
                </a>
                <a href="https://www.linkedin.com/company/candidax-consultant/" class="flex gap-5">
                    <x-icons.linkedInIcon/>
                    <p>Linkedin</p>
                </a>
                <a href="https://www.instagram.com/candidax.consultant/" class="flex gap-5">
                    <x-icons.instagramIcon/>
                    <p>@candidax.consultant</p>
                </a>
                <a href="mailto:candidax.cons@gmail.com" class="flex gap-5">
                    <x-icons.mailIcon/>
                    <p>candidax.cons@gmail.com</p>
                </a>
            </div>
        </div>
        <div class="flex flex-col gap-2">
            <h6 class="font-semibold text-2xl">Company</h6>
            <div class="flex flex-col gap-1">
                <a href="/company">Company</a>
                <a href="/company">Artikel</a>
            </div>
        </div>
        <div class="flex flex-col gap-2">
            <h6 class="font-semibold text-2xl">Services</h6>
            <div class="flex flex-col gap-1">
                <a href="/services">Head Hunting</a>
                <a href="/services">Mentoring & Training</a>
                <a href="/services">CV & LinkedIn Optimalization</a>
                <a href="/services">Career Consulting</a>
            </div>
        </div>
        <div class="flex flex-col gap-2">
            <h6 class="font-semibold text-2xl">Collaboration</h6>
            <div class="flex flex-col gap-1">
                <a href="/collaboration">Partner</a>
                <a href="/collaboration">Client</a>
                <a href="/collaboration">Testimoni</a>
            </div>
        </div>
    </div>
</footer>