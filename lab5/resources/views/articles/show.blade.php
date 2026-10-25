<x-layout :title="$article->title">
    <div class="max-w-4xl mx-auto px-4 py-6">
        <p class="text-sm opacity-70">{{ $article->date->format('d.m.Y') }}</p>
        <h1 class="text-3xl font-bold mb-4">{{ $article->title }}</h1>

        <img src="{{ asset('element/' . $article->full_image) }}"
             alt="{{ $article->title }}" class="w-full rounded mb-4">

        <p class="text-lg">{{ $article->description }}</p>

        <div class="mt-6 flex gap-2">
            <a href="{{ route('articles.index') }}" class="btn">Back</a>
            <a href="{{ route('articles.edit', $article) }}" class="btn btn-primary">Edit</a>
        </div>
    </div>
</x-layout>
