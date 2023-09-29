{!! Form::open(['route' => 'upload.image', 'files' => true]) !!}
{!! Form::file('image') !!}
{!! Form::submit('Upload') !!}
{!! Form::close() !!}
