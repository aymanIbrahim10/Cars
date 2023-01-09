<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use \Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class EmployController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employs = User::where('status',0)->get();
        return view('employs.index', compact('employs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('manage_user');
        return view('employs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmployRequest $request)
    {
        $this->authorize('manage_user');
        $user =  User::create([
            'name' => $request->name,
            'email' => $request->email,
            'status' => 0,
            'password' => bcrypt($request->password),
            'phone' => $request->phone,
            'address' => $request->address,
        ]);
        if ($request->hasFile('picture') && $request->picture != '') {
                $file = $request->file('picture');
                $filename = Str::uuid() . $file->getClientOriginalName();
                $file->move(public_path('images'), $filename);
                $path = 'images/' . $filename;
            // if (File::exists($path)) {
            //     File::delete($path);
            // }
            $user->update(['picture' => $path]);
        }
        if ($user)
            return redirect()->route('employ.index')->with(['success' => 'تم اضافة البيانات بنجاح ']);
        else
            return redirect()->route('employ.index')->with(['error' => 'حدث خطا ما الرجاء المحاوله لاحقا']);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $this->authorize('manage_user');
        $employs = User::where('id', $id)->first();
        if (Auth::check() && Auth::user()->id == $id) {
            return view('employs.edit',compact('employs'));
        } else {
            abort(403);
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // $this->authorize('manage_user');
        $employs = User::where('id', $id)->first();
        if (Auth::check() && Auth::user()->id == $id) {
            $employs->update([
                'name' => $request->name,
                'email' => $request->email,
                'status' => 0,
                'phone' => $request->phone,
                'address' => $request->address,
            ]);
            if ($request->hasFile('picture') && $request->picture != '') {
                $image_path = $employs->picture;
                if (File::exists($image_path)) {
                    File::delete($image_path);
                }
                    $file = $request->file('picture');
                    $filename = Str::uuid() . $file->getClientOriginalName();
                    $path = 'images/' . $filename;

                $file->move(public_path('images'), $filename);
                $employs->update(['picture' => $path]);
            }
            if ($employs)
                return redirect()->route('employ.edit',auth()->user()->id)->with(['success' => 'تم تحديث البيانات بنجاح ']);
            else
                return redirect()->route('employ.edit',auth()->user()->id)->with(['error' => 'حدث خطا ما الرجاء المحاوله لاحقا']);

        }else{
            abort(403);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $this->authorize('manage_user');

        $employ = User::findOrFail($request->employ_id);
        $image_path = $employ->picture;
            if (File::exists($image_path)) {
                File::delete($image_path);
            }
        $employ->delete();
        if ($employ)
            return redirect()->route('employ.index')->with(['success' => 'تم حذف  بيانات الموظف بنجاح ']);
        else
            return redirect()->route('employ.index')->with(['error' => 'حدث خطا ما الرجاء المحاوله لاحقا']);
    }

    public function passwordChange(Request $request){
        $this->validate($request, [
            'oldpassword' => 'required',
            'newpassword' => 'required|min:8',
            'password_confirmation'=>'required|same:newpassword'
            ]);
        $hashedPassword = Auth::user()->password;
        if (Hash::check($request->oldpassword , $hashedPassword )) {
          if (!Hash::check($request->newpassword , $hashedPassword)) {
               $users =User::find(Auth::user()->id);
               $users->password = bcrypt($request->newpassword);
               User::where( 'id' , Auth::user()->id)->update( array( 'password' =>  $users->password));
               return redirect()->route('employ.index')->with(['success' => 'لقد تم تحديث كلمة المرور بنجاح تام']);

            }
             else{
                 return redirect()->back()->with(['error' => 'لا يمكن  ان يكون كلمة  المرور الجديدة هي نفسها القديمة']);
            }
         }
           else{
             return redirect()->back()->with(['error' => 'كلمة المرور القديمة ليست صحيحة']);
              }
    }
}
