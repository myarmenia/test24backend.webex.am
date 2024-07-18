<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Document</title>
</head>

<body >
    <div class="container ">

        <section class=" flex flex-col  items-center">
            <div class="w-[400px]  bg-gradient-to-r from-custom-white to-custom-pink  text-pink-600">
                <div class="custom_bg h-[250px] w-[400px]  bg-contain bg-no-repeat bg-center"></div>
                    <div class="p-2">
                        <h2 class="text-center ">Message from user </h2>
                        <div>
                            <p class="px-8 mb-1 border-2 border-dotted">name: {{ $details['name'] }}</p>
                            <p class="px-8 mb-1 border-2 border-dotted">email: {{ $details['email'] }}</p>
                            <p class="px-8 mb-1 border-2 border-dotted">message: {{ $details['message'] }} </p>
                        </div>
                    </div>
                    <div>
                        <h2 class="text-center p-5">{{ $details['test_types'] }}</h2>
                    </div>

                    <div class="grid gap-4 grid-cols-2 ">
                            @foreach ($details['test_categories'] as $value )
                                <button class=" border-2 rounded-md py-1">{{$value->translation(app()->getLocale())->text }}</button>
                            @endforeach
                    </div>

            </div>
            <div class ="flex justify-center text-pink-600">
                <h1 class ="p-2">Best regards</h1>
            </div>
        </section>

        // {{-- <div class="custom_bg bg-cover bg-center h-screen "> --}}
        //     {{-- <p>name: {{ $details['name'] }},</p>
        //     <p>email: {{ $details['email'] }},</p>
        //     <p>message: {{ $details['message'] }},</p> --}}

        // {{-- </div> --}}

    </div>

</body>

</html>
