<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Service;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class ServiceController extends Controller
{
    public function index()
    {


        if (view()->exists('admin.services')) {
            $services = Service::all();
            $data = [
                'title' => 'Сервіси',
                'services' => $services
            ];
            return view('admin.services', $data);
        }
        abort(404);
    }

    public function create()
    {
        if (view()->exists('admin.services_add')) {
            $data = [
                'title' => 'Новий сервіс'
            ];
            return view('admin.services_add', $data);
        }
        abort(404);
    }

    public function store(Request $request)
    {

        $input = $request->except('_token');

        $messages = [
            'required' => 'Поле :attribute обов\'язково заповнювати',
            'unique' => 'Поле :attribute повинно бути унікальним'
        ];

        $validator = Validator::make($input, [
            'name' => 'required|max:255',
            'text' => 'required|max:255',

        ], $messages);
        if ($validator->fails()) {

            return redirect()->route('servicesAdd')->withErrors($validator)->withInput();

        }

        $service = new Service();
        $service->fill($input);
        if ($service->save()) {
            return redirect('admin')->with('status', 'Сервіс добавлено');
        }
    }

    public function edit(Service $service)
    {
        $old = $service->toArray();
        if (view()->exists('admin.services_edit')) {
            $data = [
                'title' => 'Редагування сторінки - ' . $old['name'],
                'data' => $old
            ];
            // echo 11; dd();
            return view('admin.services_edit', $data);
        }
        abort(404);
    }

    public function update(Service $service, Request $request)
    {
        $input = $request->except('_token');
        $validator = Validator::make($input, [
            'name' => 'required|max:255',
            'text' => 'required'

        ]);

        if ($validator->fails()) {
            return redirect()->route('servicesEdit', ['page' => $input['id']])->withErrors($validator);
        }


        $service->fill($input);
        if ($service->update()) {
            return redirect('admin')->with('status', 'Сторінка оновлена');
        }
    }

    public function delete(Service $service) {
        $service->delete();
        return redirect('admin')->with('status','Сервіс видалено');
    }

}
