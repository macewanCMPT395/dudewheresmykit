@extends ('master')
@section ('content')
<div id = "form">
    {{ Form::open(array('route' => 'booking.store'))}}
    <div>
        {{ Form::label('name', 'Owner:') }}
        {{ Form::label('name', Auth::User()->first_name . " " . Auth::User()->last_name) }}
    </div><div>
        {{ Form::label('name', 'Name:') }}
        <?php
            $users = array('-1' => 'Add another user');
            foreach(User::whereRaw('branch_id = ?', [Auth::User()->branch_id])->get() as $user){
                $users[$user->id] = $user->first_name . " " . $user->last_name;
            }
            unset($users[Auth::User()->id]);
            echo Form::select('name', $users);
        ?>
        {{ Form::submit('Add User') }}
    </div><div>
        {{ Form::label('start', 'Start Date:') }}
        {{ Form::text('start') }}
    </div><div>
        {{ Form::label ('end', 'End Date:') }}
        {{ Form::text('end') }}
    </div><div>
        {{ Form::label ('kitID', 'Kit ID:') }}
        {{ Form::text ('Kit ID') }}
        {{ Form::submit ('Find it!') }}
    </div><div>
        {{ Form::submit ('Book it!') }}
    </div>
    {{Form::close()}}
</div>
@stop