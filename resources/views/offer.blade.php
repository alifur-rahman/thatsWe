@extends('app')
@section('styles')
    <style>
        .form-check-input {
            margin-top: 6px;
        }
    </style>
@endsection

@section('content')

    <section class="bg-200" id="offer">
        <div class="container">
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{ session('success') }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="card">
                <div class="card-body">
                    <h2 class="text-center mb-2">{{ __('messages.company_info') }}</h2>

                    <form action="{{ route('submit-offer') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-4 offset-md-3">
                                <div class="mb-2">
                                    <label for="companyName" class="form-label">{{ __('messages.company_name') }}</label>
                                    <input type="text" class="form-control" id="companyName" name="companyName"
                                        placeholder="{{ __('messages.your_company_name') }}">
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="mb-2">
                                    <label class="form-label">{{ __('messages.travel_industry?') }}</label>

                                    <div class="d-flex align-items-center gap-4">
                                        <div class="form-check">
                                            <label class="form-check-label" for="yes">
                                                {{ __('messages.yes') }}
                                            </label>
                                            <input class="form-check-input" type="radio" name="travelIndustry"
                                                id="yes" value="yes">

                                        </div>
                                        <div class="form-check">
                                            <label class="form-check-label" for="no">
                                                {{ __('messages.no') }}
                                            </label>
                                            <input class="form-check-input" type="radio" name="travelIndustry"
                                                id="no" value="no">

                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 offset-md-3">
                                <div class="mb-2">
                                    <label for="telephone" class="form-label">{{ __('messages.telephone') }}</label>
                                    <input type="tel" class="form-control" id="telephone" name="telephone"
                                        placeholder="{{ __('messages.your_telephone') }}">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4 offset-md-3">
                                <div class="mb-2">
                                    <label for="contactPerson"
                                        class="form-label">{{ __('messages.name_of_contact_person') }}</label>
                                    <input type="text" class="form-control" id="contactPerson" name="contactPerson"
                                        placeholder="{{ __('messages.contact_person_name') }}">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-1 offset-md-3">
                                <div class="mb-2">
                                    <label for="postalCode" class="form-label">{{ __('messages.postal_code') }}</label>
                                    <input type="text" class="form-control" id="postalCode" name="postalCode"
                                        placeholder="{{ __('messages.your_postal_code') }}">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-2">
                                    <label for="city" class="form-label">{{ __('messages.city') }}</label>
                                    <input type="text" class="form-control" id="city" name="city"
                                        placeholder="{{ __('messages.your_city') }}">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4 offset-md-3">
                                <div class="mb-2">
                                    <label for="address" class="form-label">{{ __('messages.address') }}</label>
                                    <input type="text" class="form-control" id="address" name="address"
                                        placeholder="{{ __('messages.your_address') }}">
                                </div>
                            </div>
                        </div>
                        <div class="row ">
                            <div class="col-md-4 offset-md-3">
                                <div class="mb-2">
                                    <label for="website" class="form-label">{{ __('messages.website') }}</label>
                                    <input type="text" class="form-control" id="website" name="website"
                                        placeholder="{{ __('messages.your_website') }}">
                                </div>
                            </div>
                        </div>

                        <div class="row ">
                            <div class="col-md-4 offset-md-3">
                                <div class="mb-2">
                                    <label for="website" class="form-label">{{ __('messages.mail_address') }}</label>
                                    <input type="text" class="form-control" id="your_mail" name="your_mail"
                                        placeholder="{{ __('messages.your_mail_address') }}">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 text-center">
                            <div class="mt-2">
                                <button type="submit" class="btn btn-primary">{{ __('messages.submit') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    {{-- <section class="bg-200" id="recommend" style="padding-top: 0rem;">
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h2 class="text-center mb-4">{{ __('messages.recommend_to_friend') }}</h2>

                <form action="{{ route('submit-recommendation') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="yourName" class="form-label">{{ __('messages.your_name') }}</label>
                                <input type="text" class="form-control" id="yourName" name="yourName" placeholder="{{ __('messages.your_name') }}">
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="personEmail" class="form-label">{{ __('messages.person_email') }}</label>
                                <input type="email" class="form-control" id="personEmail" name="personEmail" placeholder="{{ __('messages.person_email') }}">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="personEmail" class="form-label">{{ __('messages.person_email') }}</label>
                                <input type="email" class="form-control" id="personEmail" name="personEmail" placeholder="{{ __('messages.person_email') }}">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="personEmail" class="form-label">{{ __('messages.person_email') }}</label>
                                <input type="email" class="form-control" id="personEmail" name="personEmail" placeholder="{{ __('messages.person_email') }}">
                            </div>
                        </div>

                        <div class="col-md-6 mt-3">
                            <div class="">
                                <button type="submit" class="btn btn-primary">{{ __('messages.send') }}</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section> --}}

@endsection
