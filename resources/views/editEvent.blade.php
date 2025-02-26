@extends('layout.main')

@section('title', 'Login | Candidax')

@section('content')
<main class="w-full h-screen flex items-center justify-center font-poppins text-primerText">
    <div class="w-full h-fit rounded-xl flex flex-col gap-10 px-[5%]">
        <a
            href="/admin"
            class="flex gap-5 items-center font-semibold">
            <x-icons.arrowLeft />
            <p class="text-2xl">Edit Event</p>
        </a>
        <form action="{{route('admin.editEvent', $detailEvent['id'])}}" method="POST" enctype="multipart/form-data" class="w-full bg-subtleGray flex gap-20 py-10 px-[5%]">
            @csrf
            @method('put')
            <div class="w-[332px] h-[418px] flex flex-col items-center justify-center border-2 border-dashed border-border">
                <!-- Preview Image -->
                @if(!empty($detailEvent['foto']))
                <div id="containerPreviewDB" class=" w-full h-full relative">
                    <img id="previewDB" src="{{asset('/storage/image/'.$detailEvent['foto'])}}" class="w-full h-full object-cover rounded-lg" />
                    <div id="deletePreview" class="absolute inset-0 flex items-center justify-center text-white bg-black/80 rounded-xl">
                        <input type="hidden" name="hasDelete" id="hasDelete" value="false">
                        <button id="buttonDeletePreview" type="button" class="bg-white rounded-full p-5 text-black/80">
                            <x-icons.trashIcon />
                        </button>
                    </div>
                </div>
                @endif
                <div id="containerPreview" class="hidden w-full h-full relative">
                    <img id="preview" class="w-full h-full object-cover rounded-lg" />
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
                <input id="foto" name="foto" type="file" accept="image/*" value="{{$detailEvent['foto']}}" class="hidden">
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
                        class="py-[10px] px-3 rounded-xl border-2 border-primerText"
                        value="{{$detailEvent['title']}}"
                    />
                    @error('title')
                    <p class="text-cherryRed">{{$message}}</p>
                    @enderror
                </div>
                <div class="w-full flex flex-col gap-[10px]">
                    <label for="event_date"><span class="text-cherryRed">*</span> Event Date</label>
                    <input
                        type="datetime-local"
                        name="event_date"
                        id="event_date"
                        value="{{$detailEvent['event_date']}}"
                        class="py-[10px] px-3 rounded-xl border-2 border-primerText"
                    />
                    @error('event_date')
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
                        class="py-[10px] px-3 rounded-xl border-2 border-primerText h-[150px]"
                    >{{$detailEvent['description']}}</textarea>
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
    const containerPreviewDB = document.getElementById("containerPreviewDB");
    const containerPreview = document.getElementById("containerPreview");
    const deletePreview = document.getElementById("deletePreview");
    const labelFoto = document.getElementById("labelFoto");
    const preview = document.getElementById("preview");
    const previewDB = document.getElementById("previewDB");
    const fotoInput = document.getElementById("foto");
    const buttonDeletePreview = document.getElementById("buttonDeletePreview");
    const hasDelete = document.getElementById('hasDelete');
    // Event saat gambar dipilih
    if(containerPreviewDB){
        labelFoto.classList.add("hidden");
    }
    fotoInput.addEventListener("change", function(event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;
                if (containerPreviewDB) {
                    containerPreviewDB.classList.add("hidden"); // Tampilkan container preview
                    previewDB.src = "";
                }
                containerPreview.classList.remove("hidden"); // Tampilkan container preview
                // preview.classList.remove("hidden"); // Tampilkan gambar
                labelFoto.classList.add("hidden"); // Sembunyikan label upload
            };
            reader.readAsDataURL(file);
        }
    });

    // Event delegation untuk hover pada container preview
    document.addEventListener("mouseenter", function(event) {
        if (event.target.closest("#containerPreview") || event.target.closest("#containerPreviewDB")) {
            const deleteBtn = event.target.closest(".relative")?.querySelector("#deletePreview");
            if (deleteBtn) deleteBtn.classList.remove("hidden");
        }
    }, true);

    document.addEventListener("mouseleave", function(event) {
        if (event.target.closest("#containerPreview") || event.target.closest("#containerPreviewDB")) {
            const deleteBtn = event.target.closest(".relative")?.querySelector("#deletePreview");
            if (deleteBtn) deleteBtn.classList.add("hidden");
        }
    }, true);

    // Event delegation untuk click pada button delete preview
    document.addEventListener("click", function(event) {
        if (event.target.closest("#buttonDeletePreview")) {
            fotoInput.value = ""; // Reset input file
            if (containerPreviewDB) {
                hasDelete.value = "true";
                previewDB.src = ""; // Hapus gambar dari src
                containerPreviewDB.classList.add("hidden"); // Sembunyikan container preview
            }
            preview.src = ""; // Hapus gambar dari src
            containerPreview.classList.add("hidden");
            labelFoto.classList.remove("hidden"); // Tampilkan kembali label upload
        }
    })
</script>
@endsection