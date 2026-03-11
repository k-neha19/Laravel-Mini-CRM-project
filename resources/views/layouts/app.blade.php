<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Mini CRM') }}</title>

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased bg-slate-900 text-slate-100">
        <div class="min-h-screen flex flex-col">
            <nav class="bg-slate-950 border-b border-slate-800">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="flex justify-between h-16 items-center">
                        <div class="flex items-center space-x-4">
                            <span class="text-xl font-semibold text-indigo-400">
                                Mini CRM
                            </span>
                            @auth
                                <a href="{{ route('companies.index') }}"
                                   class="text-sm {{ request()->routeIs('companies.*') ? 'text-indigo-400' : 'text-slate-300 hover:text-white' }}">
                                    Companies
                                </a>
                                <a href="{{ route('employees.index') }}"
                                   class="text-sm {{ request()->routeIs('employees.*') ? 'text-indigo-400' : 'text-slate-300 hover:text-white' }}">
                                    Employees
                                </a>
                            @endauth
                        </div>

                        @auth
                            <div class="flex items-center space-x-4">
                                <span class="text-sm text-slate-300">
                                    {{ auth()->user()->name }}
                                </span>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button
                                        class="px-3 py-1 text-xs rounded-md bg-slate-800 hover:bg-slate-700 text-slate-100 border border-slate-700">
                                        Logout
                                    </button>
                                </form>
                            </div>
                        @endauth
                    </div>
                </div>
            </nav>

            <main class="flex-1">
                <div class="py-6">
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                        @if(session('success'))
                            <div class="mb-4 px-4 py-2 rounded-md bg-emerald-900 text-emerald-200 border border-emerald-700 text-sm">
                                {{ session('success') }}
                            </div>
                        @endif

                        {{ $slot ?? '' }}
                    </div>
                </div>
            </main>
        </div>
    </body>
</html>