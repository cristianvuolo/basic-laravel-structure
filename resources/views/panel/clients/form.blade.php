@extends('panel.layout.base')

@section('content')
<div>
    <a href="{{ route('panel.client.list') }}" class="px-4 bg-green-500 p-1 rounded-lg text-white hover:bg-green-300 hover:text-gray-700 mr-2">Go Back</a>
    <main class="bg-white-500 flex-1 p-3 overflow-hidden">
        <div class="mb-2 border-solid border-grey-light rounded border shadow-sm w-full ">
            <div class="p-3">
                <form class="w-full" action="{{ $client->id ? route('panel.client.update', [$client->id]) : route('panel.client.store') }}" method="post">
                    {!! csrf_field() !!}
                    <div class="md:flex md:items-center mb-6">
                        <div class="md:w-1/4">
                            <label class="block font-regular md:text-right mb-1 md:mb-0 pr-4"
                                   for="inline-full-name">
                                Name*
                            </label>
                        </div>
                        <div class="md:w-3/4">
                            <input class="bg-grey-200 appearance-none border-1 border-grey-200 rounded w-full py-2 px-4 text-grey-darker leading-tight focus:outline-none focus:bg-white focus:border-purple-light"
                                   id="inline-full-name" name="name" type="text" value="{{ old('name', $client->name) }}" required placeholder="Your Name">
                            @include('panel.layout.input-error', ['field' => 'name'])
                        </div>
                    </div>

                    <div class="md:flex md:items-center mb-6">
                        <div class="md:w-1/4">
                            <label class="block font-regular md:text-right mb-1 md:mb-0 pr-4"
                                   for="inline-full-name">
                                Email*
                            </label>
                        </div>
                        <div class="md:w-3/4">
                            <input class="bg-grey-200 appearance-none border-1 border-grey-200 rounded w-full py-2 px-4 text-grey-darker leading-tight focus:outline-none focus:bg-white focus:border-purple-light"
                                   id="inline-full-name" name="email" type="email" value="{{ old('email', $client->email) }}" required placeholder="Your Email">
                            @include('panel.layout.input-error', ['field' => 'email'])
                        </div>
                    </div>

                    <div class="md:flex md:items-center mb-6">
                        <div class="md:w-1/4">
                            <label class="block font-regular md:text-right mb-1 md:mb-0 pr-4" for="inline-full-name">
                                Birth Date*
                            </label>
                        </div>
                        <div class="md:w-3/4">
                            <input class="bg-grey-200 appearance-none border-1 border-grey-200 rounded w-full py-2 px-4 text-grey-darker leading-tight focus:outline-none focus:bg-white focus:border-purple-light"
                                   id="inline-full-name" type="date" name="birth_date" value="{{ old('birth_date', $client->birth_date->format('Y-m-d')) }}" required placeholder="dd/mm/yyyy">
                            @include('panel.layout.input-error', ['field' => 'birth_date'])
                        </div>
                    </div>


                    <div class="md:flex md:items-center">
                        <div class="md:w-1/3"></div>
                        <div class="md:w-2/3">
                            <button class="shadow bg-green-500 hover:bg-green-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded"
                                    type="submit">
                                Store Register
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </main>
</div>
@endsection
