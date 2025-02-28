@props(["partners"])
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
                href="/admin/partner/add"
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
                <th class="p-5 font-normal text-start">Content</th>
                <th class="p-5 font-normal text-start">Rating</th>
                <th class="p-5 font-normal text-start">Action</th>
            </tr>
        </thead>
        <tbody>
            @if(is_object($partners))
                @foreach($partners as $partner)
                    <tr>
                        <td class="p-5">
                            @if(!empty($partner->foto))
                            <img src="{{asset('/storage/image/'. $partner->foto)}}" alt="{{$partner->foto}}" class="max-w-[160px] max-h-[178px]">
                            @endif
                        </td>
                        <td class="p-5"> <p>{{ $partner->name }}</p></td>
                        <td class="p-5"><p>{{ $partner->testimony }}</p> </td>
                        <td class="p-5">
                            <div class="flex gap-2">
                                @for( $i=0; $i<5; $i++)
                                    @if($i < $partner->rating)
                                        <span class="text-gold">
                                            <x-icons.starIcon/>
                                        </span>
                                    @else
                                        <span class="text-primerText">
                                            <x-icons.starIcon/>
                                        </span>
                                    @endif
                                @endfor
                            </div>
                        </td>
                        <td>
                            <div class="flex gap-5 justify-center items-center">
                                <a href="{{'/admin/partner/edit/'.$partner->id}}">
                                    <x-icons.editIcon/>
                                </a>
                                <button
                                    class="openModalPartner text-cherryRed"
                                    data-id="{{$partner->id}}"
                                    data-name="{{$partner->name}}"
                                >
                                    <x-icons.trashIcon/>
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
    <x-modal.modalDeletePartner />
</div>
<script>
    const modalDeletePartnerText = document.getElementById("modalDeletePartnerText");
    const btnOpenModalPartner = document.getElementById('openModalPartner');
    document.addEventListener("DOMContentLoaded", function(){
        const deletePartnerForm = document.getElementById('deletePartnerForm');
        document.querySelectorAll('.openModalPartner').forEach(button => {
            button.addEventListener("click", function(){
                const PartnerName = this.getAttribute("data-name");
                const PartnerId = this.getAttribute("data-id");
                modalPartner.classList.remove('hidden');
                modalPartner.classList.add('flex');
                modalDeletePartnerText.innerHTML = `Are you sure want to delete Partner <span class="font-bold">"${PartnerName}"</span> ?`
                deletePartnerForm.action = `/api/delete/partner/${PartnerId}`
            })
        })
    })
</script>