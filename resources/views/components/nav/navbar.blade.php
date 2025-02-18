<header class="py-10 absolute top-0 left-0 right-0 bottom-0 flex justify-center w-full h-fit font-poppins z-30">
    <nav class="w-[80%] max-w-[90%] h-[55px] flex justify-between items-center mx-auto font-medium text-primerText">
        <img src="{{ asset( '/assets/images/web/logo_candidax.png' )}}" alt="logo">
        <div class="lg:flex lg:gap-10 hidden">
            <x-nav.linkNav href="/" label="Home"/>
            <x-nav.linkNav href="/company" label="Company"/>
            <x-nav.linkNav href="/collaboration" label="Collaboration"/>
            <x-nav.linkNav href="/services" label="Services"/>
            <x-nav.linkNav href="/contact" label="Contact"/>
        </div>
        <a href="/" class="hidden lg:block p-[10px] bg-jungleGreen rounded-xl text-white">Contact Us</a>
        <button class="block lg:hidden"><x-icons.hamburgerIcon/></button>
    </nav>
</header>