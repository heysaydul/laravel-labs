<x-layout title="Articles">
    <h1 class="text-3xl font-bold my-6 text-center">Articles</h1>

    <div class="overflow-x-auto max-w-5xl mx-auto px-4">
        <table class="table table-zebra">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Title</th>
                    <th>Short description</th>
                    <th>Preview</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($articles as $article)
                    <tr>
                        <td>{{ $article->date->format('d.m.Y') }}</td>
                        <td>{{ $article->title }}</td>
                        <td>{{ $article->short_description }}</td>
                        <td>
                            <img src="{{ asset('element/' . $article->preview_image) }}"
                                 alt="{{ $article->title }}"
                                 class="w-32 rounded">
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-layout>