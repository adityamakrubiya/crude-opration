<?php

namespace App\Http\Controllers;

use App\Models\department;
use App\Models\Registration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SampleController extends Controller
{

    public function index()
    {
        $department_data = department::get(["department_name"]);
        return view('RegisterForm', compact('department_data'));
    }

    public function register_fetch_data(Request $req)
    {

        $req->validate([

            'fn' => 'required|min:3|max:20',
            'ln' => 'required|min:3|max:20',
            'em' => 'required|email',
            'country' => 'required',
            'state' => 'required',
            // 'department' => 'required',
            'gender' => 'required',
            'hobby' => 'required',
            'pic' => 'required|mimes:jpg,png,webp|max:2048'

        ], [
            'fn.required' => 'Full name cannot be empty',
            'fn.min' => 'Full name must contain minimum 3 characters',
            'fn.max' => 'Full name must contain maximum of 20 characters',
            'ln.required' => 'Last name cannot be empty',
            'ln.min' => 'Last name must contain minimum 3 characters',
            'ln.max' => 'Last name must contain maximum of 20 characters',
            'em.required' => 'Email address canniot be empty',
            'em.email' => 'Invalid email address',
            'hobby.required' => 'Please select a hobby',
            'country.required' => 'Please select a qualification',
            'state.required' => 'Please select a qualification',
            // 'department.required' => 'Please select a department',
            'gender.required' => 'Please select your Gender',
            'pic.required' => 'Please select a pic',
            'pic.mimes' => 'Select jpg or png',
            'pic.size' => 'Select a file of 2 MB'

        ]);
        $h = "";
        foreach ($req->hobby as $h1) {
            $h = $h . $h1 . ",";
        }

        $pic_name = uniqid() . $req->file('pic')->getClientOriginalName();
        $req->pic->move('Images/profile_pictures/', $pic_name);
        $reg = new Registration;
        $reg->fullname = $req->fn;
        $reg->lastname = $req->ln;
        $reg->email = $req->em;
        $reg->country = $req->country;
        $reg->state = $req->state;
        $reg->gender = $req->gender;
        $reg->hobbies = $h;
        $reg->pic = $pic_name;
        // $reg->save();
        // $reg = new department;
        // $reg->department_name = $req->department;

        if ($reg->save()) {
            session()->flash('success', 'Registration Success');
        } else {
            session()->fladcsssh('error', 'Registration Failed');
        }
        return redirect('display_data');

        $registrations = Registration::with('department')->get();
        return view('display_registration_data', compact('registrations'));
    }
    public function fetch_data_registration()
    {

        $registrations = Registration::with('department')->get();
        return view('display_registration_data', compact('registrations'));

        $registrations = Registration::select('registrations.*', 'department.department_name')
            ->join('department', 'registrations.department_id', '=', 'department.id')
            ->get();
    }

    public function fetch_data_for_edit($id)
    {

        $reg_data = Registration::where('id', $id)->get();
        return view('edit_registration_form', compact('reg_data'));

        $registrations = Registration::select('registrations.*', 'department.department_name')
            ->join('department', 'registrations.department_id', '=', 'department.id')
            ->get();

        // $reg_data = Registration::where('id', $id)->get();
        // return view('edit_registration_form', compact('reg_data'));
    }
    public function delete_user_registration($id)
    {

        // if($id==null){
        //         return redirect('display_data');
        // }
        // $data = department::find($id);
        // $data->delete();
        $data = Registration::find($id);
        $data->delete();
        return redirect('display_data')->with('status', 'Data Delete Successfully');
    }
    public function update_data_registration(Request $req)
    {
        $req->validate([
            'fn' => 'required|min:3|max:20',
            'ln' => 'required|min:3|max:20',
            'em' => 'required|email',
            'country' => 'required',
            'state' => 'required',
            'department' => 'required',
            'gender' => 'required',
            'hobby' => 'required',
            'pic' => 'mimes:jpg,png,webp|max:2048',

        ], [
            'fn.required' => 'Full name cannot be empty',
            'fn.min' => 'Full name must contain minimum 3 characters',
            'fn.max' => 'Full name must contain maximum of 20 characters',
            'ln.required' => 'Last name cannot be empty',
            'ln.min' => 'Last name must contain minimum 3 characters',
            'ln.max' => 'Last name must contain maximum of 20 characters',
            'em.required' => 'Email address canniot be empty',
            'em.email' => 'Invalid email address',
            'hobby.required' => 'Please select a hobby',
            'country.required' => 'Please select a countyr',
            'state.required' => 'Please select a state',
            'department.required' => 'Please select a department',
            'gender.required' => 'Please select your Gender',
            'pic.mimes' => 'Select jpg or png',
            'pic.size' => 'Select a file of 2 MB',

        ]);

        // $data = department::where('id', $req->id)->first();
        // $data->where('id', $req->id)->update(array('department_name' => $req->department));

        $h = implode(",", $req->hobby);
        $data = Registration::where('id', $req->id)->first();

        if ($req->hasFile('pic')) {
            $file_path = "images/profile_pictures/" . $data['pic'];
            if (File::exists($file_path)) {
                File::delete($file_path);
            }
            $pic_name = uniqid() . $req->file('pic')->getClientOriginalName();
            $req->pic->move('images/profile_pictures/', $pic_name);
            $data->where('id', $req->id)->update(array('fullname' => $req->fn,
                'lastname' => $req->ln,
                'email' => $req->em,
                'country' => $req->country,
                'state' => $req->state,
                'gender' => $req->gender,
                'hobbies' => $h,
                'pic' => $pic_name,
            ));
        } else {
            $data->where('id', $req->id)->update(array('fullname' => $req->fn,
                'lastname' => $req->ln,
                'email' => $req->em,
                'country' => $req->country,
                'state' => $req->state,
                'gender' => $req->gender,
                'hobbies' => $h,
            ));
        }
        return redirect('display_data');
    }

    public function department_data()
    {
        $department = department::select()->get();
        return view('department_data', compact('department'));
    }

    public function departmen_delet_data($id)
    {
        
        $data = department::find($id);
            $data->delete();
        return redirect('department_data')->with('status', 'Data Delete Successfully');
    }

    public function department_fetch_data(Request $req)
    {
        $req->validate([

            'department' => 'required',
        ], [
            'department.required' => 'Please select a department',
        ]);
        $reg = new department;
        $reg->department_name = $req->department;

        if ($reg->save()) {
            session()->flash('success', 'Registration Success');
        } else {
            session()->fladcsssh('error', 'Registration Failed');
        }
        return redirect("department_data");
    }

    public function Department_edit_data($id)
    {
        $reg_data = department::where('id', $id)->get();
        return view('edit_department', compact('reg_data'));
    }

    public function update_data_department(Request $req)
    {
        $req->validate([
            'department' => 'required',
        ], [
            'department.required' => 'Please select a department',
        ]);

        $data = department::where('id', $req->id)->first();
        $data->where('id', $req->id)->update(array('department_name' => $req->department));

        return redirect('department_data');

    }
}