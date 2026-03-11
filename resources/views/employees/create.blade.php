<x-app-layout>
    <div class="max-w-3xl mx-auto">
        <div class="mb-6 flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-semibold text-white">New Employee</h1>
                <p class="text-sm text-slate-400">Add a new employee.</p>
            </div>
            <a href="{{ route('employees.index') }}" class="text-sm text-slate-300 hover:text-white">
                Back to list
            </a>
        </div>

        <div class="rounded-xl border border-slate-800 bg-slate-950/70 p-6 backdrop-blur">
            <form action="{{ route('employees.store') }}" method="POST" enctype="multipart/form-data" class="space-y-5">
                @csrf

                <div class="grid md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-slate-300 mb-1">
                            First Name <span class="text-red-400">*</span>
                        </label>
                        <input type="text" name="first_name" value="{{ old('first_name') }}"
                               class="w-full rounded-md border border-slate-700 bg-slate-900 px-3 py-2 text-sm text-slate-100 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                        @error('first_name') <p class="mt-1 text-xs text-red-400">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-slate-300 mb-1">
                            Last Name <span class="text-red-400">*</span>
                        </label>
                        <input type="text" name="last_name" value="{{ old('last_name') }}"
                               class="w-full rounded-md border border-slate-700 bg-slate-900 px-3 py-2 text-sm text-slate-100 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                        @error('last_name') <p class="mt-1 text-xs text-red-400">{{ $message }}</p> @enderror
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-medium text-slate-300 mb-1">
                        Company <span class="text-red-400">*</span>
                    </label>
                    <select name="company_id"
                            class="w-full rounded-md border border-slate-700 bg-slate-900 px-3 py-2 text-sm text-slate-100 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                        <option value="">-- Select Company --</option>
                        @foreach($companies as $company)
                            <option value="{{ $company->id }}" @selected(old('company_id') == $company->id)>
                                {{ $company->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('company_id') <p class="mt-1 text-xs text-red-400">{{ $message }}</p> @enderror
                </div>

                <div class="grid md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-slate-300 mb-1">Email</label>
                        <input type="email" name="email" value="{{ old('email') }}"
                               class="w-full rounded-md border border-slate-700 bg-slate-900 px-3 py-2 text-sm text-slate-100 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                        @error('email') <p class="mt-1 text-xs text-red-400">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-slate-300 mb-1">Phone</label>
                        <input type="text" name="phone" value="{{ old('phone') }}"
                               class="w-full rounded-md border border-slate-700 bg-slate-900 px-3 py-2 text-sm text-slate-100 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                        @error('phone') <p class="mt-1 text-xs text-red-400">{{ $message }}</p> @enderror
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-medium text-slate-300 mb-1">
                        Profile Picture (JPEG/PNG, max 1 MB)
                    </label>
                    <input type="file" name="profile_picture"
                           class="w-full text-sm text-slate-200 file:mr-3 file:rounded-md file:border-0 file:bg-slate-800 file:px-3 file:py-2 file:text-sm file:text-slate-100 hover:file:bg-slate-700">
                    @error('profile_picture') <p class="mt-1 text-xs text-red-400">{{ $message }}</p> @enderror
                </div>

                <div class="flex justify-end space-x-3 pt-2">
                    <a href="{{ route('employees.index') }}"
                       class="px-4 py-2 rounded-md border border-slate-700 text-sm text-slate-200 hover:bg-slate-800">
                        Cancel
                    </a>
                    <button type="submit"
                            class="px-4 py-2 rounded-md bg-indigo-500 hover:bg-indigo-400 text-sm text-white shadow">
                        Save
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>