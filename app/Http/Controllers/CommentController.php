<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CommentController extends Controller {

    const MODEL = "App\Models\Comment";

    use RESTActions;

    public function updateWithVerification(Request $request) {
        $m = self::MODEL;

        $model = $m::find($request->input('id'));

        if (is_null($model)) {
            return $this->respond(Response::HTTP_NOT_FOUND,
                                    $this->getNotFoundMessage());
        }

        if ($model->post_id != $request->input('post_id')
            || $model->user_id != $request->input('user_id')) {
                return response("not authorized", 401);
        }

        return $this->put($request);
    }

}
