<header class="pt-10 absolute top-0 left-0 right-0 bottom-0 flex justify-center w-full h-fit font-poppins z-30">
    <nav class="w-full">
        <div class="w-[80%] max-w-[90%] h-[55px] flex justify-between items-center mx-auto font-medium text-primerText">
            <img src="{{ asset( '/assets/images/web/logo_candidax.png' )}}" alt="logo">
            <div class="lg:flex lg:gap-10 hidden">
                <x-nav.linkNav href="/" label="Home" />
                <x-nav.linkNav href="/company" label="Company" />
                <x-nav.linkNav href="/collaboration" label="Collaboration" />
                <x-nav.linkNav href="/services" label="Services" />
                <x-nav.linkNav href="/contact" label="Contact" />
                <x-nav.linkNav href="/admin" label="Admin" />
            </div>
            <a href="/" class="hidden lg:block p-[10px] bg-jungleGreen rounded-xl text-white">Contact Us</a>
            <button id="hamburgerButton" class="block lg:hidden"><x-icons.hamburgerIcon /></button>
        </div>
        <div id="navbarMobile" class="hidden h-screen w-screen fixed top-0 left-0 right-0 bottom-0 lg:hidden bg-black/50 justify-end">
            <div class="h-full bg-white pt-[50px] px-11 flex flex-col gap-10">
                <div class="flex flex-col gap-10 justify-around">
                    <x-nav.linkNav href="/" label="Home" />
                    <x-nav.linkNav href="/company" label="Company" />
                    <x-nav.linkNav href="/collaboration" label="Collaboration" />
                    <x-nav.linkNav href="/services" label="Services" />
                    <x-nav.linkNav href="/contact" label="Contact" />
                    <x-nav.linkNav href="/admin" label="Admin" />
                </div>
                <a href="/" class="lg:hidden block p-[10px] bg-jungleGreen rounded-xl text-white">Contact Us</a>
            </div>
            <button id="exitNavbar" class="absolute top-4 right-4 rounded-full">
                <x-icons.exitNavbar />
            </button>
        </div>
    </nav>
</header>
<script>
    const exitNavbar = document.getElementById('exitNavbar');
    const navbarMobile = document.getElementById('navbarMobile');
    const hamburgerButton = document.getElementById('hamburgerButton');
    hamburgerButton.addEventListener('click', function()
    {
        navbarMobile.classList.remove('hidden');
        navbarMobile.classList.add('flex');
    })
    exitNavbar.addEventListener('click', function(){
        navbarMobile.classList.remove('flex');
        navbarMobile.classList.add('hidden');
    })
</script>