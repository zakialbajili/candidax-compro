@props(["title", "id"])
<div id="modalArticle" class="h-full w-full hidden fixed top-0 left-0 right-0 bottom-0 bg-black/50 items-center justify-center z-30">
    <div class="w-1/4 bg-white flex flex-col gap-5 p-5 rounded-2xl text-center">
        <h1 class="font-bold">Delete Article</h1>
        <p id="modalDeleteArticleText"></p>
        <div class="w-full flex gap-2 text-white">
            <button id="closeModalArticle" class="flex-grow p-2 rounded-2xl bg-softBlue">
                Cancel
            </button>
            <form id="deleteArticleForm" method="POST" class="flex-grow">
                @csrf
                @method('DELETE')
                <button type="submit" id="confirmDeleteArticle" class="w-full p-2 rounded-2xl bg-cherryRed">
                    Delete
                </button>
            </form>
        </div>
    </div>
</div>
<script>
    const modalArticle = document.getElementById('modalArticle');
    const btnCloseModalArticle = document.getElementById('closeModalArticle');
    btnCloseModalArticle.addEventListener("click", function(){
        modalArticle.classList.add("hidden");
    })
</script>