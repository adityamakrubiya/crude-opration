<!DOCTYPE html>
<html lang="en">

<head>
    <title>Register From</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>

<body>

    @if (session('success'))
    <p style="color:green">{{ session('success') }}</p>
    @endif
    @if (session('error'))
    <p style="color:red">{{ session('error') }}</p>
    @endif

    <form action="FetchRegister" method="post" enctype="multipart/form-data">
        @csrf
        Enter Frist Name: <input type="text" name="fn" id="fn1" value="{{ old('fn') }}">
        <br>
        <span style="color:red">
            @error('fn')
            {{ $message }}
            @enderror
        </span>
        <br>
        Enter Lsat Name: <input type="text" name="ln" id="ln1" value="{{ old('ln') }}">
        <br>
        <span style="color:red">
            @error('ln')
            {{ $message }}
            @enderror
        </span>
        <br>
        Enter Email: <input type="email" name="em" id="em1" value="{{ old('em') }}">
        <br>
        <span style="color:red">
            @error('em')
            {{ $message }}
            @enderror
        </span>
        <br>
        Select your country:
        <select name="country" id="country1">
            <option value="india "  @if (old('country')=='india' )   selected @endif>india  </option>
            <option value="Iran"    @if (old('country')=='Iran' )    selected @endif>Iran   </option>
            <option value="japan"   @if (old('country')=='japan' )   selected @endif>japan  </option>
            <option value="Bhutan"  @if (old('country')=='Bhutan' )  selected @endif>Bhutan </option>
            <span style="color:red">
                @error('country')
                {{ $message }}
                @enderror
            </span>
        </select>
        <br><br>
        Select your State:
        <select name="state" id="state1">
            <option value="gujarat"        @if (old('state')=='gujarat' )        selected @endif>gujarat        </option>
            <option value="Assam"          @if (old('state')=='Assam' )          selected @endif>Assam          </option>
            <option value="Andhra Pradesh" @if (old('state')=='Andhra Pradesh' ) selected @endif>Andhra Pradesh </option>
            <option value="Goa"            @if (old('state')=='Goa' )            selected @endif>Goa            </option>
            <span style="color:red">
                @error('state')
                {{ $message }}
                @enderror
            </span>
        </select>
        <br><br>
        <!-- Select your department:
        <select name="department" id="department1">
            <option value="engineering"   @if (old('department')=='engineering' )  selected @endif>engineering</option>
            <option value="electrical"    @if (old('department')=='electrical'  )  selected @endif>electrical </option>
            <option value="civil"         @if (old('department')=='civil'       )  selected @endif>civil      </option>
            <option value="mechanical"    @if (old('department')=='mechanical'  )  selected @endif>mechanical </option>
            <span style="color:red">
                @error('department')
                {{ $message }}
                @enderror
            </span>
        </select> -->
        Select your department:
                    <select  id="country-dropdown" >
                        @foreach ($department_data as $d1)
                        <option value=""> {{$d1->department_name}} </option>
                        @endforeach
                    </select>

        <br><br>
        Select Gender:
        <input type="radio" name="gender" id="gender1" value="Male"   @if (old('gender')=='Male' ) checked @endif    /> Male
        <input type="radio" name="gender" id="gender2" value="Female" @if (old('gender')=='Female' ) checked @endif  /> Female
        <br>
        <span style="color:red">
            @error('gender')
            {{ $message }}
            @enderror
        </span>
        <br>
        Select your Hobby:
        <br>
        <input type="checkbox" name="hobby[]" id="hobby1" value="cricket" @if (is_array(old('hobby')) &&
            in_array('cricket', old('hobby'))) checked @endif />cricket
        <br>
        <input type="checkbox" name="hobby[]" id="hobby1" value="volleyball" @if (is_array(old('hobby')) &&
            in_array('volleyball', old('hobby'))) checked @endif />volleyball
        <br>
        <input type="checkbox" name="hobby[]" id="hobby1" value="football" @if (is_array(old('hobby')) &&
            in_array('football', old('hobby'))) checked @endif />football
        <br>
        <input type="checkbox" name="hobby[]" id="hobby1" value="chess" @if (is_array(old('hobby')) && in_array('chess',
            old('hobby'))) checked @endif />chess
        <br>
        <span style="color:red">
            @error('hobby')
            {{ $message }}
            @enderror
        </span>
        <br>
        Select Profile Picture: <input type="file" name="pic" id="pic1">
        <br>
        <span style="color:red">
            @error('pic')
            {{ $message }}
            @enderror
        </span>
        <br>
        <input type="submit" value="Register" name="reg" id="reg1">
    </form>
</body>
</html>
