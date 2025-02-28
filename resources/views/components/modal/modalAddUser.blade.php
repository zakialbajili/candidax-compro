@props(["title", "id"])
<div id="modalUser" class="h-full w-full hidden fixed top-0 left-0 right-0 bottom-0 bg-black/50 items-center justify-center z-30">
    <div class="w-[80%] lg:w-1/4 bg-white flex flex-col gap-5 pt-10 pb-5 px-5 rounded-2xl text-center relative">
        <button id="closeModalUser" class="absolute top-5 right-5 flex-grow rounded-2xl">
            <x-icons.exitNavbar />
        </button>
        <h1 class="font-bold">Add User</h1>
        <form action="{{route('admin.registerUser')}}" id="deleteUserForm" method="POST" class="flex-grow flex flex-col gap-10">
            @csrf
            @method('POST')
            <div class="flex flex-col gap-5 text-start text-primerText">
                <div class="w-full flex flex-col gap-[10px]">
                    <label for="name"><span class="text-cherryRed">*</span> Name</label>
                    <input
                        required
                        id="name"
                        name="name"
                        type="text"
                        placeholder="Masukkan nama"
                        class="py-[10px] px-3 rounded-xl border-2 border-primerText" />
                    @error('name')
                    <p class="text-cherryRed">{{$message}}</p>
                    @enderror
                </div>
                <div class="w-full flex flex-col gap-[10px]">
                    <label for="email"><span class="text-cherryRed">*</span> Email</label>
                    <input
                        required
                        id="email"
                        name="email"
                        type="email"
                        placeholder="Masukkan email"
                        class="py-[10px] px-3 rounded-xl border-2 border-primerText" />
                    @error('email')
                    <p class="text-cherryRed">{{$message}}</p>
                    @enderror
                </div>
                <div class="w-full flex flex-col gap-[10px]">
                    <label for="password"><span class="text-cherryRed">*</span> Password</label>
                    <div class="py-[10px] px-3 flex gap-[10px] rounded-xl border-2 border-primerText">
                        <input
                            required
                            name="password"
                            id="password"
                            type="password"
                            placeholder="Please input your name"
                            class="h-full w-full focus:outline-none" />
                        <button type="button" id="hidePassword" class="hidden">
                            <x-icons.closeEyeIcon />
                        </button>
                        <button type="button" id="showPassword">
                            <x-icons.eyeIcon />
                        </button>
                    </div>
                    @error('password')
                    <p class="text-cherryRed">{{$message}}</p>
                    @enderror
                </div>
                <div class="w-full flex flex-col gap-[10px]">
                    <label for="confirmationPassword"><span class="text-cherryRed">*</span> Confirmation Password</label>
                    <div class="py-[10px] px-3 flex gap-[10px] rounded-xl border-2 border-primerText">
                        <input
                            required
                            name="password_confirmation"
                            id="confirmationPassword"
                            type="confirmationPassword"
                            placeholder="Please input your name"
                            class="h-full w-full focus:outline-none" />
                        <button type="button" id="hideConfirmationPassword" class="hidden">
                            <x-icons.closeEyeIcon />
                        </button>
                        <button type="button" id="showConfirmationPassword">
                            <x-icons.eyeIcon />
                        </button>
                    </div>
                    @error('password')
                    <p class="text-cherryRed">{{$message}}</p>
                    @enderror
                </div>
            </div>
            <button type="submit" id="confirmDeleteUser" class="w-full p-3 rounded-2xl bg-softBlue text-white">
                Register
            </button>
        </form>
    </div>
</div>
<script>
    const modalUser = document.getElementById('modalUser');
    const btnCloseModalUser = document.getElementById('closeModalUser');
    btnCloseModalUser.addEventListener("click", function() {
        modalUser.classList.add("hidden");
    })
    const showPassword = document.getElementById('showPassword');
    const hidePassword = document.getElementById('hidePassword');
    const inputPassword = document.getElementById('password');
    showPassword.addEventListener('click', function() {
        hidePassword.classList.remove("hidden");
        showPassword.classList.add("hidden");
        inputPassword.type = "text";
    });
    hidePassword.addEventListener('click', function() {
        showPassword.classList.remove("hidden");
        hidePassword.classList.add("hidden");
        inputPassword.type = "password";
    });
    const showConfirmationPassword = document.getElementById('showConfirmationPassword');
    const hideConfirmationPassword = document.getElementById('hideConfirmationPassword');
    const inputConfirmationPassword = document.getElementById('confirmationPassword');
    showConfirmationPassword.addEventListener('click', function() {
        hideConfirmationPassword.classList.remove("hidden");
        showConfirmationPassword.classList.add("hidden");
        inputConfirmationPassword.type = "text";
    });
    hideConfirmationPassword.addEventListener('click', function() {
        showConfirmationPassword.classList.remove("hidden");
        hideConfirmationPassword.classList.add("hidden");
        inputConfirmationPassword.type = "password";
    });
</script>