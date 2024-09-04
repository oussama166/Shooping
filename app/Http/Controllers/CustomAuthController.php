<?php
namespace App\Http\Controllers;

use App\Mail\ForgetPaswordMail;
use Illuminate\Http\Request;
use Session;
use Hash;
use Mail;
use App\Models\User;
use App\Models\PasswordReset;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
class CustomAuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }
    public function admin()
    {
        return view('admin');
    }
    public function customLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $data= $request->email;
        $credentials = $request->only('email', 'password');
        if(Auth::attempt($credentials)){
            $vali = User::where('email',$data)->first();
            if(($vali->validadmin)=="user"){
                return redirect()->intended('produit');
                    }
            if(($vali->validadmin)=="admin"){    
                return redirect()->intended('produit-admin');
                    }
            if(($vali->validadmin)=="client"){    
                return redirect()->intended('/');
                    }
        }
        return redirect("login")->withSuccess('Les détails de connexion ne sont pas valides');
    }
    public function signOut() {
        Session::flush();
        Auth::logout();
        return Redirect('login');
    }
    public function getForgetPassword(){
        return view('auth.forget_password');
    }
    public function postForgetPassword(Request $request){
        $request->validate([
            'email' => 'required|email',
        ]);
        $user= User::where('email',$request->email)->first();
        if(!$user){
            return redirect()->back()->withSuccess('Email introuvable!');
        }else{
            $reset_code=Str::random(200);
            PasswordReset::create([
                'user_id'=>$user->id,
                'reset_code'=>$reset_code
            ]);
            Mail::to($user->email)->send(new ForgetPaswordMail($user->nom,$user->prenom,$reset_code));
            return redirect()->back()->withSuccess('nous avons envoyé un lien pour réinistialisé de votre mot de passe,veuillez vérifier vos e-mails');
        }
    }
    public function getResetPassword($reset_code){
        $password_reset_data=PasswordReset::where('reset_code',$reset_code)->first();
        if(!$password_reset_data || Carbon::now()->subMinutes(10)>$password_reset_data->created_at){
            return redirect()->route('getForgetPassword')->withSuccess('lien de réinitialisation du mot de passe et invalide');
        }else{
            return view('auth.reset',compact('reset_code'));
        }
    }
    public function postResetPassword($reset_code,Request $request){
        $password_reset_data=PasswordReset::where('reset_code',$reset_code)->first();
        if(!$password_reset_data || Carbon::now()->subMinutes(10)>$password_reset_data->created_at){
            return redirect()->route('getForgetPassword')->withSuccess('lien de réinitialisation du mot de passe et invalide');
        }else{
            $request->validate([
                'password' => 'required|min:6',
            ]);
            $user= User::find($password_reset_data->user_id);
            $password_reset_data->delete();
            $user->update([
                'password'=>Hash::make($request->password)
            ]);
            return redirect()->route('login')->withSuccess('mot de passe est bien modifier');
        }
    }
}