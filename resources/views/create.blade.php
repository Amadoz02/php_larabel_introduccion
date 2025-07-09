@extends('layaut')
@section('header')
    <header class="bg-gray-800 text-white p-4 text-center">
        <h1 class="text-2xl font-bold">Mi Blog</h1>
    </header>
    <header class="bg-gray-800 text-white p-4 text-center">
        <a href="{{ url('/posts') }}" class="text-blue-600 hover:underline mb-4 inline-block">lista de posts</a>
    </header>
@endsection
@section('content')

    <form id="postForm" action="{{ route('posts.store') }}" method="POST" class="max-w-lg mx-auto bg-white p-6 rounded-lg shadow-md" enctype="multipart/form-data" novalidate>
        @csrf

        <div id="error-message" class="mb-4 text-red-500 text-sm"></div>

        <div class="mb-4">
            <label for="title" class="block text-sm font-medium text-gray-700">Título</label>
            <input type="text" name="title" id="title" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500" value="{{ old('title') }}">
            @error('title')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label for="body" class="block text-sm font-medium text-gray-700">Contenido</label>
            <input name="body" id="body" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500" value="{{ old('body') }}">
            @error('body')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label for="image" class="block text-sm font-medium text-gray-700">Imagen</label>
            <input type="file" name="image" id="image" class="mt-1 block w-full text-gray-700">
            @error('image')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>
        <button type="submit" class="w-full bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700">Crear Post</button>
    </form>

<script>
document.getElementById('postForm').addEventListener('submit', function(e) {
    let valid = true;
    let errorMsg = '';

    const title = document.getElementById('title').value.trim();
    const body = document.getElementById('body').value.trim();
    const image = document.getElementById('image').value;

    if (title.length === 0) {
        valid = false;
        errorMsg += 'El título es obligatorio.<br>';
    } else if (title.length > 255) {
        valid = false;
        errorMsg += 'El título no debe superar 255 caracteres.<br>';
    }
    if (!body) {
        valid = false;
        errorMsg += 'El contenido es obligatorio.<br>';
    }
    if (!image) {
        valid = false;
        errorMsg += 'La imagen es obligatoria.<br>';
    }

    if (!valid) {
        e.preventDefault();
        document.getElementById('error-message').innerHTML = errorMsg;
    }
});
</script>
@endsection