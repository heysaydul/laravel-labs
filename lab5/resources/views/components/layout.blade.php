@props(['title' => 'My Site'])

<!DOCTYPE html>
<html lang="en" data-theme="night"class="h-full">
<head>
    <meta charset="UTF-8" >
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@5" rel="stylesheet" type="text/css" />
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

    <link href="https://cdn.jsdelivr.net/npm/daisyui@5/themes.css" rel="stylesheet" type="text/css" />
</head>
<body  class="flex flex-col min-h-full">
    <x-nav />

<main class="flex-grow">
    @session('status')
        <div class="alert alert-success max-w-5xl mx-auto mt-4">{{ $value }}</div>
    @endsession
    
    {{ $slot }}
</main>
    <x-footer/>

</body>
</html>