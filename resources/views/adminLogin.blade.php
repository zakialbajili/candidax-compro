@extends('layout.main')

@section('title', 'Login | Candidax')
@section('content')
<main class="w-full h-screen flex items-center justify-center font-poppins text-primerText ">
    <form action="{{route('admin.loginUser')}}" method="POST" class=" w-[80%] lg:w-1/4 h-fit bg-subtleGray rounded-xl flex flex-col gap-10 p-5">
        @csrf
        <div class="flex flex-col gap-5">
            <h1 class="font-bold text-2xl">Login</h1>
            <div class="w-full flex flex-col gap-[10px]">
                <label for="email"><span class="text-cherryRed">*</span> Email</label>
                <input
                    name="email"
                    type="email"
                    placeholder="Please input your name"
                    class="py-[10px] px-3 rounded-xl border-2 border-primerText" 
                />
                @error('email')
                <p class="text-xs text-cherryRed">{{$message}}</p>
                @enderror
            </div>
            <div class="w-full flex flex-col gap-[10px]">
                <label for="password"><span class="text-cherryRed">*</span> Password</label>
                <div class="py-[10px] px-3 flex gap-[10px] rounded-xl border-2 border-primerText">
                    <input
                        name="password"
                        id="password"
                        type="password"
                        placeholder="Please input your name"
                        class="h-full w-full focus:outline-none" />
                    <button type="button" id="hidePassword" class="hidden">
                        <x-icons.closeEyeIcon/>
                    </button>
                    <button type="button" id="showPassword">
                        <x-icons.eyeIcon/>
                    </button>
                </div>
            </div>
        </div>
        <button type="submit" class="w-full bg-jungleGreen text-white p-[10px] text-lg rounded-xl">
            Submit
        </button>
    </form>
</main>
<script>
    const showPassword = document.getElementById('showPassword');
    const hidePassword = document.getElementById('hidePassword');
    const inputPassword = document.getElementById('password');
    showPassword.addEventListener('click', function(){
        hidePassword.classList.remove("hidden");
        showPassword.classList.add("hidden");
        inputPassword.type = "text";
    });
    hidePassword.addEventListener('click', function(){
        showPassword.classList.remove("hidden");
        hidePassword.classList.add("hidden");
        inputPassword.type = "password";
    });
</script>
@endsection