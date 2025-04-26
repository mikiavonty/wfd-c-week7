@extends('templates.base')

@section('content')
<h1 class="text-4xl font-bold tracking-tight text-zinc-800 sm:text-5xl mb-6">Job Listings</h1>
<div class="mx-auto grid max-w-xl grid-cols-1 gap-x-6 gap-y-12 lg:max-w-none lg:grid-cols-2">
    @foreach ($jobListings as $job)
    <div class="flex flex-col gap-16">
        <article class="group relative flex flex-col items-start">
            <h3 class="text-md font-semibold">{{ $job->title." (Rp. ".$job->salary.",00)" }}</h3>
            <p class="text-sm"><span class="font-semibold">Company:</span> {{ $job->company}}</p>
            <p class="text-sm"><span class="font-semibold">Location:</span> {{ $job->location }}</p>
            <p class="text-sm"><span class="font-semibold">Last application on:</span> {{ \Carbon\Carbon::parse($job->closing_date)
                                                            ->format('d, F Y') }}</p>
            <p class="text-sm pt-1"><span class="font-semibold">Description</span><br>{{ $job->description }}</p>
            <a href="">
                <button type="button" class="inline-flex items-center gap-2 justify-center rounded-md py-2 px-3 text-sm outline-offset-2 transition active:transition-none bg-zinc-800 font-semibold text-zinc-100 hover:bg-zinc-700 active:bg-zinc-800 active:text-zinc-100/70 dark:bg-zinc-700 flex-none mt-3">Apply</button>
            </a>
        </article>
    </div>
    @endforeach
</div>
<div class="mt-6">
{{ $jobListings->links() }}
</div>
@endsection