<x-layout title="Edit article">
    <div class="max-w-2xl mx-auto px-4 py-6">
        <h1 class="text-3xl font-bold mb-4">Edit article</h1>

        <form action="{{ route('articles.update', $article) }}" method="POST">
            @csrf
            @method('PUT')
            @include('articles._form')
            <div class="mt-6 flex gap-2">
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('articles.show', $article) }}" class="btn">Cancel</a>
            </div>
        </form>
    </div>
</x-layout>
