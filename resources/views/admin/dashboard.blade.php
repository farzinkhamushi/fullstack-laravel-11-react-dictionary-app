@extends('admin.layouts.app')

@section('title')
    Dashboard
@endsection

@section('content')
<div class="row my-5">
    <div class="col-md-4">
        @include('admin.layouts.sidebar')
    </div>
    <div class="col-md-8">
        <div class="container">
            <div class="row ">
                <div class="col-xl-6 col-lg-6">
                    <div class="card dashboard_card l-bg-blue-dark">
                        <div class="card-statistic-3 p-4">
                            <div class="card-icon card-icon-large">
                                <i class="fa-solid fa-pen-nib"></i>
                            </div>
                            <div class="mb-4">
                                <h5 class="card-title mb-0">Words</h5>
                            </div>
                            <div class="row align-items-center mb-2 d-flex">
                                <div class="col-8">
                                    <h2 class="d-flex align-items-center mb-0">
                                        {{ $words->count() }}
                                    </h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6">
                    <div class="card dashboard_card l-bg-orange-dark">
                        <div class="card-statistic-3 p-4">
                            <div class="card-icon card-icon-large">
                                <i class="fa-solid fa-up-right-and-down-left-from-center"></i>
                            </div>
                            <div class="mb-4">
                                <h5 class="card-title mb-0">Definitions</h5>
                            </div>
                            <div class="row align-items-center mb-2 d-flex">
                                <div class="col-8">
                                    <h2 class="d-flex align-items-center mb-0">
                                        {{ $definitions->count() }}
                                    </h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6">
                    <div class="card dashboard_card l-bg-green-dark">
                        <div class="card-statistic-3 p-4">
                            <div class="card-icon card-icon-large">
                                <i class="fa-solid fa-lines-leaning"></i>
                            </div>
                            <div class="mb-4">
                                <h5 class="card-title mb-0">Synonyms</h5>
                            </div>
                            <div class="row align-items-center mb-2 d-flex">
                                <div class="col-8">
                                    <h2 class="d-flex align-items-center mb-0">
                                        {{ $synonyms->count() }}
                                    </h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6">
                    <div class="card dashboard_card l-bg-yellow-dark">
                        <div class="card-statistic-3 p-4">
                            <div class="card-icon card-icon-large">
                                <i class="fa-solid fa-chart-gantt"></i>
                            </div>
                            <div class="mb-4">
                                <h5 class="card-title mb-0">Plans</h5>
                            </div>
                            <div class="row align-items-center mb-2 d-flex">
                                <div class="col-8">
                                    <h2 class="d-flex align-items-center mb-0">
                                        {{ $plans->count() }}
                                    </h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6">
                    <div class="card dashboard_card l-bg-red-dark">
                        <div class="card-statistic-3 p-4">
                            <div class="card-icon card-icon-large">
                                <i class="fa-solid fa-chart-gantt"></i>
                            </div>
                            <div class="mb-4">
                                <h5 class="card-title mb-0">Subscriptions</h5>
                            </div>
                            <div class="row align-items-center mb-2 d-flex">
                                <div class="col-8">
                                    <h2 class="d-flex align-items-center mb-0">
                                        {{ $subscriptions->count() }}
                                    </h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection