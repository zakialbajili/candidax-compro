@extends('layout.main')

@section('title', 'Admin | Candidax')
@section('content')
<main class="min-h-screen pt-[200px] font-poppins text-primerText">
    <div class="flex flex-col gap-20">
        <button id="btnAddUser" class="self-end w-fit mr-[10%] bg-softBlue p-4 rounded-2xl text-white flex gap-5">
            <x-icons.addUser/>
            <p>Add User</p>
        </button>
        <article>
            <h1 class="font-semibold text-2xl px-[10%] mb-5">Article List</h1>
            <x-tableArticle :articles="$articles"/>
        </article>
        <article>
            <h1 class="font-semibold text-2xl px-[10%] mb-5">Event List</h1>
            <x-tableEvent :events="$events"/>
        </article>
        <article>
            <h1 class="font-semibold text-2xl px-[10%] mb-5">Partner & Client List</h1>
            <x-tablePartner :partners="$partners"/>
        </article>
    </div>
    <x-modal.modalAddUser/>
</main>
<script>
    const btnAddUser = document.getElementById('btnAddUser');
    btnAddUser.addEventListener('click', function(){
        modalUser.classList.remove('hidden')
        modalUser.classList.add('flex')
    })
</script>
@endsection