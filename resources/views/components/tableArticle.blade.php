<!-- @props(["articles"]) -->
<div class="w-full bg-subtleGray px-[10%] py-10 flex flex-col gap-y-5">
    <div class="w-full flex justify-between items-center">
        <select id="limitSelect" class="border-2 border-jungleGreen rounded-xl p-[10px] text-jungleGreen">
            <option value="5">5</option>
            <option value="10">10</option>
            <option value="15">15</option>
            <option value="20">20</option>
        </select>
        <div class="flex gap-[10px]">
            <div class="border-2 border-jungleGreen rounded-xl p-[10px] w-[209px] flex items-center gap-[10px] text-jungleGreen">
                <button id="searchButton">
                    <x-icons.searchIcon />
                </button>
                <input type="text" id="searchInput" placeholder="Search by title" class="w-full h-full placeholder:text-jungleGreen placeholder:text-center focus:outline-none">
            </div>
            <a href="/admin/article/add" class="bg-jungleGreen hover:bg-mintGreen rounded-xl p-[10px] text-white w-[209px] flex items-center gap-[10px]">
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
        <tbody id="articleTableBody">
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
                        <button class="openModalArticle text-cherryRed" data-title="{{ $article->title }}" data-id="{{ $article->id }}">
                            <x-icons.trashIcon />
                        </button>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{-- **Tampilkan Pagination** --}}
    <div class="mt-5 flex justify-center" id="paginationContainer">
        {{ $articles->appends(['search' => request('search'), 'limit' => request('limit')])->links('vendor.pagination.tailwind') }}
    </div>

    <x-modal.modalDeleteArticle />
</div>
<script>
    const modal = document.getElementById("modalArticle");
    const modalText = document.getElementById("modalDeleteArticleText");
    const btnOpenModalArticle = document.getElementById('openModalArticle');
    const deleteForm = document.getElementById('deleteArticleForm');
    document.addEventListener("click", function(event) {
        if (event.target.closest(".openModalArticle")) {
            const button = event.target.closest(".openModalArticle");
            const articleTitle = button.getAttribute("data-title");
            const articleId = button.getAttribute("data-id");

            modalArticle.classList.remove('hidden');
            modalArticle.classList.add('flex');
            modalText.innerHTML = `Are you sure want to delete article <span class="font-bold">"${articleTitle}"</span> ?`
            deleteForm.action = `/api/delete/article/${articleId}`;
        }
    });
    document.addEventListener("DOMContentLoaded", function() {
        const searchInput = document.getElementById("searchInput");
        const searchButton = document.getElementById("searchButton");
        const limitSelect = document.getElementById("limitSelect");
        const articleTableBody = document.getElementById("articleTableBody");
        const paginationContainer = document.getElementById("paginationContainer");

        let debounceTimer;

        function fetchArticles() {
            clearTimeout(debounceTimer);
            debounceTimer = setTimeout(() => {
                const searchQuery = searchInput.value;
                const limit = limitSelect.value;

                fetch(`/api/articles?search=${searchQuery}&limit=${limit}`)
                    .then(response => response.json())
                    .then(data => {
                        updateTable(data.articles);
                        updatePagination(data.pagination);
                    })
                    .catch(error => console.error("Error fetching articles:", error));
            }, 500); // Debounce untuk mengurangi request berulang
        }

        function updateTable(articles) {
            articleTableBody.innerHTML = articles.map(article => `
            <tr>
                <td class="p-5">
                    ${article.foto ? `<img src="/storage/image/${article.foto}" alt="${article.foto}" class="max-w-[160px] max-h-[178px]">` : ""}
                </td>
                <td class="p-5"><p>${article.title}</p></td>
                <td class="p-5"><p>${new Date(article.created_at).toLocaleDateString('id-ID', { day: 'numeric', month: 'long', year: 'numeric' })}</p></td>
                <td>
                    <div class="flex gap-5 justify-center items-center">
                        <a href="/admin/article/edit/${article.id}">
                            <x-icons.editIcon />
                        </a>
                        <button class="openModalArticle text-cherryRed" data-title="${article.title}" data-id="${article.id}">
                            <x-icons.trashIcon />
                        </button>
                    </div>
                </td>
            </tr>
        `).join("");
        }

        function updatePagination(pagination) {
            paginationContainer.innerHTML = pagination;
        }

        searchButton.addEventListener("click", fetchArticles);
        searchInput.addEventListener("input", fetchArticles);
        limitSelect.addEventListener("change", fetchArticles);
    })
</script>