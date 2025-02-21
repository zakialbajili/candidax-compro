@extends('layout.main')

@section('title', 'Login | Candidax')
@section('content')
<main class="w-full h-screen flex items-center justify-center font-poppins text-primerText">
    <div class="w-1/4 h-fit bg-subtleGray rounded-xl flex flex-col gap-10 p-5">
        <div class="flex flex-col gap-5">
            <h1 class="font-bold text-2xl">Login</h1>
            <div class="w-full flex flex-col gap-[10px]">
                <label for="name"><span class="text-cherryRed">*</span> Email</label>
                <input
                    type="email"
                    placeholder="Please input your name"
                    class="py-[10px] px-3 rounded-xl border-2 border-primerText" />
            </div>
            <div class="w-full flex flex-col gap-[10px]">
                <label for="name"><span class="text-cherryRed">*</span> Password</label>
                <div class="py-[10px] px-3 flex gap-[10px] rounded-xl border-2 border-primerText">
                    <input
                        type="password"
                        placeholder="Please input your name"
                        class="h-full w-full focus:outline-none" />
                    <button>
                        <x-icons.closeEyeIcon/>
                    </button>
                </div>
            </div>
        </div>
        <button class="w-full bg-jungleGreen text-white p-[10px] text-lg rounded-xl">
            Submit
        </button>
    </div>
</main>
@endsection