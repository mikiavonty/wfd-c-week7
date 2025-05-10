{{-- @extends('templates.base')

@section('content') --}}
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Job Listings') }}
        </h2>
    </x-slot>

    {{-- <h1 class="text-4xl font-bold tracking-tight text-zinc-800 sm:text-5xl mb-6">Job Listings</h1> --}}
    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        @if (session()->has('status'))
            <div class="mb-2 flex items-center bg-blue-500 text-white text-sm font-bold px-4 py-3" role="alert">
                <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                    <path
                        d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z" />
                </svg>
                <p>{{ session()->get('status') }}</p>
            </div>
        @endif

        <div class="mx-auto grid max-w-xl grid-cols-1 gap-x-6 gap-y-12 lg:max-w-none lg:grid-cols-2">
            @foreach ($jobListings as $job)
                <div class="flex flex-col gap-16">
                    <article class="group relative flex flex-col items-start">
                        <h3 class="text-md font-semibold">
                            {{ $job->title . ' (Rp. ' . number_format($job->salary, 0, ',', '.') . ',00)' }}</h3>
                        <p class="text-sm"><span class="font-semibold">Company:</span> {{ $job->company }}</p>
                        <p class="text-sm"><span class="font-semibold">Location:</span> {{ $job->location }}</p>
                        <p class="text-sm"><span class="font-semibold">Last application on:</span>
                            {{ \Carbon\Carbon::parse($job->closing_date)->format('d, F Y') }}
                        </p>
                        <p class="text-sm pt-1"><span
                                class="font-semibold">Description</span><br>{{ $job->description }}
                        </p>
                        <a href="{{ route('jobapplications.create', ['joblisting' => $job->id]) }}">
                            <button type="button"
                                class="inline-flex items-center gap-2 justify-center rounded-md py-2 px-3 text-sm outline-offset-2 transition active:transition-none bg-zinc-800 font-semibold text-zinc-100 hover:bg-zinc-700 active:bg-zinc-800 active:text-zinc-100/70 flex-none mt-3">Apply</button>
                        </a>
                    </article>
                </div>
            @endforeach
        </div>
        <div class="mt-6">
            {{ $jobListings->links() }}
        </div>
    </div>
</x-app-layout>

{{-- @endsection --}}
