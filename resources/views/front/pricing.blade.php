@extends('layouts.app')
@section('title')
    Biaya Langganan
@endsection

@section('content')
    <x-nav />

    <main id="content"
        class="relative flex w-full max-w-[1312px] min-h-[970px] h-fit mx-auto mt-[120px] rounded-[32px] bg-[#606DE5] overflow-hidden">
        <img src="assets/images/backgrounds/Illustration BG.svg" class="absolute w-full h-full object-cover" alt="background">
        <div class="relative flex flex-col w-full items-center">
            <div class="flex flex-col gap-4 text-center mx-auto mt-12">
                <h2 class="font-['ClashDisplay-SemiBold'] text-5xl leading-[59px] tracking-05">Subscribe Package</h2>
                <p class="leading-19 tracking-03 opacity-60">Find the perfect plan, explore our subscription packages.
                    Discover the Best Package for You!</p>
            </div>
            <div class="flex gap-8 max-w-[1132px] mx-auto mt-20 mb-[124px]">
                @forelse ($subscribePackages as $itemSubscribe)
                    <div class="card flex flex-col w-[356px] rounded-3xl p-8 gap-6 bg-white">
                        <div class="flex w-full h-[200px] rounded-3xl overflow-hidden bg-[#606DE5]">
                            <img src="{{ Storage::url($itemSubscribe->icon) }}" class="w-full h-full object-cover"
                                alt="icon">
                        </div>
                        <div class="flex flex-col gap-2">
                            <p class="font-['ClashDisplay-SemiBold'] leading-19 tracking-05">{{ $itemSubscribe->name }}</p>
                            <p class="text-sm leading-16 tracking-05 opacity-50">Enjoy all subscribe package benefits</p>
                        </div>

                        @foreach ($itemSubscribe->subscribeBenefits as $itemBenefit)
                            <div class="flex items-center gap-4">
                                <img src="assets/images/icons/tick-circle.svg" class="w-8 h-8 flex shrink-0" alt="icon">
                                <p class="leading-19 tracking-05">{{ $itemBenefit->name }}</p>
                            </div>
                        @endforeach

                        <div class="flex items-center justify-between mt-auto">
                            <a href="{{ route('front.booking', $itemSubscribe->id) }}"
                                class="w-fit rounded-full py-3 px-6 bg-[#606DE5] font-semibold leading-19 tracking-05 text-white text-center">Subscribe</a>
                            <p class="text-right font-semibold leading-19 tracking-05">
                                Rp {{ number_format($itemSubscribe->price, 0, ',', '.') }}<span
                                    class="font-normal opacity-50">/<br>
                                    {{ $itemSubscribe->duration }} days</span>
                            </p>
                        </div>
                    </div>
                @empty
                    <p class="text-sm leading-16 tracking-05 opacity-50">No subscription packages available</p>
                @endforelse
            </div>
        </div>
    </main>

    <x-footer />
@endsection
