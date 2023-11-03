@if ($errors->any())
    <style>
        .erroLogin {
            display: flex;
            flex-direction: column;
            background-color: rgb(241, 147, 147);
            justify-content: center;
            align-items: center;
            margin: 0 auto 15px auto;
            border-radius: 20px;
            max-width: 300px;
            padding: 20px 10px 0;
        }

        div > div {
            font-weight: bold;
        }

        ul > li {
            font-weight: normal;
            padding: 5px;
        }
    </style>
    <div class="erroLogin">
        <div class="font-medium text-red-600">{{ __('Opa! Algo deu errado.') }}</div>

        <ul class="mt-3 list-disc list-inside text-sm text-red-600">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
