@props(["events"])
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
                <th class="p-5 font-normal text-start">Tanggal</th>
                <th class="p-5 font-normal text-start">Status</th>
                <th class="p-5 font-normal text-start">Action</th>
            </tr>
        </thead>
        <tbody>
            @if(is_object($events))
            @foreach($events as $event)
            <tr>
                <td class="p-5">
                    @if($event->foto)
                    <img src="{{asset('/storage/image/'.$event->foto)}}" alt="{{$event->foto}}" class="max-w-[160px] max-h-[178px]">
                    @endif
                </td>
                <td class="p-5">
                    <p>{{ $event->title }}</p>
                </td>
                <td class="p-5">
                    @php
                    $eventDate = \Carbon\Carbon::parse($event->event_date);
                    $today = now()
                    @endphp
                    <p>{{ date_format($eventDate, "j F Y") }}</p>
                </td>
                <td class="p-5">
                    @if($eventDate->isPast())
                    <div class="rounded-xl p-[10px] bg-cherryRed w-fit text-white">Past</div>
                    @else
                    <div class="rounded-xl p-[10px] bg-softBlue w-fit text-white">Active</div>
                    @endif
                </td>
                <td>
                    <div class="flex gap-5 justify-center items-center">
                        <a href="{{'/admin/event/edit/'. $event->id}}">
                            <x-icons.editIcon />
                        </a>
                        <button
                            class="openModalEvent text-cherryRed"
                            data-id="{{$event->id}}"
                            data-title="{{$event->title}}"
                        >
                            <x-icons.trashIcon />
                        </button>
                    </div>
                </td>
            </tr>
            @endforeach
            @else
            <tr>
                <td colspan="5" class="text-center py-5">No Event available</td>
            </tr>
            @endif
        </tbody>
    </table>
    <x-modal.modalDeleteEvent />
</div>
<script>
    const modalDeleteEventText = document.getElementById("modalDeleteEventText");
    const btnOpenModalEvent = document.getElementById('openModalEvent');
    document.addEventListener("DOMContentLoaded", function(){
        const deleteEventForm = document.getElementById('deleteEventForm');
        document.querySelectorAll('.openModalEvent').forEach(button => {
            button.addEventListener("click", function(){
                const EventName = this.getAttribute("data-title");
                const EventId = this.getAttribute("data-id");
                modalEvent.classList.remove('hidden');
                modalEvent.classList.add('flex');
                modalDeleteEventText.innerHTML = `Are you sure want to delete Event <span class="font-bold">"${EventName}"</span> ?`
                deleteEventForm.action = `/api/delete/event/${EventId}`
            })
        })
    })
</script>