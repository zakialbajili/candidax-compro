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
                href="/admin/event/add"
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
                <th class="p-5 font-normal text-start">Tanggal</th>
                <th class="p-5 font-normal text-start">Status</th>
                <th class="p-5 font-normal text-start">Action</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="p-5">
                    <img src="{{asset('/assets/images/web/serviceImage.png')}}" alt="thumbnail article" class="w-[160px] h-[178px]">
                </td>
                <td class="p-5">
                    <p>Lorem ipsum dolor sit</p>
                </td>
                <td class="p-5">
                    <p>Lorem ipsum dolor sit</p>
                </td>
                <td class="p-5">
                    <p>21 Februari 2025</p>
                </td>
                <td class="p-5">
                    <div class="rounded-xl p-[10px] bg-softBlue w-fit text-white">Active</div>
                </td>
                <td>
                    <div class="flex gap-5 justify-center items-center">
                        <a href="/admin/event/edit">
                            <x-icons.editIcon />
                        </a>
                        <button class="text-cherryRed">
                            <x-icons.trashIcon />
                        </button>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
</div>