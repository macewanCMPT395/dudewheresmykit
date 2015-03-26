@extends ('master')
<script type="text/javascript">
    function addUser(){
        var userAdd = document.getElementById('userAdd');
        var option = userAdd.options[userAdd.selectedIndex];
        if(option.value == -1){alert('Please select a user'); return false;}
        var elem = document.createElement('li');
        elem.id = option.value;
        elem.name = userAdd.options[userAdd.selectedIndex].text;
        elem.innerHTML = '<label style="width:200px;">' + elem.name + '</label><input style="margin-left:5px;" type="button" value="Remove" onclick="return removeUser(' + option.value + ');">';

        var parent = document.getElementById("names");
        parent.insertBefore(elem, parent.children[parent.children.length - 1]);
        userAdd.remove(userAdd.selectedIndex);

        document.getElementById("users").value += elem.id + ",";
    }
    function removeUser(id){
        var elem = document.createElement('option');
        var user = document.getElementById(id);
        elem.value = user.id;
        elem.text = user.name;
        user.parentNode.removeChild(user);
        var userAdd = document.getElementById('userAdd');

        var input = document.getElementById("users");
        var index = input.value.indexOf(',' + elem.value + ',') + 1;
        input.value = input.value.substring(0, index) + input.value.substring(index + 1 + elem.value.length);

        for(var i = 1; i < userAdd.options.length; ++i){
            if(elem.text < userAdd.options[i].text){
                userAdd.add(elem, userAdd.options[i]);
                return;
            }
        }
        userAdd.add(elem);
    }

    function getHTMLDate(date){
        var d = date.getDate();
        var m = date.getMonth() + 1;
        if(d < 10) d = "0" + d;
        if(m < 10) m = "0" + m;
        return date.getFullYear() + '-' + m + '-' + d;
    }

    function checkValidDate(elem){
        {
            var date = new Date(elem.value);
            var curDate = new Date;
            if(date.getTime() <= curDate.getTime()){
                alert("You can not select a date prior, or equal to, todays date.");
                if(elem.name == "startDate")
                    date.setTime(curDate.getTime() + 86400000);
                else
                    date.setTime((new Date(document.getElementById("startDate").value)).getTime() + 86400000);

                elem.value = getHTMLDate(date);
                return;
            }
        }
        var elems = new Array(2);
        var changeIndex;

        if(elem.name == "startDate"){
            elems[0] = elem;
            elems[1] = document.getElementById('endDate');
            changeIndex = 1;
        }else{
            elems[0] = document.getElementById('startDate');
            elems[1] = elem;
            changeIndex = 0;
        }

        var dates = [new Date(elems[1].value), new Date(elems[0].value)];

        if(dates[1] > dates[0]){
            //alert("You can not select a start date prior to the end date. End date moved to start date");
            alert('The start date cannot be after the end date.');
            dates[changeIndex].setTime(dates[changeIndex].getTime() + 86400000);
            elems[changeIndex].value = getHTMLDate(dates[changeIndex]);
        }
    }
    function checkValid(){
        //Need to check for no additional users added?
        var kit = document.getElementById('kit');
        if(kit.options[kit.selectedIndex].value == "-1"){
            alert('Please select a kit!');
            return false;
        }
        return true;
    }
</script>
@section ('content')
<div id = "form">
    {{ Form::open(array('route' => 'booking.store', 'onsubmit' => 'return checkValid();')) }}
    <div>
        {{ Form::label('name', 'Owner:') }}
        {{ Form::label('name', Auth::User()->getName()) }}
    </div><div>
        <input type="hidden" id="users" name="users" value=",">
        {{ Form::label('name', 'Name:') }}
        <ul id="names" style="list-style-type:none;padding-left:136px">
            <li style="margin-left:0px;">
                <?php
                    $users = array();
                    foreach(User::whereRaw("id is not ? and branch_id = ?", array(Auth::User()->id, [Auth::User()->branch_id]))->get() as $user){
                        array_push($users, $user->getName() . ":" . $user->id);
                    }
                    asort($users);
                    $str = '<select id="userAdd"><option value="-1">Add another user</option>';
                    foreach($users as $user){
                        $arr = explode(':', $user);
                        $str .= "<option value=\"$arr[1]\">$arr[0]</option>";
                    }
                    echo $str . '</select>';
                ?>
                <input type="button" value="Add" onclick="return addUser();">
            </li>
        </ul>
    </div><div>
        {{ Form::label('start', 'Start Date:') }}
        <input name="startDate" id="startDate" type="date" value={{ date('Y-m-d', time() + 86400) }} onblur="checkValidDate(this)">
        <!-- ONLY WORKS ON Chrome && OPERA-->
    </div><div>
        {{ Form::label ('end', 'End Date:') }}
        <input name="endDate" id="endDate" type="date" value={{ date('Y-m-d', time() + 86400) }} onblur="checkValidDate(this)">
        <!-- ONLY WORKS ON Chrome && OPERA-->
    </div><div>
        {{ Form::label ('kitID', 'Kit ID:') }}
        <?php
            $kits = array();
            foreach(Kit::all() as $kit){
                array_push($kits, $kit->description . '::' . $kit->id);
            }
            asort($kits);
            $kitid = isset($kitId) ? $kitId : -1;
            $str = '<select name="kit" id="kit"><option value="-1">Pick a kit</option>';
            foreach($kits as $kit){
                $arr = explode('::', $kit);
                $selected = "";
                if($kitid == $arr[1])
                    $selected = "selected";
                $str .= "<option $selected value=\"$arr[1]\">$arr[0]</option>";
            }
            echo $str . "</select> or ";
        ?>
        <input type="button" value="Find One!" onclick="window.location = '/kits'">
    </div><div>
        <input type="submit" onsubmit="return 0;">
    </div>
    {{Form::close()}}
</div>
@stop
