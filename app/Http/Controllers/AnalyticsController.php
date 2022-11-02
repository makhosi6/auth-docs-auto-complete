<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use App\Models\Analytics;
use Illuminate\Http\Request;

class AnalyticsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        try {
         $data = json_decode($request->getContent());
            //

            $analytics = Analytics::create([
                // 'id' => rand(6, 16),
                'uuky' => $data->uuky,
                'path' => $data->path,
                'token' => $data->x_token,
                'ip' => $data->x_ip,
                'query' => $data->x_query,
                'hostname' => $data->x_hostname,
                'timestamp' => $data->timestamp,
                'params' => $data->x_params,
                'rawHeaders' => $data->x_rawHeaders,
                'body' => $data->x_body
            ]);
            //
            $analytics->save();


        } catch (\Throwable $th) {
            Log::debug('\ERROR FROM ANALYTICS CREATE' . $th);
            abort(500);
       
        }
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
        try {
            $item = Analytics::findOrFail($id);

            return $item;
        } catch (\Throwable $th) {
            //throw $th;
            abort(500);
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
        //
        abort(405);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        abort(405);
    }
}
