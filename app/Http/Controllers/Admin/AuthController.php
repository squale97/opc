<?php
// Admin controller
namespace App\Http\Controllers\Admin;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    protected $guard = 'admin';

    protected $redirectTo = '/admin';

    protected $loginPath = '/admin/login';

    public function __construct()
    {
        $this->redirectTo = '/admin';
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:admins',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/admin/login');


    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required',
        ]);

        $admin = Admin::where('email', $request->email)->first();

        if (!$admin) {
            return redirect($this->loginPath)->with('danger', 'Connexion impossible.');
        }
        

        if (Hash::check($request->password, $admin->password)) {
            if ($admin->active == 0) {
                Auth::guard('admin')->login($admin);
                return redirect('/admin/dashboard');
            }else {
                
                return redirect($this->loginPath)->with('danger', 'Votre compte a été revoquer.');
            }
           
        }

        return redirect($this->loginPath)
            ->withInput($request->only('email', 'remember'))
            ->withErrors(['danger' => 'Incorrect email address or password']);
    }

    public function showLoginForm()
    {
        if (Auth::guard('admin')->check()) {
            return redirect('/admin/dashboard');
        }

        return view('admin.auth.login');
    }
}