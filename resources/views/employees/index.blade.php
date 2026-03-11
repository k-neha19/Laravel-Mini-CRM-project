<x-app-layout>
    <div class="flex items-center justify-between mb-6">
        <div>
            <h1 class="text-2xl font-semibold text-white">Employees</h1>
            <p class="text-sm text-slate-400">Manage employees across all companies.</p>
        </div>
        <a href="{{ route('employees.create') }}"
           class="px-4 py-2 rounded-md bg-indigo-500 hover:bg-indigo-400 text-white text-sm shadow">
            + New Employee
        </a>
    </div>

    <div class="overflow-hidden rounded-xl border border-slate-800 bg-slate-950/70 backdrop-blur">
        <table class="min-w-full divide-y divide-slate-800 text-sm">
            <thead class="bg-slate-900/80">
                <tr>
                    <th class="px-4 py-3 text-left text-xs font-medium text-slate-400 uppercase">Avatar</th>
                    <th class="px-4 py-3 text-left text-xs font-medium text-slate-400 uppercase">Name</th>
                    <th class="px-4 py-3 text-left text-xs font-medium text-slate-400 uppercase">Company</th>
                    <th class="px-4 py-3 text-left text-xs font-medium text-slate-400 uppercase">Email</th>
                    <th class="px-4 py-3 text-left text-xs font-medium text-slate-400 uppercase">Phone</th>
                    <th class="px-4 py-3 text-right text-xs font-medium text-slate-400 uppercase">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-800">
                @forelse($employees as $employee)
                    <tr class="hover:bg-slate-900/60 transition">
                        <td class="px-4 py-3">
                            @if($employee->profile_picture)
                                <div class="h-10 w-10 overflow-hidden rounded-full border border-slate-700"
                                     style="width:40px;height:40px;">
                                    <img src="{{ asset('storage/'.$employee->profile_picture) }}"
                                         class="h-full w-full object-cover"
                                         style="width:40px;height:40px;object-fit:cover;"
                                         alt="{{ $employee->first_name }}">
                                </div>
                            @else
                                <div class="h-10 w-10 flex items-center justify-center rounded-full bg-slate-800 text-xs text-slate-500">
                                    {{ strtoupper(substr($employee->first_name,0,1).substr($employee->last_name,0,1)) }}
                                </div>
                            @endif
                        </td>
                        <td class="px-4 py-3 text-slate-100">
                            {{ $employee->first_name }} {{ $employee->last_name }}
                        </td>
                        <td class="px-4 py-3 text-slate-300">
                            {{ $employee->company->name ?? '—' }}
                        </td>
                        <td class="px-4 py-3 text-slate-300">{{ $employee->email ?? '—' }}</td>
                        <td class="px-4 py-3 text-slate-300">{{ $employee->phone ?? '—' }}</td>
                        <td class="px-4 py-3 text-right text-xs">
                            <a href="{{ route('employees.show', $employee) }}" class="text-slate-300 hover:text-white mr-2">View</a>
                            <a href="{{ route('employees.edit', $employee) }}" class="text-amber-300 hover:text-amber-200 mr-2">Edit</a>
                            <form action="{{ route('employees.destroy', $employee) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        onclick="return confirm('Delete this employee?')"
                                        class="text-red-400 hover:text-red-300">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="px-4 py-6 text-center text-slate-500">
                            No employees found.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $employees->links() }}
    </div>
</x-app-layout>