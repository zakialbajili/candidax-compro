@props(["articles"])
<div class="w-full bg-subtleGray px-[10%] py-10 flex flex-col gap-y-5">
    <div class="w-full flex justify-between">
        <p>TES</p>
        <div class="flex gap-[10px]">
            <div class="border-2 border-jungleGreen rounded-xl p-[10px] w-[209px] flex items-center gap-[10px] text-jungleGreen">
                <button>
                    <x-icons.searchIcon />
                </button>
                <input type="text" placeholder="Search" class="w-full h-full placeholder:text-jungleGreen placeholder:text-center focus:outline-none">
            </div>
            <a
                href="/admin/article/add"
                class="bg-jungleGreen hover:bg-mintGreen rounded-xl p-[10px] text-white w-[209px] flex items-center gap-[10px]">
                <x-icons.plusIcon />
                <p class="flex-grow text-center">Add</p>
            </a>
        </div>
    </div>
    <table>
        <thead class="bg-white">
            <tr>
                <th class="p-5 font-normal text-start">Banner</th>
                <th class="p-5 font-normal text-start">Title</th>
                <th class="p-5 font-normal text-start">Date</th>
                <th class="p-5 font-normal text-start">Action</th>
            </tr>
        </thead>
        <tbody>
            @if(is_object($articles))
            @foreach($articles as $article )
            <tr>
                <td class="p-5">
                    @if($article->foto)
                    <img src="{{asset('/storage/image/'.$article->foto)}}" alt="{{$article->foto}}" class="max-w-[160px] max-h-[178px]">
                    @endif
                </td>
                <td class="p-5">
                    <p>{{$article->title}}</p>
                </td>
                <td class="p-5">
                    @php
                    $releaseDate = \Carbon\Carbon::parse($article->created_at);
                    @endphp
                    <p>{{ date_format($releaseDate, "j F Y") }}</p>
                </td>
                <td>
                    <div class="flex gap-5 justify-center items-center">
                        <a href="{{'/admin/article/edit/'.$article->id}}">
                            <x-icons.editIcon />
                        </a>
                        <button
                            class="openModalArticle text-cherryRed"
                            data-title="{{ $article->title }}"
                            data-id="{{ $article->id }}">
                            <x-icons.trashIcon />
                        </button>
                    </div>
                </td>
            </tr>
            @endforeach
            @else
            <tr>
                <td colspan="5" class="text-center py-5">No articles available</td>
            </tr>
            @endif
        </tbody>
    </table>
    <x-modal.modalDeleteArticle />
</div>
<script>
    const modal = document.getElementById("modalArticle");
    const modalText = document.getElementById("modalDeleteArticleText");
    const btnOpenModalArticle = document.getElementById('openModalArticle');
    document.addEventListener("DOMContentLoaded", function() {
        const deleteForm = document.getElementById('deleteArticleForm');
        document.querySelectorAll('.openModalArticle').forEach(button => {
            button.addEventListener("click", function() {
                const articleTitle = this.getAttribute("data-title");
                const articleId = this.getAttribute("data-id");
                modalArticle.classList.remove('hidden');
                modalArticle.classList.add('flex');
                modalText.innerHTML = `Are you sure want to delete article <span class="font-bold">"${articleTitle}"</span> ?`
                deleteForm.action = `/api/delete/article/${articleId}`
            })
        })
    })
</script>