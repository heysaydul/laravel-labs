<x-layout title="New article">
    <div class="max-w-2xl mx-auto px-4 py-6">
        <h1 class="text-3xl font-bold mb-4">New article</h1>

        <form action="{{ route('articles.store') }}" method="POST">
            @csrf
            @include('articles._form')
            <div class="mt-6 flex gap-2">
                <button type="submit" class="btn btn-primary">Save</button>
                <a href="{{ route('articles.index') }}" class="btn">Cancel</a>
            </div>
        </form>
    </div>
</x-layout>
