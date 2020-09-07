@extends('layouts.app')

@section('title')
    <title>{{ 'Home - HappySchools' }}</title>

    <!-- Page Description -->
    <meta name="description" content="Happy Schools is a web application which is designed and developed for teachers inside the UK to help them get to their dream work-load balance teaching environment." />
@endsection

@section('content')
    <section class="hero">
        <div class="hero__container">
            <div class="hero__wrapper">
                <div class="hero__content">
                    <div class="title title--no-style title--center title--white">
                        <h1 class="title__heading">Teach at your dream school</h1>
                        <p class="title__description">Take your First Step towards a happier work-life balance!</p>
                    </div>
                    <form class="hero__form" action="/search" method="POST">
                        @csrf
                        <div class="row p-0 m-0 w-100">
                            <div class="col-4 hero__field">
                                <input class="form__input hero__input form-control" type="text" name="name" placeholder="Enter School Name" />
                            </div>
                            <div class="col-3 hero__field">
                                <input class="form__input hero__input form-control" type="text" name="name" placeholder="Enter Location" />
                            </div>
                            <div class="col-3 hero__field">
                                <select class="form__input hero__input form-control" name="category">
                                    <option value="">Category</option>
                                    <option value="">Primary School</option>
                                    <option value="">Secondary School</option>
                                </select>
                            </div>
                            <div class="col-2 hero__field">
                                <button class="btn btn--hero" type="submit">
                                    <i class="feather icon-search"></i> search
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="hero__bg">
                <img src="{{ asset('/img/svg/hero-bg.svg') }}" alt="Hero Background Image" />
            </div>
        </div>
    </section>
    <section>
        <div class="container-fluid">
            <div class="title">
                <div class="title__heading">
                    <h2 class="heading__title">some fucked up shits</h2>
                </div>
            </div>
        </div>
    </section>
@endsection
