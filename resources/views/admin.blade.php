@extends('layout.main')

@section('title', 'Admin | Candidax')
@section('content')
<main class="min-h-screen pt-[150px] font-poppins text-primerText">
    <div class="flex flex-col gap-20">
        <article>
            <div class="flex flex-col gap-5">
                <button id="btnAddUser"
                    class="self-end w-fit mr-[10%] p-4 rounded-2xl bg-cherryRed text-white flex gap-5"
                >
                    <x-icons.addUser />
                    <p>Add User</p>
                </button>
                <h1 class="font-semibold text-2xl px-[10%] mb-5">Article List</h1>
            </div>
            <x-tableArticle />
        </article>
        <article>
            <h1 class="font-semibold text-2xl px-[10%] mb-5">Event List</h1>
            <x-tableEvent/>
        </article>
        <article>
            <h1 class="font-semibold text-2xl px-[10%] mb-5">Partner & Client List</h1>
            <x-tablePartner/>
        </article>
    </div>
    <x-modal.modalAddUser />
</main>
<script>
    const btnAddUser = document.getElementById('btnAddUser');
    btnAddUser.addEventListener('click', function() {
        modalUser.classList.remove('hidden')
        modalUser.classList.add('flex')
    })
</script>
@endsection