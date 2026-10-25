<x-layout title="Articles">
    <div class="max-w-5xl mx-auto px-4 py-6">
        <div class="flex justify-between items-center mb-4">
            <h1 class="text-3xl font-bold">Articles</h1>
            <a href="{{ route('articles.create') }}" class="btn btn-primary">New article</a>
        </div>

        <div class="overflow-x-auto">
            <table class="table table-zebra">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Title</th>
                        <th>Short description</th>
                        <th>Preview</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($articles as $article)
                        <tr>
                            <td>{{ $article->date->format('d.m.Y') }}</td>
                            <td>{{ $article->title }}</td>
                            <td>{{ $article->short_description }}</td>
                            <td>
                                <a href="{{ route('articles.show', $article) }}">
                                    <img src="{{ asset('element/' . $article->preview_image) }}"
                                         alt="{{ $article->title }}" class="w-24 rounded">
                                </a>
                            </td>
                            <td>
                                <div class="flex gap-2">
                                    <a href="{{ route('articles.edit', $article) }}" class="btn btn-sm">Edit</a>
                                    <form action="{{ route('articles.destroy', $article) }}" method="POST"
                                          onsubmit="return confirm('Delete this article?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-error">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="5" class="text-center">No articles yet.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-4">
            {{ $articles->links() }}
        </div>
    </div>
</x-layout>