@extends('layouts.app')
@section('title')
    Gym in {{ $city->name }}
@endsection

@section('content')
    <x-nav />
    <section id="latest" class="flex flex-col w-full max-w-[1280px] gap-8 mx-auto px-10 mt-[120px]">
        <div class="flex items-center justify-between">
            <div class="flex flex-col gap-4">
                <h2 class="font-['ClashDisplay-SemiBold'] text-5xl leading-[59px] tracking-05">{{ $city->name }}</h2>
                <p class="leading-19 tracking-03 opacity-60">Finding FitCamp gym location nearby “{{ $city->name }}” city
                </p>
            </div>
        </div>
        <div class="grid grid-cols-3 gap-6">
            @forelse ($city->gyms as $itemGym)
                <a href="{{ route('front.details', $itemGym->slug) }}" class="card">
                    <div class="flex flex-col rounded-3xl p-8 gap-6 bg-white">
                        <div class="title flex flex-col gap-2">
                            <h3 class="font-['ClashDisplay-SemiBold'] leading-19 tracking-05">
                                {{ $itemGym->name }}
                            </h3>
                            <div class="flex items-center gap-1">
                                <img src="{{ asset('assets/images/icons/location.svg') }}" class="flex shrink-0"
                                    alt="icon">
                                <p class="text-sm leading-19 tracking-03 opacity-50">
                                    {{ $itemGym->city->name }}
                                </p>
                            </div>
                        </div>
                        <div class="thumbnail flex rounded-3xl h-[200px] bg-[#06425E] overflow-hidden">
                            <img src="{{ Storage::url($itemGym->thumbnail) }}" class="w-full h-full object-cover"
                                alt="thumbnail">
                        </div>
                        <div class="flex items-center justify-between">
                            <p class="font-['ClashDisplay-SemiBold']">Facilities</p>
                            <button class="font-semibold text-xs leading-14 tracking-05 text-fitcamp-royal-blue">View
                                all</button>
                        </div>
                        <div class="grid grid-cols-3 justify-between gap-3">
                            @forelse ($itemGym->gymFacilities->take(3) as $itemFacility)
                                <div class="flex flex-col gap-3 items-center text-center">
                                    <img src="{{ Storage::url($itemFacility->facility->icon) }}" class="w-10 h-10"
                                        alt="icon">
                                    <div class="flex flex-col gap-1">
                                        <p class="font-semibold text-sm leading-16 tracking-05">
                                            {{ $itemFacility->facility->name }}</p>
                                        <p class="opacity-50 text-sm leading-16 tracking-05">
                                            {{ $itemFacility->facility->about }}</p>
                                    </div>
                                </div>
                            @empty
                                <p>No facilities</p>
                            @endforelse
                        </div>
                        <hr class="border-black/10">
                        <div class="flex items-center gap-3">
                            <img src="{{ asset('assets/images/icons/Daily Time.svg') }}" class="w-10 h-10" alt="icon">
                            <div class="flex flex-col gap-2">
                                <p class="font-['ClashDisplay-SemiBold'] text-sm leading-17 tracking-05">Opening Work</p>
                                <p class="text-xs leading-14 tracking-05 opacity-50">
                                    {{ $itemGym->open_time_at->format('h:i A') }} -
                                    {{ $itemGym->closed_time_at->format('h:i A') }}
                                </p>
                            </div>
                        </div>
                    </div>
                </a>
            @empty
                <p>No Gyms available</p>
            @endforelse


        </div>
    </section>

    <x-footer />
@endsection
