<!-- @props(["events"]) -->
<div class="w-full bg-subtleGray px-[10%] py-10 flex flex-col gap-y-5">
    <div class="w-full flex justify-between">
        <select id="limitSelectEvent" class="border-2 border-jungleGreen rounded-xl p-[10px] text-jungleGreen">
            <option value="5">5</option>
            <option value="10">10</option>
            <option value="15">15</option>
            <option value="20">20</option>
        </select>
        <div class="flex gap-[10px]">
            <div class="border-2 border-jungleGreen rounded-xl p-[10px] w-[209px] flex items-center gap-[10px] text-jungleGreen">
                <button id="searchButtonEvent">
                    <x-icons.searchIcon />
                </button>
                <input type="text" id="searchInputEvent" placeholder="Search by title" class="w-full h-full placeholder:text-jungleGreen placeholder:text-center focus:outline-none">
            </div>
            <a href="/admin/event/add" class="bg-jungleGreen hover:bg-mintGreen rounded-xl p-[10px] text-white w-[209px] flex items-center gap-[10px]">
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
        <tbody id="eventTableBody">
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
                            data-title="{{$event->title}}">
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
    {{-- **Tampilkan Pagination** --}}
    <div class="mt-5 flex justify-center" id="paginationEventContainer">
        {{ $events->appends(['search' => request('search'), 'limit' => request('limit')])->links('vendor.pagination.tailwind') }}
    </div>
    <x-modal.modalDeleteEvent />
</div>
<script>
    const modalDeleteEventText = document.getElementById("modalDeleteEventText");
    const btnOpenModalEvent = document.getElementById('openModalEvent');
    const deleteEventForm = document.getElementById('deleteEventForm');
    document.addEventListener("click", function(event){
        if(event.target.closest('.openModalEvent')){
            const button = event.target.closest(".openModalEvent");
            const EventName = button.getAttribute("data-title");
            const EventId = button.getAttribute("data-id");
            modalEvent.classList.remove('hidden');
            modalEvent.classList.add('flex');
            modalDeleteEventText.innerHTML = `Are you sure want to delete Event <span class="font-bold">"${EventName}"</span> ?`
            deleteEventForm.action = `/api/delete/event/${EventId}`
        }
    })
    document.addEventListener("DOMContentLoaded", function() {
        const searchInputEvent = document.getElementById("searchInputEvent");
        const searchButtonEvent = document.getElementById("searchButtonEvent");
        const limitSelectEvent = document.getElementById("limitSelectEvent");
        const eventTableBody = document.getElementById("eventTableBody");
        const paginationEventContainer = document.getElementById("paginationEventContainer");

        let debounceTimerEvent;

        function fetchEvents() {
            clearTimeout(debounceTimerEvent);
            debounceTimerEvent = setTimeout(() => {
                const searchQuery = searchInputEvent.value;
                const limit = limitSelectEvent.value;

                fetch(`/api/events?search=${searchQuery}&limit=${limit}`)
                    .then(response => response.json())
                    .then(data => {
                        updateTableEvent(data.events);
                        updatePaginationEvent(data.pagination);
                    })
                    .catch(error => console.error("Error fetching events:", error));
            }, 500); // Debounce untuk mengurangi request berulang
        }

        function updateTableEvent(events) {
            eventTableBody.innerHTML = events.map(event => `
            <tr>
                <td class="p-5">
                    ${event.foto ? `<img src="/storage/image/${event.foto}" alt="${event.foto}" class="max-w-[160px] max-h-[178px]">`:''}
                </td>
                <td class="p-5">
                    <p>${event.title}</p>
                </td>
                <td class="p-5">
                    <p>${new Date(event.event_date).toLocaleDateString('id-ID', { day: 'numeric', month: 'long', year: 'numeric' })}</p>
                </td>
                <td class="p-5">
                    ${new Date(even.event_date) > now() ? 
                    '<div class="rounded-xl p-[10px] bg-softBlue w-fit text-white">Active</div>':
                    '<div class="rounded-xl p-[10px] bg-cherryRed w-fit text-white">Past</div>'
                    }
                </td>
                <td>
                    <div class="flex gap-5 justify-center items-center">
                        <a href="/admin/event/edit/${event.id}">
                            <x-icons.editIcon />
                        </a>
                        <button
                            class="openModalEvent text-cherryRed"
                            data-id="${event.id}"
                            data-title="${event.title}">
                            <x-icons.trashIcon />
                        </button>
                    </div>
                </td>
            </tr>
        `).join("");
        }

        function updatePaginationEvent(pagination) {
            paginationEventContainer.innerHTML = pagination;
        }

        searchButtonEvent.addEventListener("click", fetchEvents);
        searchInputEvent.addEventListener("input", fetchEvents);
        limitSelectEvent.addEventListener("change", fetchEvents);
    })
</script>
<!-- @if($eventDate->isPast())
<div class="rounded-xl p-[10px] bg-cherryRed w-fit text-white">Past</div>
@else
<div class="rounded-xl p-[10px] bg-softBlue w-fit text-white">Active</div>
@endif -->
<!-- <tr>
    <td class="p-5">
        ${article.foto ? `<img src="/storage/image/${article.foto}" alt="${article.foto}" class="max-w-[160px] max-h-[178px]">` : ""}
    </td>
    <td class="p-5">
        <p>${article.title}</p>
    </td>
    <td class="p-5">
        <p>${new Date(article.created_at).toLocaleDateString('id-ID', { day: 'numeric', month: 'long', year: 'numeric' })}</p>
    </td>
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
</tr> -->