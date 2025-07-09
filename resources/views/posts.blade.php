@extends('layaut')

@section('header')
    <header class="bg-gray-800 text-white p-4 text-center">
        <h1 class="text-2xl font-bold">Mi Blog</h1>
    </header>
    <header class="bg-gray-800 text-white p-4 text-center">
           <a href="{{ url('/posts/create') }}" class="text-blue-600 hover:underline mb-4 inline-block">Crear nuevo posts</a>
    </header>
@endsection

@section('content')
    <h1 class="text-3xl font-bold mb-8 text-center">LOS POST DE MI PAGE</h1>
    @foreach ($posts as $item)
        <div class="bg-white rounded-lg shadow-md overflow-hidden flex flex-col mx-auto mb-6" style="max-width: 400px;">
            <img src="{{ $item->images->url ?? "hola" }}" alt="Post image" class="w-400 h-80 object-cover">
            
            <div class="p-6 flex-1 flex flex-col">
            <h2 class="text-xl font-semibold mb-2">{{ $item->title }}</h2>
            <p class="text-gray-700 mb-4 flex-1">{{ $item->body }}</p>
            </div>
        </div>
    @endforeach
@endsection
