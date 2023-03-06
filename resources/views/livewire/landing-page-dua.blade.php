<div class="container mt-3">
    @push('carousel')
        @include('layouts.carousel')
    @endpush
    @push('css')
        <style>
            .mask {
                position: absolute;
                top: 0;
                right: 0;
                bottom: 0;
                left: 0;
                width: 100%;
                height: 100%;
                overflow: hidden;
                background-attachment: fixed;
            }

            .card .bg-image {
                border-top-left-radius: 0.5rem;
                border-top-right-radius: 0.5rem;
            }

            .bg-image {
                position: relative;
                overflow: hidden;
                background-repeat: no-repeat;
                background-size: cover;
                background-position: 50%;
            }
        </style>
    @endpush
    @push('page_name')
        Landing Page
    @endpush

    @if ($newestbid != null)
        <div class="row justify-content-center">
            <div class="col-12">
                <h2 class="h3 fw-bold">Baru Dimulai</h2>
            </div>
            <hr class="mb-3">
            <div class="col-12">
                <div class="row justify-content-center">
                    @foreach ($newestbid as $item)
                        <div class="col-12 col-md-3 mb-3">
                            <div class="card">
                                <div class="ratio ratio-1x1 bg-image">
                                    <img src="{{ asset('images/items/jam.jpg') }}" class="card-img-top img-fluid">
                                    <div class="mask" style="background-color: rgba(0, 0, 0, 0.1)"></div>
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">
                                        <a class="text-dark text-decoration-none"
                                            href="{{ route('bid-item-view', ['id' => $item->kode_lot]) }}">
                                            {{ $item->items['name'] }}
                                        </a>
                                    </h5>
                                    <p class="card-text">
                                        Harga Awal : Rp {{ number_format($item->harga_awal, 0, ',', '.') }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="col-12">
                <p class="h5 text-center">
                    <a href="#" class="text-dark text-decoration-none">
                        Lihat Lainnya
                    </a>
                </p>
            </div>
        </div>
        <hr class="mb-3">
    @endif
    @if ($timeoutbid != null)
        <div class="row justify-content-center">
            <div class="col-12">
                <h2 class="h3 fw-bold">Waktunya Hampir Habis</h2>
            </div>
            <hr class="mb-3">
            <div class="col-12">
                <div class="row justify-content-center">
                    @foreach ($timeoutbid as $item)
                        <div class="col-12 col-md-3 mb-3">
                            <div class="card">
                                <div class="ratio ratio-1x1 bg-image">
                                    <img src="{{ asset('images/items/jam.jpg') }}" class="card-img-top img-fluid">
                                    <div class="mask" style="background-color: rgba(0, 0, 0, 0.1)"></div>
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">
                                        <a class="text-dark text-decoration-none"
                                            href="{{ route('bid-item-view', ['id' => $item->kode_lot]) }}">
                                            {{ $item->items['name'] }}
                                        </a>
                                    </h5>
                                    <p class="card-text">
                                        Penawaran Tertinggi : Rp
                                        {{ number_format($item->bids[0]->penawaran, 0, ',', '.') }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="col-12">
                <p class="h5 text-center">
                    <a href="#" class="text-dark text-decoration-none">
                        Lihat Lainnya
                    </a>
                </p>
            </div>
        </div>
        <hr class="mb-3">
    @endif
    <pre>
        {{-- {{ $timeoutbid }} --}}
        {{-- {{ print_r($timeoutbid) }} --}}
    </pre>
</div>
