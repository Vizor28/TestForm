<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Feedback;


class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function message(Request $request)
    {
        $this->validate($request, [
            'name'	=>	'required|string|regex:#[А-ЯA-Z][а-яa-z]{2,}\s[А-ЯA-Z][а-яa-z]{2,}#',
            'age'   =>	'required|integer|between:17,65',
            'date'  =>  'required|date|after:'.date('Y-m-d'),
            'file' => 'required|mimes:doc,docx'
        ]);


        $feedback = new Feedback();

        $feedback->name = $request->input('name');
        $feedback->age = $request->input('age');
        $feedback->date = $request->input('date');

        $feedback->save();

        if ($request->hasFile('file'))
        {
            $path =  base_path() .'/files/'.date('Y').'/'.date('m').'/';
            $file_name = $feedback->id.'.'.$request->file('file')->getClientOriginalExtension();

            $request->file('file')->move($path,$file_name);

        }

        return redirect('ok')->with('date', $request->input('date'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function ok(Request $request)
    {

        $date =  $request->session()->get('date');
        if(empty($date)){

            return redirect('/');

        }

        return view('ok',['date'=>$date]);
    }

}
