@extends('layout.main')

@section('title', 'Login | Candidax')
@section('content')
<main class="w-full h-screen flex items-center justify-center font-poppins text-primerText">
    <div class="w-full h-fit rounded-xl flex flex-col gap-10 px-[5%]">
        <a
            href="/admin"
            class="flex gap-5 items-center font-semibold">
            <x-icons.arrowLeft />
            <p class="text-2xl">Add Article</p>
        </a>
        <form class="w-full bg-subtleGray flex gap-20 py-10 px-[5%]">
            <div class="w-[332px] h-[418px] flex items-center justify-center border-2 border-dashed border-border">
                <label for="thumbnail" class="flex flex-col items-center justify-center gap-5 hover:cursor-pointer">
                    <x-icons.imageIcon />
                    <p>Upload Image</p>
                </label>
                <input id="thumbnail" name="thumbnail" type="file" accept="image/*" class="hidden">
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
                </div>
                <div class="w-full flex flex-col gap-[10px]">
                    <label for="content"><span class="text-cherryRed">*</span> Content</label>
                    <textarea
                        type="text"
                        name="content"
                        id="content"
                        placeholder="MMasukkan content"
                        class="py-[10px] px-3 rounded-xl border-2 border-primerText h-[150px]"></textarea>
                </div>
                <button class="w-[122px] self-end mt-10 bg-jungleGreen text-white p-[10px] text-lg rounded-xl">
                    Submit
                </button>
            </div>
        </form>
    </div>
</main>
@endsection