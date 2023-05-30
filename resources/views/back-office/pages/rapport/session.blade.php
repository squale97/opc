@extends('layouts.back.master')
@section('css')
@endsection


@section('b-content')

    <section class="mt-7">

        <div class="row">
            @if ($sessions->count() > 0)
                @foreach ($sessions as $item)
                    <div class="col-xl-3 col-sm-6">
                        <a href="{{ route('detail-rapport', $item->uuid) }}">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row mb-1">
                                        <div class="col">
                                            <p class="mb-1">Session</p>
                                            <h3 class="mb-0 text-center number-font">
                                                {{ Carbon\Carbon::parse($item->date_ouverture)->format('Y') }}</h3>
                                        </div>
                                        <div class="col-auto mb-0">
                                            <div class="dash-icon text-orange">
                                                <i class="bx bxs-dock-top"></i>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            @else
            <div class="col-md-12 col-sm-12 mt-9 text-center">
                Auccune session disponible
            </div>
           
            @endif
        </div>
        <!-- Row-1 End -->
    </section>




@endsection


@section('js')
@endsection
