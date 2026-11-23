<x-layout :title="$article->title">
    <div class="max-w-4xl mx-auto px-4 py-6">
        <p class="text-sm opacity-70">{{ $article->date->format('d.m.Y') }}</p>
        <h1 class="text-3xl font-bold mb-4">{{ $article->title }}</h1>

        <img src="{{ asset('element/' . $article->full_image) }}"
             alt="{{ $article->title }}" class="w-full rounded mb-4">

        <p class="text-lg">{{ $article->description }}</p>

        <div class="mt-6 flex gap-2">
            <a href="{{ route('articles.index') }}" class="btn">Back</a>
            @can('update', $article)
                <a href="{{ route('articles.edit', $article) }}" class="btn btn-primary">Edit</a>
            @endcan
            
        </div>
    </div>

    <div class="mt-10">
        <h2 class="text-2xl font-bold mb-4">Comments ({{ $article->comments->count() }})</h2>

        @forelse ($article->comments as $comment)
            <div class="card bg-base-200 mb-3">
                <div class="card-body p-4">
                    <div class="flex justify-between">
                        <span class="font-medium">{{ $comment->user->name }}</span>
                        <span class="text-sm opacity-70">{{ $comment->created_at->format('d.m.Y H:i') }}</span>
                    </div>
                    <p>{{ $comment->body }}</p>

                    @can('delete-comment', $comment)
                        <form action="{{ route('comments.destroy', $comment) }}" method="POST" class="mt-2">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-xs btn-error">Delete</button>
                        </form>
                    @endcan
                </div>
            </div>
        @empty
            <p>No comments yet.</p>
        @endforelse

        @auth
            <form action="{{ route('comments.store', $article) }}" method="POST" class="mt-4">
                @csrf
                <textarea name="body" rows="3" class="textarea w-full" placeholder="Your comment">{{ old('body') }}</textarea>
                @error('body') <p class="text-error text-sm">{{ $message }}</p> @enderror
                <button type="submit" class="btn btn-primary mt-2">Add comment</button>
            </form>
        @else
            <p class="mt-4"><a href="{{ route('login') }}" class="link">Log in</a> to comment.</p>
        @endauth
    </div>
</x-layout>
