<x-app-layout>
    <div class="max-w-3xl mx-auto">
        <div class="mb-6 flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-semibold text-white">Edit Company</h1>
                <p class="text-sm text-slate-400">Update company details.</p>
            </div>
            <a href="{{ route('companies.index') }}" class="text-sm text-slate-300 hover:text-white">
                Back to list
            </a>
        </div>

        <div class="rounded-xl border border-slate-800 bg-slate-950/70 p-6 backdrop-blur">
            <form action="{{ route('companies.update', $company) }}" method="POST" enctype="multipart/form-data" class="space-y-5">
                @csrf
                @method('PUT')

                <div>
                    <label class="block text-sm font-medium text-slate-300 mb-1">
                        Name <span class="text-red-400">*</span>
                    </label>
                    <input type="text" name="name" value="{{ old('name', $company->name) }}"
                           class="w-full rounded-md border border-slate-700 bg-slate-900 px-3 py-2 text-sm text-slate-100 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    @error('name') <p class="mt-1 text-xs text-red-400">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-slate-300 mb-1">Email</label>
                    <input type="email" name="email" value="{{ old('email', $company->email) }}"
                           class="w-full rounded-md border border-slate-700 bg-slate-900 px-3 py-2 text-sm text-slate-100 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    @error('email') <p class="mt-1 text-xs text-red-400">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-slate-300 mb-1">Website</label>
                    <input type="text" name="website" value="{{ old('website', $company->website) }}"
                           class="w-full rounded-md border border-slate-700 bg-slate-900 px-3 py-2 text-sm text-slate-100 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    @error('website') <p class="mt-1 text-xs text-red-400">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-slate-300 mb-1">
                        Logo (min 100×100, max 1 MB)
                    </label>
                    <input type="file" name="logo"
                           class="w-full text-sm text-slate-200 file:mr-3 file:rounded-md file:border-0 file:bg-slate-800 file:px-3 file:py-2 file:text-sm file:text-slate-100 hover:file:bg-slate-700">
                    @error('logo') <p class="mt-1 text-xs text-red-400">{{ $message }}</p> @enderror

                    @if($company->logo)
                        <div class="mt-3">
                            <span class="text-xs text-slate-400 block mb-1">Current logo:</span>
                            <img src="{{ asset('storage/'.$company->logo) }}"
                                 class="h-12 w-12 rounded-md object-cover border border-slate-700"
                                 alt="{{ $company->name }}">
                        </div>
                    @endif
                </div>

                <div class="flex justify-end space-x-3 pt-2">
                    <a href="{{ route('companies.index') }}"
                       class="px-4 py-2 rounded-md border border-slate-700 text-sm text-slate-200 hover:bg-slate-800">
                        Cancel
                    </a>
                    <button type="submit"
                            class="px-4 py-2 rounded-md bg-indigo-500 hover:bg-indigo-400 text-sm text-white shadow">
                        Update
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>