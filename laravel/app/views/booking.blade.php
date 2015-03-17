@extends ('master')
@section ('content')
<div id = "form">
    {{ Form::open(array('route' => 'booking.store'))}}
    <div>
        {{ Form::label('email', 'Email') }}
        {{ Form::text('email') }}
    </div><div>
        {{ Form::label('name', 'Name') }}
        {{ Form::select('name', array('B' => 'Bob', 'A' => 'Annie')) }}
        {{ Form::submit('Add User') }}
    </div><div>
        {{ Form::label('start', 'Start Date') }}
        {{ Form::text('start') }}
    </div><div>
        {{ Form::label ('end', 'End Date') }}
        {{ Form::text('end') }}
    </div><div>
        {{ Form::label ('kitID', 'Kit ID') }}
        {{ Form::text ('Kit ID') }}
        {{ Form::submit ('Find it!') }}
    </div><div>
        {{ Form::submit ('Book it!') }}
    </div>
    {{Form::close()}}
</div>
@stop