<x-app-layout>
    <div class="max-w-3xl mx-auto">
        <div class="mb-6 flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-semibold text-white">
                    {{ $employee->first_name }} {{ $employee->last_name }}
                </h1>
                <p class="text-sm text-slate-400">Employee details.</p>
            </div>
            <a href="{{ route('employees.index') }}" class="text-sm text-slate-300 hover:text-white">
                Back to list
            </a>
        </div>

        <div class="rounded-xl border border-slate-800 bg-slate-950/70 p-6 backdrop-blur flex gap-6">
            <div>
                @if($employee->profile_picture)
                    <div class="h-20 w-20 overflow-hidden rounded-full border border-slate-700"
                         style="width:80px;height:80px;">
                        <img src="{{ asset('storage/'.$employee->profile_picture) }}"
                             class="h-full w-full object-cover"
                             style="width:80px;height:80px;object-fit:cover;"
                             alt="{{ $employee->first_name }}">
                    </div>
                @else
                    <div class="h-20 w-20 flex items-center justify-center rounded-full bg-slate-800 text-lg text-slate-300">
                        {{ strtoupper(substr($employee->first_name,0,1).substr($employee->last_name,0,1)) }}
                    </div>
                @endif
            </div>

            <div class="space-y-2 text-sm">
                <div>
                    <div class="text-slate-400">Company</div>
                    <div class="text-slate-100">{{ $employee->company->name ?? '—' }}</div>
                </div>
                <div>
                    <div class="text-slate-400">Email</div>
                    <div class="text-slate-100">{{ $employee->email ?? '—' }}</div>
                </div>
                <div>
                    <div class="text-slate-400">Phone</div>
                    <div class="text-slate-100">{{ $employee->phone ?? '—' }}</div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>