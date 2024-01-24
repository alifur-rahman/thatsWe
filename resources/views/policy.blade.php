@extends('app')

@section('content')

<section class="bg-light" id="dataProtectionImprint">
    <div class="container">
        <div class="card p-4 pt-0 pb-0 mx-auto" style="width: 75%;">
            <div class="card-body">
                <h2 class="text-center mb-1">{{ __('messages.data_protection') }}</h2>
                <p>
                    {{ __('messages.data_protection1') }}
                </p>
                <p>
                    {{ __('messages.data_protection2') }}
                </p>
                <p class="pb-0 mb-0">
                    {{ __('messages.data_protection3') }}
                </p>
            </div>
        </div>

        <div class="card mt-2 p-4 pb-0 mx-auto" style="width: 30%;">
            <h2 class="text-center mb-1">{{ __('messages.imprint') }}</h2>
            <address>
                <strong>{{ __('messages.line1') }}</strong><br>
                Bockhorner Weg 90<br>
                28779 Bremen<br>
                <a href="http://www.thatswe.de" target="_blank">www.thatswe.de</a><br>
                Email: <a href="mailto:proliz@web.de">proliz@web.de</a>
            </address>
        </div>
    </div>

</section>

@endsection

@section('styles')
<style>
    body, html {
            margin: 0;
            padding: 0;
            width: 100%;
            height: 100vh;
            overflow-x:hidden;
            overflow-y:hidden;
        }
</style>
@endsection
