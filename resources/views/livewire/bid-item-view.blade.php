<div class="container mt-3">
    @push('js')
        <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js"
            data-client-key="{{ env('MIDTRANS_CLIENT_KEY') }}"></script>
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
        Item Lelang
    @endpush
    {{-- <pre>
        {{ dump($datalelang) }}
    </pre> --}}
    <div class="row">
        <div class="col-12">
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a class="text-dark" href="{{ route('landing-page') }}">Beranda</a></li>
                    <li class="breadcrumb-item active">{{ $datalelang->items->name }} - {{ $kodelot }}</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-12 mb-3">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-lg-6 mb-3 mb-md-0">
                            <div id="carouselBasicExample" class="carousel slide" data-bs-ride="carousel">
                                <div class="carousel-indicators">
                                    <button type="button" data-bs-target="#carouselBasicExample" data-bs-slide-to="0"
                                        class="active" aria-current="true"></button>
                                    <button type="button" data-bs-target="#carouselBasicExample" data-bs-slide-to="1"
                                        class=""></button>
                                </div>
                                <div class="carousel-inner rounded-5 shadow-4-strong text-center">
                                    <div class="carousel-item ratio ratio-1x1 bg-image active">
                                        <img class="img img-fluid img-responsive"
                                            src="{{ asset('images/items/jam.jpg') }}">
                                        <div class="mask" style="background-color: rgba(0, 0, 0, 0.1)"></div>
                                    </div>
                                    <div class="carousel-item ratio ratio-1x1 bg-image">
                                        <img class="img img-fluid img-responsive"
                                            src="{{ asset('images/items/jam.jpg') }}">
                                        <div class="mask" style="background-color: rgba(0, 0, 0, 0.1)"></div>
                                    </div>
                                </div>
                                <button class="carousel-control-prev" type="button"
                                    data-bs-target="#carouselBasicExample" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button"
                                    data-bs-target="#carouselBasicExample" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            </div>
                        </div>
                        <div class="col-12 col-lg-6">
                            <div class="row mb-3">
                                <div class="col-12">
                                    <h2 class="fw-bold">{{ $datalelang->items->name }}</h2>
                                    @if (strtotime(date('Y-m-d H:i:s')) < $datalelang->waktu_mulai)
                                        <span class="badge bg-warning">Belum Dimulai</span>
                                    @elseif(strtotime(date('Y-m-d H:i:s')) > $datalelang->waktu_selesai)
                                        <span class="badge bg-danger">Sudah Selesai</span>
                                    @else
                                        <span class="badge bg-success">Sedang Berlangsung</span>
                                    @endif
                                </div>
                                <div class="col-12">
                                    by <a class="text-dark fw-bold"
                                        href="{{ route('profile', ['id' => $bidusername]) }}">{{ $bidusername }}
                                    </a>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-12">
                                    @if (count($datalelang->bids) == 0)
                                        <h5 class="fw-bold">Harga Mulai</h5>
                                        <h6 class="fw-bold">
                                            Rp {{ number_format($datalelang->harga_awal, 0, ',', '.') }}
                                        </h6>
                                    @else
                                        <h5 class="fw-bold">Tawaran Tertinggi</h5>
                                        <h6 class="fw-bold">
                                            Rp {{ number_format($datalelang->bids[0]->penawaran, 0, ',', '.') }}
                                        </h6>
                                    @endif
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-12">
                                    <h5 class="fw-bold">Tanggal Mulai Lelang</h5>
                                    <h6 class="fw-bold">
                                        {{ $this->dateConvertInt($datalelang->waktu_mulai) }}
                                    </h6>

                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-12">
                                    <h5 class="fw-bold">Tanggal Tutup Lelang</h5>
                                    <h6 class="fw-bold">
                                        {{ $this->dateConvertInt($datalelang->waktu_selesai) }}
                                    </h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="col-12 col-lg-6 offset-lg-6">
                        <div class="d-grid gap-2">
                            @guest
                                <a class="btn btn-outline-success fw-bold" href="{{ route('login') }}">
                                    Mau ikut lelang? Login sebagai peserta lelang disini!
                                </a>
                            @else
                                @level('pelelang')
                                    <button class="btn btn-outline-success fw-bold">
                                        Login sebagai akun penawar untuk ikut lelang ini!
                                    </button>
                                @elselevel('penawar')
                                    <button class="btn btn-outline-success fw-bold">
                                        Ikuti Lelang Ini!
                                    </button>
                                @endlevel
                            @endguest
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h1 class="text-center h3 fw-bold mb-3">Penawaran Masuk</h1>
                    <table class="table table-bordered text-center">
                        <thead class="table-primary">
                            <tr class="fw-bold">
                                <th class="fw-bold">No</th>
                                <th class="fw-bold">Nama Penawar</th>
                                <th class="fw-bold">Penawaran</th>
                                <th class="fw-bold">Waktu</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($datalelang->bids as $item)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $this->cencorName($this->getNames($item->user_penawar_id)) }}</td>
                                    <td>Rp {{ number_format($item->penawaran, 0, ',', '.') }}</td>
                                    <td>{{ $this->dateConvert($item->created_at) }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4">
                                        <h2 class="text-center fw-bold">Belum ada penawaran</h2>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @level('penawar')
    @endlevel
</div>
