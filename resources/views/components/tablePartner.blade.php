@props(["partners"]) 
<div class="w-full bg-subtleGray px-[10%] py-10 flex flex-col gap-y-5">
    <div class="w-full flex justify-between">
        <select id="limitSelectPartner" class="border-2 border-jungleGreen rounded-xl p-[10px] text-jungleGreen">
            <option value="5">5</option>
            <option value="10">10</option>
            <option value="15">15</option>
            <option value="20">20</option>
        </select>
        <div class="flex gap-[10px]">
            <div class="border-2 border-jungleGreen rounded-xl p-[10px] w-[209px] flex items-center gap-[10px] text-jungleGreen">
                <button id="searchButtonPartner">
                    <x-icons.searchIcon />
                </button>
                <input type="text" id="searchInputPartner" placeholder="Search by title" class="w-full h-full placeholder:text-jungleGreen placeholder:text-center focus:outline-none">
            </div>
            <a href="/admin/partner/add" class="bg-jungleGreen hover:bg-mintGreen rounded-xl p-[10px] text-white w-[209px] flex items-center gap-[10px]">
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
                <th class="p-5 font-normal text-start">Content</th>
                <th class="p-5 font-normal text-start">Rating</th>
                <th class="p-5 font-normal text-start">Action</th>
            </tr>
        </thead>
        <tbody id="partnerTableBody">
            @if(is_object($partners))
            @foreach($partners as $partner)
            <tr>
                <td class="p-5">
                    @if(!empty($partner->foto))
                    <img src="{{asset('/storage/image/'. $partner->foto)}}" alt="{{$partner->foto}}" class="max-w-[160px] max-h-[178px]">
                    @endif
                </td>
                <td class="p-5">
                    <p>{{ $partner->name }}</p>
                </td>
                <td class="p-5">
                    <p>{{ $partner->testimony }}</p>
                </td>
                <td class="p-5">
                    <div class="flex gap-2">
                        @for( $i=0; $i<5; $i++)
                            @if($i < $partner->rating)
                            <span class="text-gold">
                                <x-icons.starIcon />
                            </span>
                            @else
                            <span class="text-primerText">
                                <x-icons.starIcon />
                            </span>
                            @endif
                            @endfor
                    </div>
                </td>
                <td>
                    <div class="flex gap-5 justify-center items-center">
                        <a href="{{'/admin/partner/edit/'.$partner->id}}">
                            <x-icons.editIcon />
                        </a>
                        <button
                            class="openModalPartner text-cherryRed"
                            data-id="{{$partner->id}}"
                            data-name="{{$partner->name}}">
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
    {{-- **Tampilkan Pagination** --}}
    <div class="mt-5 flex justify-center" id="paginationPartnerContainer">
        {{ $partners->links('vendor.pagination.tailwind') }}
    </div>
    <x-modal.modalDeletePartner />
</div>
<script>
    const modalDeletePartnerText = document.getElementById("modalDeletePartnerText");
    const btnOpenModalPartner = document.getElementById('openModalPartner');
    const deletePartnerForm = document.getElementById('deletePartnerForm');
    document.addEventListener("click", function(event){
        if(event.target.closest('.openModalPartner')){
            const button = event.target.closest('.openModalPartner');
            const PartnerName = button.getAttribute("data-name");
            const PartnerId = button.getAttribute("data-id");
            modalPartner.classList.remove('hidden');
            modalPartner.classList.add('flex');
            modalDeletePartnerText.innerHTML = `Are you sure want to delete Partner <span class="font-bold">"${PartnerName}"</span> ?`
            deletePartnerForm.action = `/api/delete/partner/${PartnerId}`
        }
    })
    document.addEventListener("DOMContentLoaded", function() {
        const searchInputPartner = document.getElementById("searchInputPartner");
        const searchButtonPartner = document.getElementById("searchButtonPartner");
        const limitSelectPartner = document.getElementById("limitSelectPartner");
        const partnerTableBody = document.getElementById("partnerTableBody");
        const paginationPartnerContainer = document.getElementById("paginationPartnerContainer");

        let debounceTimerPartner;

        function fetchPartners() {
            clearTimeout(debounceTimerPartner);
            debounceTimerPartner = setTimeout(() => {
                const searchQuery = searchInputPartner.value;
                const limit = limitSelectPartner.value;

                fetch(`/api/partners?search=${searchQuery}&limit=${limit}`)
                    .then(response => response.json())
                    .then(data => {
                        updateTablePartner(data.partners);
                        updatePaginationPartner(data.pagination);
                    })
                    .catch(error => console.error("Error fetching partners:", error));
            }, 500); // Debounce untuk mengurangi request berulang
        }

        function updateTablePartner(patners) {
            partnerTableBody.innerHTML = patners.map(partner => `
            <tr>
                <td class="p-5">
                    ${partner.foto ? 
                    `<img src="/storage/image/${partner.foto}" alt="${partner.foto}" class="max-w-[160px] max-h-[178px]">`:
                    ''
                    }
                </td>
                <td class="p-5"> <p>${partner.name}</p></td>
                <td class="p-5"><p>${partner.testimony}</p> </td>
                <td class="p-5">
                    <div class="flex gap-2">
                        ${Array(5).fill(0).map((_, i) => `
                        <span class="${i < partner.rating ? 'text-gold' : 'text-primerText'}">
                            <x-icons.starIcon/>
                        </span>
                    `).join("")}
                    </div>
                </td>
                <td>
                    <div class="flex gap-5 justify-center items-center">
                        <a href="/admin/partner/edit/${partner.id}">
                            <x-icons.editIcon/>
                        </a>
                        <button
                            class="openModalPartner text-cherryRed"
                            data-id="${partner.id}"
                            data-name="${partner.name}"
                        >
                            <x-icons.trashIcon/>
                        </button>
                    </div>
                </td>
            </tr>
        `).join("");
        }

        function updatePaginationPartner(pagination) {
            paginationPartnerContainer.innerHTML = pagination;
        }

        searchButtonEvent.addEventListener("click", fetchPartners);
        searchInputPartner.addEventListener("input", fetchPartners);
        limitSelectPartner.addEventListener("change", fetchPartners);
    })
</script>