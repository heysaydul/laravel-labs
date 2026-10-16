<x-layout title="Gallery">
    <div class="max-w-4xl mx-auto px-4 py-6">
        <h1 class="text-3xl font-bold mb-4">{{ $article['title'] }}</h1>

        <img src="{{ asset('element/' . $article['full_image']) }}" 
            alt="{{ $article['title'] }}"
            class="w-full rounded">
        <a href="/" class="btn mt-4">Back</a>
    </div>
</x-layout>