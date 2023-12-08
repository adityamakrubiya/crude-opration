<form action="">
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

        <input type="submit" value="Register" name="reg" id="reg1">

        </form>