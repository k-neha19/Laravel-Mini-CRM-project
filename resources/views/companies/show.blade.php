<x-app-layout>
    <div class="max-w-4xl mx-auto">
        <div class="mb-6 flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-semibold text-white">{{ $company->name }}</h1>
                <p class="text-sm text-slate-400">Company details and employees.</p>
            </div>
            <a href="{{ route('companies.index') }}" class="text-sm text-slate-300 hover:text-white">
                Back to list
            </a>
        </div>

        <div class="grid md:grid-cols-3 gap-6">
            <div class="md:col-span-1 rounded-xl border border-slate-800 bg-slate-950/70 p-5">
                @if($company->logo)
                    <div class="h-20 w-20 overflow-hidden rounded-lg border border-slate-700 mb-4"
                         style="width:80px;height:80px;">
                        <img src="{{ asset('storage/'.$company->logo) }}"
                             class="h-full w-full object-cover"
                             style="width:80px;height:80px;object-fit:cover;"
                             alt="{{ $company->name }}">
                    </div>
                @endif

                <div class="space-y-2 text-sm">
                    <div>
                        <div class="text-slate-400">Email</div>
                        <div class="text-slate-100">{{ $company->email ?? '—' }}</div>
                    </div>
                    <div>
                        <div class="text-slate-400">Website</div>
                        <div class="text-slate-100">
                            @if($company->website)
                                <a href="{{ $company->website }}" target="_blank"
                                   class="text-indigo-400 hover:text-indigo-300">
                                    {{ $company->website }}
                                </a>
                            @else
                                —
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <div class="md:col-span-2 rounded-xl border border-slate-800 bg-slate-950/70 p-5">
                <h2 class="text-lg font-semibold text-white mb-3">Employees</h2>

                @if($company->employees->isEmpty())
                    <p class="text-sm text-slate-500">No employees added yet.</p>
                @else
                    <ul class="divide-y divide-slate-800 text-sm">
                        @foreach($company->employees as $employee)
                            <li class="py-2 flex justify-between">
                                <span class="text-slate-100">
                                    {{ $employee->first_name }} {{ $employee->last_name }}
                                    <span class="text-slate-400 text-xs">({{ $employee->email ?? 'no email' }})</span>
                                </span>
                                <a href="{{ route('employees.show', $employee) }}"
                                   class="text-indigo-400 hover:text-indigo-300 text-xs">
                                    View
                                </a>
                            </li>
                        @endforeach
                    </ul>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>