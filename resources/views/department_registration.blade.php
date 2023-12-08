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

    <form action="department_fetch" method="post" enctype="multipart/form-data">
      @csrf
        Select your department:
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
        </select>
       

       <br><br>
        <input type="submit" value="Register" name="reg" id="reg1">
    </form>
</body>
</html>
