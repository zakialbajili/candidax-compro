@extends('layout.main')

@section('title', 'Add Article | Candidax')
@section('content')
<main class="w-full h-screen flex items-center justify-center font-poppins text-primerText pt-[200px]">
    <div class="w-full h-fit rounded-xl flex flex-col gap-10 px-[5%]">
        <a
            href="/admin"
            class="flex gap-5 items-center font-semibold">
            <x-icons.arrowLeft />
            <p class="text-2xl">Add Article</p>
        </a>
        <form action="{{route('admin.createArticle')}}" method="POST" enctype="multipart/form-data" class="w-full bg-subtleGray flex gap-20 py-10 px-[5%]">
            @csrf
            <div class="w-[332px] h-[418px] flex flex-col items-center justify-center border-2 border-dashed border-border">
                <!-- Preview Image -->
                <div id="containerPreview" class="hidden w-full h-full relative">
                    <img id="preview" class="w-full h-full object-cover hidden rounded-lg" />
                    <div id="deletePreview" class="absolute inset-0 flex items-center justify-center text-white bg-black/80 rounded-xl">
                        <button id="buttonDeletePreview" type="button" class="bg-white rounded-full p-5 text-black/80">
                            <x-icons.trashIcon/>
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
                    <label for="title"><span class="text-cherryRed">*</span> Title</label>
                    <input
                        id="title"
                        name="title"
                        type="text"
                        placeholder="Masukkan title"
                        class="py-[10px] px-3 rounded-xl border-2 border-primerText" />
                    @error('title')
                    <p class="text-cherryRed">{{$message}}</p>
                    @enderror
                </div>
                <div class="w-full flex flex-col gap-[10px]">
                    <label for="description"><span class="text-cherryRed">*</span> Content</label>
                    <textarea
                        type="text"
                        name="description"
                        id="description"
                        placeholder="Masukkan content"
                        class="py-[10px] px-3 rounded-xl border-2 border-primerText h-[150px]"></textarea>
                    @error('description')
                    <p class="text-cherryRed">{{$message}}</p>
                    @enderror
                </div>
                <button type="submit" class="w-[122px] self-end mt-10 bg-jungleGreen text-white p-[10px] text-lg rounded-xl">
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
</script>
@endsection