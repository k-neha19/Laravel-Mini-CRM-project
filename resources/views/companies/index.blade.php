<x-app-layout>
    <div class="flex items-center justify-between mb-6">
        <div>
            <h1 class="text-2xl font-semibold text-white">Companies</h1>
            <p class="text-sm text-slate-400">Manage all client companies.</p>
        </div>
        <a href="{{ route('companies.create') }}"
           class="px-4 py-2 rounded-md bg-indigo-500 hover:bg-indigo-400 text-white text-sm shadow">
            + New Company
        </a>
    </div>

    <div class="overflow-hidden rounded-xl border border-slate-800 bg-slate-950/70 backdrop-blur">
        <table class="min-w-full divide-y divide-slate-800 text-sm">
            <thead class="bg-slate-900/80">
                <tr>
                    <th class="px-4 py-3 text-left text-xs font-medium text-slate-400 uppercase">Logo</th>
                    <th class="px-4 py-3 text-left text-xs font-medium text-slate-400 uppercase">Name</th>
                    <th class="px-4 py-3 text-left text-xs font-medium text-slate-400 uppercase">Email</th>
                    <th class="px-4 py-3 text-left text-xs font-medium text-slate-400 uppercase">Website</th>
                    <th class="px-4 py-3 text-right text-xs font-medium text-slate-400 uppercase">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-800">
                @forelse($companies as $company)
                    <tr class="hover:bg-slate-900/60 transition">
                        <td class="px-4 py-3">
                            @if($company->logo)
                                <div class="h-10 w-10 overflow-hidden rounded-md border border-slate-700"
                                     style="width:40px;height:40px;">
                                    <img src="{{ asset('storage/'.$company->logo) }}"
                                         class="h-full w-full object-cover"
                                         style="width:40px;height:40px;object-fit:cover;"
                                         alt="{{ $company->name }}">
                                </div>
                            @else
                                <div class="h-10 w-10 flex items-center justify-center rounded-md bg-slate-800 text-xs text-slate-500">
                                    N/A
                                </div>
                            @endif
                        </td>
                        <td class="px-4 py-3 text-slate-100">{{ $company->name }}</td>
                        <td class="px-4 py-3 text-slate-300">{{ $company->email }}</td>
                        <td class="px-4 py-3">
                            @if($company->website)
                                <a href="{{ $company->website }}" target="_blank"
                                   class="text-indigo-400 hover:text-indigo-300 underline underline-offset-2">
                                    {{ $company->website }}
                                </a>
                            @else
                                <span class="text-slate-500">—</span>
                            @endif
                        </td>
                        <td class="px-4 py-3 text-right text-xs">
                            <a href="{{ route('companies.show', $company) }}" class="text-slate-300 hover:text-white mr-2">View</a>
                            <a href="{{ route('companies.edit', $company) }}" class="text-amber-300 hover:text-amber-200 mr-2">Edit</a>
                            <form action="{{ route('companies.destroy', $company) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        onclick="return confirm('Delete this company?')"
                                        class="text-red-400 hover:text-red-300">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-4 py-6 text-center text-slate-500">
                            No companies found.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $companies->links() }}
    </div>
</x-app-layout>