

<a href="{{ route('upload.form') }}">Ir para o Formulário de Upload</a>

@foreach ($images as $image)
    <img src="{{ asset('storage/app/public/' . $image->path) }}" alt="{{ $image->name }}">
@endforeach



