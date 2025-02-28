@extends('layout.main')

@section('title', 'Add Partner | Candidax')
@section('content')
<main class="w-full h-screen flex items-center justify-center font-poppins text-primerText pt-[200px]">
    <div class="w-full h-fit rounded-xl flex flex-col gap-10 px-[5%]">
        <a
            href="/admin"
            class="flex gap-5 items-center font-semibold">
            <x-icons.arrowLeft />
            <p class="text-2xl">Add Partner & Client</p>
        </a>
        <form action="{{route('admin.createPartner')}}" method="POST" enctype="multipart/form-data" class="w-full bg-subtleGray flex gap-20 py-10 px-[5%]">
            @csrf
            <div class="w-[332px] h-[418px] flex flex-col items-center justify-center border-2 border-dashed border-border">
                <!-- Preview Image -->
                <div id="containerPreview" class="hidden w-full h-full relative">
                    <img id="preview" class="w-full h-full object-cover hidden rounded-lg" />
                    <div id="deletePreview" class="absolute inset-0 flex items-center justify-center text-white bg-black/80 rounded-xl">
                        <button id="buttonDeletePreview" type="button" class="bg-white rounded-full p-5 text-black/80">
                            <x-icons.trashIcon />
                        </button>
                    </div>
                </div>
                <label id="labelFoto" for="foto" class="flex flex-col items-center justify-center gap-5 hover:cursor-pointer">
                    <x-icons.imageIcon />
                    <p>Upload Image</p>
                </label>
                <input id="foto" name="foto" type="file" accept="image/*" class="hidden">
                @error('foto')
                <p class="text-xs text-cherryRed">{{$message}}</p>
                @enderror
            </div>
            <div class="flex flex-grow flex-col gap-5 text-xs text-primerText">
                <div class="w-full flex flex-col gap-[10px]">
                    <label for="name"><span class="text-cherryRed">*</span> Name</label>
                    <input
                        id="name"
                        name="name"
                        type="text"
                        placeholder="Masukkan title"
                        class="py-[10px] px-3 rounded-xl border-2 border-primerText" />
                    @error('name')
                    <p class="text-xs text-cherryRed">{{$message}}</p>
                    @enderror
                </div>
                <div class="w-full flex flex-col gap-[10px]">
                    <label for="testimony"><span class="text-cherryRed">*</span> Content</label>
                    <textarea
                        type="text"
                        name="testimony"
                        id="testimony"
                        placeholder="Masukkan testimony"
                        class="py-[10px] px-3 rounded-xl border-2 border-primerText h-[150px]"></textarea>
                    @error('testimony')
                        <p class="text-xs text-cherryRed">{{$message}}</p>
                    @enderror
                </div>
                <div class="w-full flex flex-col gap-[10px]">
                    <label for="rating"><span class="text-cherryRed">*</span> Rating</label>
                    <div
                        class="flex gap-1">
                        @for($i=1; $i<=5; $i++)
                            <button type="button" data-rating="{{$i}}">
                                <x-icons.starIcon />
                            </button>
                        @endfor
                        <input type="hidden" name="rating" id="rating">
                    </div>
                    @error('rating')
                    <p class="text-xs text-cherryRed">{{$message}}</p>
                    @enderror
                    <button class="w-[122px] self-end mt-10 bg-jungleGreen text-white p-[10px] text-lg rounded-xl">
                        Submit
                    </button>
                </div>
        </form>
    </div>
</main>
<script>
    const containerPreview = document.getElementById("containerPreview");
    const deletePreview = document.getElementById("deletePreview");
    const labelFoto = document.getElementById("labelFoto");
    const preview = document.getElementById("preview");
    const fotoInput = document.getElementById("foto");
    const buttonDeletePreview = document.getElementById("buttonDeletePreview");
    // Event saat gambar dipilih
    fotoInput.addEventListener("change", function(event) {
        const file = event.target.files[0];

        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;
                containerPreview.classList.remove("hidden"); // Tampilkan container preview
                preview.classList.remove("hidden"); // Tampilkan gambar
                labelFoto.classList.add("hidden"); // Sembunyikan label upload
            };
            reader.readAsDataURL(file);
        }
    });

    // Tampilkan deletePreview saat hover containerPreview
    containerPreview.addEventListener("mouseenter", function() {
        deletePreview.classList.remove("hidden");
    });

    // Sembunyikan deletePreview saat kursor keluar dari containerPreview
    containerPreview.addEventListener("mouseleave", function() {
        deletePreview.classList.add("hidden");
    });

    // Hapus gambar saat deletePreview diklik
    buttonDeletePreview.addEventListener("click", function() {
        fotoInput.value = ""; // Reset input file
        preview.src = ""; // Hapus gambar dari src
        containerPreview.classList.add("hidden"); // Sembunyikan container preview
        labelFoto.classList.remove("hidden"); // Tampilkan kembali label upload
    });
    const ratingButtons = document.querySelectorAll("button[data-rating]");
    const ratingInput = document.getElementById("rating");

    ratingButtons.forEach(button => {
        button.addEventListener("click", function () {
            const selectedRating = this.getAttribute("data-rating");
            ratingInput.value = selectedRating;

            // Ubah warna bintang berdasarkan rating yang dipilih
            ratingButtons.forEach(btn => {
                const starValue = btn.getAttribute("data-rating");
                if (starValue <= selectedRating) {
                    btn.classList.add("text-yellow-500"); // Warna bintang aktif
                } else {
                    btn.classList.remove("text-yellow-500");
                }
            });
        });
    });
</script>
@endsection