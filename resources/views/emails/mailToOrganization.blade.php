<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Document</title>
</head>

<body>
    <div class="container">

        <section class=" flex flex-col  items-center">
            <div class="w-[400px]  bg-gradient-to-r from-custom-white to-custom-pink border-2">
                <div class="custom_bg h-[250px] w-[400px]  bg-contain bg-no-repeat bg-center"></div>
                    <div>
                        <h2 class="text-center text-blue-600">Message from user </h2>
                        <div class="text-blue-600 ">
                            <p class="p-8 border-2 border-dotted">name:</p>
                            <p class="p-8 border-2 border-dotted">email:</p>
                            <p class="p-8 border-2 border-dotted">message: </p>
                        </div>
                    </div>
{{ dd($details['educational_test']) }}
                <div class="grid gap-4 grid-cols-2 grid-rows-3 border-2 h-[200px]">
                        @php
                        foreach ($details['educational_test'] as $key => $value) {
                        @endphp
                        @php   # code...
                        }

                        @endphp
                    <div class="w-1/2 border-2 h-[100px] justify-center rounded-md">educational hh</div>
                    <div class="w-1/2 border-2 h-[100px] justify-center rounded-md">educational</div>
                    <div class="w-1/2 border-2 h-[100px] justify-center rounded-md">educational</div>
                    <div class="w-1/2 border-2 h-[100px] justify-center rounded-md">educational</div>
                </div>
                <div class ="flex justify-center border-2">
                    <p>Our Contact </p>
                    <p> </p>
                </div>
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
