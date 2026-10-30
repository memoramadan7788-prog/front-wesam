
@extends('frontend.layouts.app')

@section('title', __('Job Applications'))

@section('page_header')
    <h1 class="text-2xl font-bold">Job Applications</h1>
@endsection

@section('content')
    <div class="space-y-6">
        <div class="flex flex-wrap items-center justify-between gap-4">
            <div>
                <h2 class="text-xl font-semibold">Applications</h2>
                <p class="mt-1 text-sm text-gray-500">
                    Review and manage applications for your vacancies.
                </p>
            </div>
        </div>

        @if (session('success'))
            <div class="rounded-lg bg-green-100 p-4 text-green-800">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="rounded-lg bg-red-100 p-4 text-red-800">
                {{ session('error') }}
            </div>
        @endif

        <div class="overflow-x-auto rounded-lg border border-gray-200 bg-white">
            <table class="w-full text-left text-sm">
                <thead class="bg-gray-50 text-gray-700">
                    <tr>
                        <th class="px-4 py-3">#</th>
                        <th class="px-4 py-3">Candidate</th>
                        <th class="px-4 py-3">Vacancy</th>
                        <th class="px-4 py-3">Applied At</th>
                        <th class="px-4 py-3">Status</th>
                        <th class="px-4 py-3">Actions</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-200">
                    @forelse ($items as $item)
                        <tr class="hover:bg-gray-50">
                            <td class="px-4 py-3">
                                {{ $item->id ?? '—' }}
                            </td>

                            <td class="px-4 py-3">
                                {{ data_get($item, 'candidate.name', 'N/A') }}
                            </td>

                            <td class="px-4 py-3">
                                {{ data_get($item, 'vacancy.title', 'N/A') }}
                            </td>

                            <td class="px-4 py-3">
                                {{ $item->created_at?->format('Y-m-d') ?? '—' }}
                            </td>

                            <td class="px-4 py-3">
                                <span class="inline-flex rounded-full bg-gray-100 px-3 py-1 text-xs font-medium text-gray-700">
                                    {{ ucfirst((string) ($item->status ?? 'pending')) }}
                                </span>
                            </td>

                            <td class="px-4 py-3">
                                <a
                                    href="{{ url('/company/applications/' . $item->id . '/status') }}"
                                    class="font-medium text-blue-600 hover:underline"
                                >
                                    View / Update
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-4 py-8 text-center text-gray-500">
                                No applications found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
+