<html>

<body>

    <head>
        <title>Edit From</title>

    </head>
</body>

</html>
<?php
if ($reg_data->count() == 0) {
    echo "recode not found";
} else {?>

@foreach ($reg_data as $r1)
@php
$h = explode(',', $r1['hobbies']);
@endphp

<form action="{{ URL::to('/') }}/Update_registration" method="post" enctype="multipart/form-data">

    @csrf
    Enter Name: <input type="text" name="fn" id="fn1" value="{{ $r1['fullname'] }}">
    <br>
    <span style="color:red">
        @error('fn')
        {{ $message }}
        @enderror
    </span>
    <br>
    Enter Name: <input type="text" name="ln" id="ln1" value="{{ $r1['lastname'] }}">
    <br>
    <span style="color:red">
        @error('ln')
        {{ $message }}
        @enderror
    </span>
    <br>
    Enter Email: <input type="email" name="em" id="em1" value="{{ $r1['email'] }}">
    <!-- readonly -->
    <br>
    <span style="color:red">
        @error('em')
        {{ $message }}
        @enderror
    </span>
    <br>
    Select your Country:
    <select name="country" id="country1">
        <option value="india " @if ($r1 ['country']=='india' ) selected @endif>india</option>
        <option value="Iran" @if ($r1 ['country']=='Iran' ) selected @endif>Iran</option>
        <option value="japan" @if ($r1 ['country']=='japan' ) selected @endif>japan</option>
        <option value="Bhutan" @if ($r1 ['country']=='Bhutan' ) selected @endif>Bhutan</option>
        <span style="color:red">
            @error('country')
            {{ $message }}
            @enderror
        </span>
    </select>
    <br><br>
    Select your State:
    <select name="state" id="state1">
        <option value="Gujarat" @if ($r1['state']=='Gujarat' ) selected @endif>Gujarat </option>
        <option value="	Assam" @if ($r1['state']=='Assam' ) selected @endif>Assam </option>
        <option value="Andhra Pradesh" @if ($r1['state']=='Andhra Pradesh' ) selected @endif>Andhra Pradesh </option>
        <option value="Goa" @if ($r1['state']=='Goa' ) selected @endif>Goa </option>
        <span style="color:red">
            @error('state')
            {{ $message }}
            @enderror
        </span>
    </select>
    <br><br>
    Select your Department:
    <select name="department" id="department1">
        <option value="engineering"  @if (optional($r1->department)->department_name=='engineering' ) selected
            @endif> engineering </option>
        <option value="electrical"   @if (optional($r1->department)->department_name=='electrical' ) selected
            @endif> electrical </option>
        <option value="civil"        @if (optional($r1->department)->department_name=='civil' ) selected @endif>
            civil </option>
        <option value="mechanical"   @if (optional($r1->department)->department_name=='mechanical' ) selected
            @endif> mechanical </option>
        <span style="color:red">
            @error('department')
            {{ $message }}
            @enderror
        </span>
    </select>
    <br><br>
    Select Gender:
    <input type="radio" name="gender" id="gender1" value="Male" @if ($r1['gender']=='Male' ) checked @endif /> Male
    <input type="radio" name="gender" id="gender2" value="Female" @if ($r1['gender']=='Female' ) checked @endif />
    Female
    <br>
    <span style="color:red">
        @error('gender')
        {{ $message }}
        @enderror
    </span>
    <br><br>
    Select your Hobby:
    <br>
    <input type="checkbox" name="hobby[]" id="hobby1" value="cricket" @if (is_array($h) && in_array('cricket', $h))
        checked @endif />cricket
    <br>
    <input type="checkbox" name="hobby[]" id="hobby1" value="volleyball" @if (is_array($h) && in_array('volleyball',
        $h)) checked @endif />volleyball
    <br>
    <input type="checkbox" name="hobby[]" id="hobby1" value="football" @if (is_array($h) && in_array('football', $h))
        checked @endif />football
    <br>
    <input type="checkbox" name="hobby[]" id="hobby1" value="chess" @if (is_array($h) && in_array('chess', $h)) checked
        @endif />chess
    <br>
    <span style="color:red">
        @error('hobby')
        {{ $message }}
        @enderror
    </span>
    <br>
    <img src="{{ URL::to('/') }}/images/profile_pictures/{{ $r1['pic'] }}" height="90px" width="70px" />
    <br>
    Select Profile Picture: <input type="file" name="pic" id="pic1">
    <br>
    <span style="color:red">
        @error('pic')
        {{ $message }}
        @enderror
    </span>
    <br>

    <input type="hidden" value="{{$r1['id']}}" name="id" id="id">

    <input type="submit" value="Update" name="reg" id="reg1">
    <a href="{{ URL::to('/') }}/display_data"><input type="button" value="back"></a><br><br>
    </f orm>
    @endforeach

    <?php
}
?>