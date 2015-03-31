@extends ('master')
<style type="text/css">
.AddedUser {
    display:none;
}
</style>
<script type="text/javascript">
    function addUser(){
        var userAdd = document.getElementById('userAdd');
        var option = userAdd.options[userAdd.selectedIndex];
        if(option.value == -1){alert('Please select a user'); return false;}
        var elem = document.createElement('li');
        elem.setAttribute("style", "margin-left:0;");
        elem.id = option.value;
        elem.name = userAdd.options[userAdd.selectedIndex].text;
        elem.innerHTML = '<label style="width:200px;padding-right:4px">' + elem.name + '</label><input type="button" value="Remove" onclick="return removeUser(' + option.value + ');">';
        option.className = "AddedUser";
        var parent = document.getElementById("names");
        parent.insertBefore(elem, parent.children[parent.children.length - 1]);
        document.getElementById("users").value += elem.id + ",";
        userAdd.selectedIndex = 0;
    }
    function removeUser(id){
        var user = document.getElementById(id);
        user.parentNode.removeChild(user);

        var addedUsers = document.getElementsByClassName("AddedUser");
        for (var i = addedUsers.length - 1; i >= 0; i--) {
            if(addedUsers[i].value == user.id){
                addedUsers[i].className = "";
                break;
            }
        };
    }
    function fixUserList(check){
        var elems = document.getElementsByName("OtherBranch");
        for (var i = elems.length - 1; i >= 0; i--) {
            elems[i].style.display = check.checked ? "" : "none";
        }
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
        {{ Form::label('name', 'Creator:') }}
        {{ Form::label('name', Auth::User()->getName()) }}
    </div><div>
        <input type="hidden" id="users" name="users" value=",">
        <label for="name" style="vertical-align:top;">Additional:</label>
        <ul id="names" style="list-style-type:none;display:inline-block;">
            <li style="margin-left:0px;">
                <?php
                    function getSortedBranch($branch_id){
                        $users = array();
                        foreach(User::whereRaw("id is not ? and branch_id = ?", array(Auth::User()->id, $branch_id))->get() as $user){
                            array_push($users, $user->getName() . ":" . $user->id);
                        }
                        asort($users);
                        return $users;
                    }
                    $main_branch=Auth::User()->branch_id;
                    $str = '<select id="userAdd"><option value="-1">Add another user</option>';
                    foreach (Branch::all() as $branch) {
                        $name = $branch->id == $main_branch ? "name=\"MainBranch\"" : "name=\"OtherBranch\" style=\"display:none;\"";
                        $str .= "<option id=\"userAdd$branch->id\" name=\"OtherBranch\" style=\"display:none;\" value=\"-1\">==$branch->code - $branch->name==</option>";
                        foreach(getSortedBranch($branch->id) as $user){
                            $arr = explode(':', $user);
                            $str .= "<option $name value=\"$arr[1]\">$arr[0]</option>";
                        }
                    }
                    echo $str . '</select>';
                ?>
                <input type="button" value="Add" onclick="return addUser();">
                <input style="vertical-align:middle;" type="checkbox" id="branch_allow" onclick="fixUserList(this)"><span style="font-size:10px;"> Show Other Branches</span>
            </li>
        </ul>
    </div><div>
        {{ Form::label('start', 'Start Date:') }}
        <input name="startDate" id="startDate" type="date" value={{ date('Y-m-d', time() + 86400) }} onblur="checkValidDate(this)">
        <!-- ONLY WORKS ON Chrome && OPERA-->
    </div><div>
        {{ Form::label('end', 'End Date:') }}
        <input name="endDate" id="endDate" type="date" value={{ date('Y-m-d', time() + 86400) }} onblur="checkValidDate(this)">
        <!-- ONLY WORKS ON Chrome && OPERA-->
    </div><div>
        {{ Form::label('event', 'Event:') }}
        {{ Form::text('event') }}
    </div><div>
        {{ Form::label('Kit Type', 'Kit Type:') }}
        <?php
            $kits = array();
            foreach(KitType::all() as $kit){
                array_push($kits, $kit->name . '::' . $kit->id);
            }
            asort($kits);
            $kitid = isset($kitId) ? Kit::find($kitId)->type_id : -1;
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
    </div><div style="width:100%;">
        <input type="submit" onsubmit="return 0;" style="width:100px;left:50%;position:relative;margin-top:1em;margin-bottom:0.5em;margin-left:-50px">
    </div>
    {{Form::close()}}
</div>
@stop
