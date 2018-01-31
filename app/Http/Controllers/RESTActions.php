<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;

trait RESTActions {

    public function all()
    {
        $m = self::MODEL;
        return $this->respond(Response::HTTP_OK, $m::all());
    }

    public function get($id)
    {

        $m = self::MODEL;
        $model = $m::find($id);
        if(is_null($model)){
            return $this->respond(Response::HTTP_NOT_FOUND,
                                        $this->getNotFoundMessage());
        }
        return $this->respond(Response::HTTP_OK, $model);
    }

    public function add(Request $request)
    {
        $m = self::MODEL;
        $this->validate($request, $m::$rules);

        $input = $request->except('password');

        if ($request->input('password') != null) {
            $input['password'] = Hash::make($request->input('password'));
        }

        return $this->respond(Response::HTTP_CREATED,  $m::create($input));
    }

    public function put(Request $request)
    {
        $m = self::MODEL;
        $this->validate($request, $m::$rules);
        $model = $m::find($request->input('id'));
        if(is_null($model)){
            return $this->respond(Response::HTTP_NOT_FOUND,
                                    $this->getNotFoundMessage());
        }
        $model->update($request->except('password'));
        return $this->respond(Response::HTTP_OK, $model);
    }

    public function remove(Request $request)
    {
        $m = self::MODEL;

        $id = $request->input('id');
        if(is_null($m::find($id))) {
            return $this->respond(Response::HTTP_NOT_FOUND,
                                    $this->getNotFoundMessage());
        }
        $m::destroy($id);
        return $this->respond(Response::HTTP_OK);
    }

    protected function respond($status, $data = [])
    {
        return response()->json($data, $status);
    }

    protected function getNotFoundMessage() {
        return ['message' => 'data not found'];
    }

}
