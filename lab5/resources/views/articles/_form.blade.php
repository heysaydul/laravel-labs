<div class="flex flex-col gap-4">
    <div>
        <label class="label">Date</label>
        <input type="date" name="date" class="input w-full"
               value="{{ old('date', $article->date?->format('Y-m-d')) }}">
        @error('date') <p class="text-error text-sm">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="label">Title</label>
        <input type="text" name="title" class="input w-full"
               value="{{ old('title', $article->title) }}">
        @error('title') <p class="text-error text-sm">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="label">Short description</label>
        <input type="text" name="short_description" class="input w-full"
               value="{{ old('short_description', $article->short_description) }}">
        @error('short_description') <p class="text-error text-sm">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="label">Description</label>
        <textarea name="description" rows="6" class="textarea w-full">{{ old('description', $article->description) }}</textarea>
        @error('description') <p class="text-error text-sm">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="label">Preview image</label>
        <select name="preview_image" class="select w-full">
            @foreach (\App\Models\Article::PREVIEWS as $file)
                <option value="{{ $file }}" @selected(old('preview_image', $article->preview_image) === $file)>{{ $file }}</option>
            @endforeach
        </select>
        @error('preview_image') <p class="text-error text-sm">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="label">Full image</label>
        <select name="full_image" class="select w-full">
            @foreach (\App\Models\Article::FULLS as $file)
                <option value="{{ $file }}" @selected(old('full_image', $article->full_image) === $file)>{{ $file }}</option>
            @endforeach
        </select>
        @error('full_image') <p class="text-error text-sm">{{ $message }}</p> @enderror
    </div>
</div>