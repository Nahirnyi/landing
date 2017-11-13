<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Page;
use Illuminate\Support\Facades\Mail;
use App\Service;
use App\People;
use App\Portfolio;
use Illuminate\Support\Facades\DB;
use GuzzleHttp\Client;


class IndexController extends Controller
{
    public function index(Request $request)
    {

        
        $pages = Page::all();
        $services = Service::where('id', '<', 20)->get();
        $porfolios = Portfolio::get(array('name', 'filter', 'images'));
        $peoples = People::take(3)->get();
        $tags = DB::table('portfolios')->distinct();

        $menu = [];
        foreach ($pages as $page) {
            $item = array('title' => $page->name, 'alias' => $page->alias);
            array_push($menu, $item);
        }
        $item = array('title'=>'Services','alias'=>'service');
        array_push($menu, $item);
        $item = array('title'=>'Portfolio','alias'=>'Portfolio');
        array_push($menu, $item);
        $item = array('title'=>'Team','alias'=>'team');
        array_push($menu, $item);
        $item = array('title'=>'Contact','alias'=>'contact');
        array_push($menu, $item);

        // dd($pages);


        return view('site.index',array(
                                    'menu'=>$menu,
                                    'pages'=>$pages,
                                    'services'=>$services,
                                    'portfolios'=>$porfolios,
                                    'peoples' => $peoples,
                                    'tags'=>$tags,
        ));

    }
    
    public function sendMail(Request $request, \Illuminate\Mail\Mailer $mailer) {
        $messages = [
            'required' => "Поле :attribute обов\'язково заповнювати",
            'email' => "Поле :attribute повинно відповідати email адресу"
        ] ;
        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email',
            'text'=>'required'
        ], $messages );

        // $data = $request->all();

        // $result = Mail::send('nahirnujjaroslaw@gmail.com',['data'=>$data],function ($message) use ($data){
        //     $mail_admin = env('MAIL_ADMIN');
        //     $message->from($data['email'],$data['name']);
        //     $message->to($mail_admin, 'Mr. Admin')->subject('Question');
        // });




        $token = $request->input('g-recaptcha-response');
        $client = new Client();
        $response = $client->post('https://www.google.com/recaptcha/api/siteverify', [
            'form_params'  =>  array(
            'secret'  =>  '6LeXSzgUAAAAAPX8_wW2qcUpnul_n7SF4rS8Z-ve',
            'response'  =>  $token
            )
        ]);
    $results = json_decode($response->getBody()->getContents());
    if ($results->success) {
        $name = $_POST["name"];
        $email = $_POST["email"];
        $mail = $_POST["title"];
        $message = "Імя: $name \nEmail: $email\nПовідомлення: $mail";
        mail('nahirnujjaroslaw@gmail.com', 'landing page', $message,"Content-type: text/plain; charset=utf-8");
        // $mailer
        // ->to($request->input('mail'))
        // ->send(new \App\Mail\MyMail($request->input('title')));
    return redirect()->back();
    } else {
        return redirect()->back();
    } 

    







        // $name = $_POST["name"];
        // $email = $_POST["email"];
        // $mail = $_POST["text"];
        // $message = "Імя: $name \nEmail: $email\nПовідомлення: $mail";
        // mail('nahirnujjaroslaw@gmail.com', 'тема' ,$message,"Content-type: text/plain; charset=utf-8");



        // if ($result) {
        //     return redirect()->route('home')->with('status','Email is send');
        // }
    }
}
