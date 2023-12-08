<html >
<head>
    <title>Display Data</title>
</head>
    <a href="{{ URL::to('/') }}/RegisterForm"><input type="button" value="Insert Data" ></a><br><br>
            
<table border="1">
    <tr>
        <th>Id         </th>
        <th>Fullname   </th>
        <th>Lastname   </th>
        <th>Email      </th>
        <th>Country    </th>
        <th>State      </th>
        <th>Department </th> 
        <th>Gender     </th>
        <th>Hobbies    </th>
        <th>Picture    </th> 
        <th>Edit       </th>
        <th>Delete     </th>
    </tr>
    @foreach ($registrations as $registration)       
     <tr>
         <td>{{ $registration['id']       }}                            </td>
         <td>{{ $registration['fullname'] }}                            </td>
         <td>{{ $registration['lastname'] }}                            </td>
         <td>{{ $registration['email']    }}                            </td>
         <td>{{ $registration['country']  }}                            </td>
         <td>{{ $registration['state']    }}                            </td>
         <td>{{ optional($registration->department)->department_name }} </td>
            <!-- <td>{{$registration['department_id'] }} </td> -->
         <td>{{ $registration['gender']   }}                            </td>
         <td>{{ $registration['hobbies']  }}                            </td>
         <td><img src="{{ URL::to('/') }}/Images/profile_pictures/{{ $registration['pic'] }}" height="60px" width="60px" /></td>
         <td><a href="{{ URL::to('/')}}/edit_user/{{ $registration['id'] }}" > <input type="button" value="Edit Data"   ></a></td>
         <td><a href="{{ URL::to('/')}}/delete_user/{{ $registration['id'] }}">   <input type="button" value="Delete Data"></a></td>
    </tr> 
   @endforeach
</table>
</html>