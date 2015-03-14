@extends ('master')

@section ('content')

    <div>
    <p> Create a Booking </p>
    </div>

<div id = "form">
    {{ Form::open(array['route' => 'booking.store'])}}
<div>

    {{ Form::label('email', 'Email') }}
    {{ Form::email('email') }}
   
</div>

<div>

    {{ Form::label('name', 'Name') }}
    {{ Form::name('name') }}

</div>

<div>

    {{ Form::label('phone', 'Phone') }}
    {{ Form::phone('phone') }}

</div>

<div>

    {{ Form::startdate('start', 'Start Date') }}
    {{ Form::start('start') }}

</div>

<div>

    {{ Form::enddate ('end', 'End Date') }}
    {{ Form::end('end') }}

</div>

    <div> {{ Form::submit ('Find Kit') }} </div>
    <div> {{ Form::submit ('Book it') }} </div>

    {{Form::close()}}
@stop
