@extends('layout.main')

@section('title', 'Edit Partner | Candidax')
@section('content')
<main class="w-full min-h-screen flex items-center justify-center font-poppins text-primerText pt-[200px]">
    <div class="w-full h-fit rounded-xl flex flex-col gap-10 px-[5%]">
        <a
            href="/admin"
            class="flex gap-5 items-center font-semibold">
            <x-icons.arrowLeft />
            <p class="text-2xl">Edit Partner & Client</p>
        </a>
        <form action="{{route('admin.editPartner', $detailPartner['id'])}}" method="post" class="w-full bg-subtleGray flex gap-20 py-10 px-[5%]" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="w-[332px] h-[418px] flex flex-col items-center justify-center border-2 border-dashed border-border">
                <!-- Preview Image -->
                @if(!empty($detailPartner['foto']))
                <div id="containerPreviewDB" class=" w-full h-full relative">
                    <img id="previewDB" src="{{asset('/storage/image/'.$detailPartner['foto'])}}" alt="{{$detailPartner['name']}}" class="w-full h-full object-cover rounded-lg" />
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
                        placeholder="Masukkan nama"
                        class="py-[10px] px-3 rounded-xl border-2 border-primerText"
                        value="{{$detailPartner['name']}}" />
                    @error('name')
                    <p class="text-xs text-cherryRed">{{$message}}</p>
                    @enderror
                </div>
                <div class="w-full flex flex-col gap-[10px]">
                    <label for="position"><span class="text-cherryRed">*</span> Position</label>
                    <input
                        id="position"
                        name="position"
                        type="text"
                        placeholder="Jelaskan posisi"
                        class="py-[10px] px-3 rounded-xl border-2 border-primerText"
                        value="{{$detailPartner['position']}}" />
                    @error('position')
                    <p class="text-xs text-cherryRed">{{$message}}</p>
                    @enderror
                </div>
                <div class="w-full flex flex-col gap-[10px]">
                    <label for="status"><span class="text-cherryRed">*</span> Status</label>
                    <select
                        name="status"
                        id="status"
                        class="py-[10px] px-3 rounded-xl border-2 border-primerText"
                        value
                    >
                        <option value="HIDE" {{ $detailPartner['isShow'] === 'HIDE' ? 'selected' : '' }}>HIDE</option>
                        <option value="SHOW" {{ $detailPartner['isShow'] === 'SHOW' ? 'selected' : '' }}>SHOW</option>
                    </select>
                    @error('status')
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
                        class="py-[10px] px-3 rounded-xl border-2 border-primerText h-[150px]">{{$detailPartner['testimony']}}</textarea>
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
                            <input type="hidden" name="rating" id="rating" value="{{$detailPartner['rating']}}">
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

    document.addEventListener("DOMContentLoaded", function() {
        const ratingButtons = document.querySelectorAll("button[data-rating]");
        const ratingInput = document.getElementById("rating");

        // Ambil nilai rating dari input hidden
        const currentRating = parseInt(ratingInput.value);
        console.log(currentRating)
        // Fungsi untuk mengupdate tampilan bintang
        function updateStars(selectedRating) {
            ratingButtons.forEach(btn => {
                const starValue = parseInt(btn.getAttribute("data-rating"));
                if (starValue <= selectedRating) {
                    btn.classList.add("text-yellow-500"); // Warna bintang aktif
                } else {
                    btn.classList.remove("text-yellow-500"); // Warna bintang default
                }
            });
        }

        // Set warna bintang saat halaman dimuat
        if (currentRating) {
            updateStars(currentRating);
        }

        // Event listener untuk klik pada bintang
        ratingButtons.forEach(button => {
            button.addEventListener("click", function() {
                const selectedRating = this.getAttribute("data-rating");
                ratingInput.value = selectedRating;
                updateStars(selectedRating);
            });
        });
    });
</script>
@endsection