<div id="containerSlider" data-listPartner="{{$listShowPartners}}" class="w-full bg-subtleGray py-10 lg:py-[60px] flex justify-center items-center">
    <div class="w-[80%] flex flex-col items-center gap-10 lg:gap-2 overflow-x-auto">
        <div class="cardPartner w-full flex flex-wrap-reverse lg:flex-nowrap justify-center lg:justify-between gap-[37px] lg:gap-24 text-primerText text-lg">
            <div class="flex flex-col gap-12 lg:gap-0 justify-between">
                <p id="testimonyText" class="text-sm lg:text-xl 2xl:text-[32px] text-center lg:text-start leading-5 lg:leading-8 2xl:leading-[48px]"></p>
                <div class="flex flex-col items-center lg:items-start">
                    <p id="clientName" class="font-semibold text-base text-black"></p>
                    <p id="clientPosition" class="text-sm "></p>
                    <div id="containerRating" class="flex gap-2">
                    </div>
                </div>
            </div>
            <img id="imagePartner" alt="client logo" class="w-[275px] h-[290px] my-0 lg:my-6">
        </div>
        <div class="flex flex-row gap-5">
            <button id="prevSlide" class="h-[52px] w-[52px] border-2 border-jungleGreen text-jungleGreen hover:border-0 hover:bg-jungleGreen hover:text-white rounded-xl flex items-center justify-center"><x-icons.arrowLeft /></button>
            <button id="nextSlide" class="h-[52px] w-[52px] border-2 border-jungleGreen text-jungleGreen hover:border-0 hover:bg-jungleGreen hover:text-white rounded-xl flex items-center justify-center"><x-icons.arrowRight /></button>
        </div>
    </div>
</div>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const containerSlider = document.getElementById('containerSlider');
        const testimonyText = document.getElementById('testimonyText');
        const clientName = document.getElementById('clientName');
        const clientPosition = document.getElementById('clientPosition');
        const prevSlide = document.getElementById('prevSlide');
        const nextSlide = document.getElementById('nextSlide');
        const imagePartner = document.getElementById('imagePartner');
        const containerRating = document.getElementById('containerRating');
        const listPartner = JSON.parse(containerSlider.getAttribute('data-listPartner'));
        let indexShow = 0;

        function changeCard(index) {
            testimonyText.innerHTML = `" ${listPartner[index].testimony} "`;
            clientName.innerHTML = listPartner[index].name;
            clientPosition.innerHTML = listPartner[index].position;
            imagePartner.src = `/storage/image/${listPartner[index].foto}`;
            const rating = listPartner[index].rating;
            const stars = document.querySelectorAll('.ratingStar')
            let listStars ='';
            for(let i=1; i<=5; i++){
                if(i<=rating){
                    listStars += `
                        <span class="ratingStar text-gold">
                            <x-icons.starIcon />
                        </span>
                    `
                }else{
                    listStars += `
                        <span class="ratingStar text-primerText">
                            <x-icons.starIcon />
                        </span>
                    `
                }
            }
            containerRating.innerHTML = listStars;
        }
        changeCard(0)
        nextSlide.addEventListener('click', function() {
            if (indexShow < listPartner.length - 1) {
                indexShow += 1;
            } else {
                indexShow = 0;
            }
            changeCard(indexShow);
        })
        prevSlide.addEventListener('click', function() {
            if (indexShow > 0) {
                indexShow -= 1;
            } else {
                indexShow = listPartner.length-1;
            }
            changeCard(indexShow);
        })
    })
</script>