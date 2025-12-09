
      <div class="relative mt-3  md:mt-0">
                    <span class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400">
                        🔍
                    </span> 
                    <input livewire:model.debounce.500ms="Search"
                        type="text"
                        class="bg-gray-800 text-sm text-white rounded-full w-64 px-4 pl-10 py-1 focus:outline-none focus:shadow-outline"
                        placeholder="Search...">
                    <div class="absolute  bg-gray-800 rounded w-64 text-sm  mt-4 ">
                        {{-- @if (strlen($Search) > 2) --}}
                            <ul>
                                {{-- @forelse ($searchResults as $result) --}}
                                    <li class="border-b border-gray-700  ">
                                        {{-- <a href="{{ route('movies.show', ['id' => $result['id']]) }}"
                                         class="block hover:bg-gray-700 px-3 py-3"> {{ $result['title'] }}</a> --}}
                                         {{ $Search }}
                                    </li>
                                {{-- @empty --}}
                                    <li class="px-3 py-3">No results for "{{ $Search }}"</li>
                                {{-- @endforelse --}}

                            </ul>
                        {{-- @endif --}}
                    </div>
</div>

