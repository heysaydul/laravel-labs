<x-layout title="Access denied">
    <div class="hero min-h-[60vh]">
        <div class="text-center">
            <h1 class="text-6xl font-bold">403</h1>
            <p class="py-4 text-xl">{{ $exception->getMessage() ?: 'Access denied.' }}</p>
            <a href="/" class="btn">Home</a>
        </div>
    </div>
</x-layout>