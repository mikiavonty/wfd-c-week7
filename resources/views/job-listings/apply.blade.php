@extends('templates.base')

@section('content')
    <form method="POST" enctype="multipart/form-data" action="{{ route('jobapplications.store', ['joblisting', $job->id]) }}">
        @csrf
        <input type="hidden" name="job_id" value="{{ $job->id }}" />
        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
                <h2 class="text-base/7 foQnt-semibold text-gray-900">{{ $job->title }} Application</h2>
                <p class="mt-1 text-sm/6 text-gray-600">This application is to
                    {{ $job->company . ' located in ' . $job->location }}.</p>

                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <div class="sm:col-span-4">
                        <label for="name" class="block text-sm/6 font-medium text-gray-900">Name</label>
                        <div class="mt-2">
                            <input type="text" name="name" id="name"
                                class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6"
                                placeholder=""
                                value="{{ old('name') }}">
                        </div>
                        @error('name')
                            <div class="text-sm text-red-700">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="sm:col-span-4">
                        <label for="email" class="block text-sm/6 font-medium text-gray-900">E-mail</label>
                        <div class="mt-2">
                            <input type="email" name="email" id="email"
                                class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6"
                                placeholder=""
                                value="{{ old('email') }}">
                        </div>
                        @error('email')
                            <div class="text-sm text-red-700">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="sm:col-span-4">
                        <label for="phone_number" class="block text-sm/6 font-medium text-gray-900">Phone Number</label>
                        <div class="mt-2">
                            <input type="text" name="phone_number" id="phone_number"
                                class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6"
                                placeholder=""
                                value="{{ old('phone_number') }}">
                        </div>
                        @error('phone_number')
                            <div class="text-sm text-red-700">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-span-full">
                        <label for="resume" class="block text-sm/6 font-medium text-gray-900">Resume</label>
                        <div class="mt-2">
                            <input id="resume" name="resume" type="file" />
                        </div>
                        @error('resume')
                            <div class="text-sm text-red-700">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-span-full">
                        <label for="cover_letter" class="block text-sm/6 font-medium text-gray-900">Cover Letter</label>
                        <div class="mt-2">
                            <textarea name="cover_letter" id="cover_letter" rows="3"
                                class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">{{ old('cover_letter') }}</textarea>
                        </div>
                        <p class="mt-3 text-sm/6 text-gray-600">Highlight your key qualifications and interests in this
                            position.</p>
                        @error('cover_letter')
                            <div class="text-sm text-red-700">{{ $message }}</div>
                        @enderror
                    </div>

                </div>
            </div>

            <div class="mt-6 flex items-center justify-end gap-x-6">
                <a href="{{ route('joblistings.index') }}">
                    <button type="button" class="text-sm/6 font-semibold text-gray-900">Cancel</button>
                </a>
                <button type="submit"
                    class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
            </div>
    </form>
@endsection
