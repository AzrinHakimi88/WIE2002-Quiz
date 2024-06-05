{{-- main layout for the website --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>WIE2002-{{$pageTitle}}</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <nav class="flex h-[80px] gap-8 justify-center items-center">
        <x-nav-link class="px-4 py-2 {{request()->is('/') ? 'bg-blue-500 text-white' : ''}}" href="/">Home</x-nav-link>
        <x-nav-link class="px-4 py-2 {{request()->is('q1') ? 'bg-blue-500 text-white' : ''}}" href="{{route('q1')}}">Question 1</x-nav-link>
        <x-nav-link class="px-4 py-2 {{request()->is('q2') ? 'bg-blue-500 text-white' : ''}}" href="/q2">Question 2</x-nav-link>
        <x-nav-link class="px-4 py-2 {{request()->is('q3') ? 'bg-blue-500 text-white' : ''}}" href="/q3">Question 3</x-nav-link>
    </nav>
    <main >
        {{$slot}} {{-- the content between x-layout tags will be rendered here --}}        
    </main>
</body>
</html>