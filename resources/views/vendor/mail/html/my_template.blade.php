<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <style>
        /* Вставьте содержимое вашего файла CSS или подключите его */
        /* @import url('themes/my_custom.css'); */
        section{
    height:300px;
    width:300px;

    background-image: url('{{ asset('public/images/test_background.png') }}');
    background-size: cover;
    background-position: center; */
}
    </style>
</head>
<body>
    <section
    {{-- style="background-image: url('{{ asset('/images/test_background.png') }}');"--}}
    >
    {{-- <img src="{{ public_path().'/images/gorcka.png' }}"> --}}
        sddddddddddddddddddddddddd
        <div class="p-2">
            <h2 class="text-center ">Message from user </h2>
            <div>
                <p class="px-8 mb-1 border-2 border-dotted">name: {{ $details['name'] }}</p>
                <p class="px-8 mb-1 border-2 border-dotted">email: {{ $details['email'] }}</p>
                <p class="px-8 mb-1 border-2 border-dotted">message: {{ $details['message'] }} </p>
            </div>
        </div>
    </section>

</body>
</html>
