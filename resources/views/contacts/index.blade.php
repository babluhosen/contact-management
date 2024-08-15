
<x-layout>
<x-message/>
<div class="container mx-auto py-5">
    <div class="flex items-center justify-between ">
           <div class="">
           <label for="status" class="sr-only">Status</label>
            <select id="filter-dropdown" name="data" class="flex-grow w-full px-3 py-1.5 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-lg focus:outline-none focus:ring-4 focus:ring-gray-100 dark:text-gray-400 dark:border-gray-600 dark:focus:ring-gray-700">
            <option value="all">Select Name</option>
            @foreach ($contacts as $contact)
             <option value="{{ $contact->id }}">{{ $contact->name }}</option>
            @endforeach
          </select>
           </div>
           <div class="">
        <form method="GET" action="">
        <div class="flex items-center space-x-2">
          <input type="text" name="search" value="{{isset($search)? $search : ''}}" id="search" class="flex-grow w-full px-3 py-1.5 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-lg focus:outline-none focus:ring-4 focus:ring-gray-100 dark:text-gray-400 dark:border-gray-600 dark:focus:ring-gray-700" placeholder="Search...">
          <button type="submit" class="px-3 py-1.5 text-sm font-medium text-black bg-gray-100 border border-gray-300 rounded-lg focus:outline-none focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800">Search</button>
          <button type="submit" class="px-3 py-1.5 text-sm font-medium text-black bg-gray-100 border border-gray-300 rounded-lg focus:outline-none focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800">Clear</button>
        </div>
       </form>
        </div>
    </div>
    <table class="table table-bodered w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="p-4">
                    <div class="flex items-center">
                        <input id="checkbox-all-search" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="checkbox-all-search" class="sr-only">checkbox</label>
                    </div>
                </th>
                <th scope="col" class="px-6 py-3">
                  Name
                </th>
                <th scope="col" class="px-6 py-3">
                    Email
                </th>
                <th scope="col" class="px-6 py-3">
                    Phone
                </th>
                <th scope="col" class="px-6 py-3">
                 Address
                </th>
                <th scope="col" class="px-6 py-3">
                    Action
                </th>
            </tr>
        </thead>
        <tbody class="bg-white dark:bg-gray-800">
        @foreach ($contacts as $contact)
        <tr class="bg-gray-100 dark:bg-gray-600">
            <td scope="row" class="p-4">
                <div class="flex items-center">
                    <input id="checkbox-{{ $contact->id }}" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="checkbox-{{ $contact->id }}" class="sr-only">checkbox</label>
                </div>
            </td>
           
            <td class="px-6 py-4 whitespace-nowrap">
                {{ $contact->name }}
            </td>
            <td class="px-6 py-4 whitespace-nowrap">
                {{ $contact->email}}
            </td>
            <td class="px-6 py-4 whitespace-nowrap">
                {{ $contact->phone }}
            </td>
            <td class="px-6 py-4 whitespace-nowrap">
                {{$contact->address}}
            </td>
            <td class="px-6 py-3 flex justify-center whitespace-nowrap">
            <a href="{{ route('contacts.edit', $contact->id)}}" class="text-blue-600 hover:text-blue-800">
               Edit
            </a>
                <form action="{{ route('contacts.destroy', $contact->id)}}" method="POST" onsubmit="return confirm('Are you sure you want to delete this item?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="ml-2 text-red-600 hover:text-red-800">Delete</button>
                </form> &nbsp;&nbsp;
                <a href="{{ route('contacts.show',$contact)}}" class="text-blue-600 hover:text-blue-800">
                    View
                </a>
            </td>
     </tr>
     @endforeach
<div class="flex justify-end ... pt-2 py-1">
<!-- <a  href="{{route('contacts.create')}}" class="bg-gray-800 text-white rounded-full w-10 h-10 flex items-center justify-center" onclick="backToTop()">
    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"></path>
    </svg>
</a>   -->
<a type="button" href="{{route('contacts.create')}}" class="text-white bg-gradient-to-r from-cyan-400 via-cyan-500 to-cyan-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800 shadow-lg shadow-cyan-500/50 dark:shadow-lg dark:shadow-cyan-800/80 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-full text-sm p-2.5 text-center inline-flex items-center me-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
<svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
<path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
</svg>
</a>
</div>
</tbody>
</div>

    </div>
</x-layout>
<script>
        $(document).ready(function() {
        $('#filter-dropdown').change(function() {
            var filterValue = $(this).val();
        });
    });
</script>