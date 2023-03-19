<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Knowledge;
use App\Models\User;
use App\Utils\Helper;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class KnowledgeController extends Controller
{
    /**
     * fetch
     *
     * @param Request $request
     * @return ResponseFactory|Response
     */
    public function fetch(Request $request)
    {
        $reqId = (int)$request->input(['id']);
        $sessionId = $request->session()->get('id');
        if ($reqId > 0) {


            /**
             * @var Knowledge $knowledge
             */
            $knowledge = Knowledge::find($reqId);
            if ($knowledge == null || $knowledge->getAttribute(Knowledge::FIELD_SHOW) == Knowledge::SHOW_OFF) {
                abort(500, __('Article does not exist'));
            }

            /**
             * @var User $user
             */
            $user = User::find($sessionId);
            if ($user === null) {
                abort(500, __('The user does not exist'));
            }

            if (!$knowledge->isFree() && $user->isAvailable() === false) {
                abort(500, __('No permission to view'));

            }

            $knowBody = $knowledge->getAttribute(Knowledge::FIELD_BODY);
            $subscribeUrl = Helper::getSubscribeUrl("/api/v1/client/subscribe?token={$user['token']}");
            $knowBody = str_replace('{{siteName}}', config('v2board.app_name', 'V2Board'), $knowBody);
            $knowBody = str_replace('{{subscribeUrl}}', $subscribeUrl, $knowBody);
            $knowBody = str_replace('{{urlEncodeSubscribeUrl}}', urlencode($subscribeUrl), $knowBody);
            $knowBody = str_replace('{{base64EncodeSubscribeUrl}}', base64_encode($subscribeUrl), $knowBody);
            $knowBody = str_replace(
                '{{safeBase64SubscribeUrl}}',
                str_replace(
                    array('+', '/', '='),
                    array('-', '_', ''),
                    base64_encode($subscribeUrl)
                ),
                $knowBody
            );
            $knowledge->setAttribute(Knowledge::FIELD_BODY, $knowBody);
            $data = $knowledge;
        } else {
            $data = Knowledge::select([Knowledge::FIELD_ID, Knowledge::FIELD_CATEGORY, Knowledge::FIELD_FREE, Knowledge::FIELD_TITLE, Knowledge::FIELD_UPDATED_AT])
                ->where(Knowledge::FIELD_LANGUAGE, $request->input(Knowledge::FIELD_LANGUAGE))
                ->where(Knowledge::FIELD_SHOW, Knowledge::SHOW_ON)
                ->orderBy(Knowledge::FIELD_SORT, "ASC")
                ->get()
                ->groupBy(Knowledge::FIELD_CATEGORY);
        }

        return response([
            'data' => $data
        ]);
    }


}