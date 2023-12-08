<html >
<head>
    <title>department Display Data
    <img src="6572ce0380bccfb.png" alt="bas">

    </title>
</head>
<a href="{{ URL::to('/') }}/department_registration"><input type="button" value="Insert Data" ></a><br><br>
<table border="1">
    <tr>
       <th>ID</th>
        <th>Department </th> 
        <th>Edit</th>
        <th>Delete</th>
      
    </tr>
    @foreach ($department as $d1)       
    <tr>
    <td>{{ $d1['id']}}</td>
         <td>{{$d1['department_name'] }} </td>
         
         <td><a href="{{ URL::to('/')}}/department_edit_user/{{ $d1['id'] }}" > <input type="button" value="Edit Data"   ></a></td>
         <td><a href="{{ URL::to('/')}}/delete_user1/{{ $d1['id'] }}">   <input type="button" value="Delete Data"></a></td>
     </tr>
   @endforeach
</table>
</html>