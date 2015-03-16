@extends ('master')

@section ('head')

Create a booking

@stop

@section ('content')

<div id = "form">
    {{ Form::open(array('route' => 'booking.store'))}}
<div>

    {{ Form::label('email', 'Email') }}
    {{ Form::text('email') }}
   
</div>

<div>

    {{ Form::label('name', 'Name') }}
    {{ Form::text('name') }}

</div>

<div>

    {{ Form::label('phone', 'Phone') }}
    {{ Form::text('phone') }}

</div>

<div>

    {{ Form::label('start', 'Start Date') }}
    {{ Form::text('start') }}

</div>

<div>

    {{ Form::label ('end', 'End Date') }}
    {{ Form::text('end') }}

</div>

    <div> {{ Form::submit ('Find Kit') }} </div>
    <div> {{ Form::submit ('Book it') }} </div>

    {{Form::close()}}

</div>

@stop
