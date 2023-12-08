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


<form action="{{ URL::to('/') }}/update_department" method="post" enctype="multipart/form-data">
@csrf
<select name="department" id="department1">
        <option value="engineering"  @if ($r1 ['department']=='engineering' ) selected @endif> engineering </option>
        <option value="electrical"   @if ($r1 ['department']=='electrical' )  selected @endif> electrical </option>
        <option value="civil"        @if ($r1 ['department']=='civil' )       selected @endif> civil </option>
        <option value="mechanical"   @if ($r1 ['department']=='mechanical' )  selected @endif> mechanical </option>
        <span style="color:red">
            @error('department')
            {{ $message }}
            @enderror
        </span>
    </select>
    <input type="hidden" value="{{$r1['id']}}" name="id" id="id">
<br><br>

    <input type="submit" value="Update" name="reg" id="reg1">
    <a href="{{ URL::to('/') }}/department_data"><input type="button" value="back"></a><br><br>
    </form>
    @endforeach

    <?php
}
?>