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
         
            //
            $analytics = Analytics::create([
                // 'id' => rand(6, 16),
                'uuky' => $request->uuky,
                'token' => $request->token,
                'ip' => $request->x_ip,
                'query' => $request->x_query,
                'hostname' => $request->x_hostname,
                'timestamp' => $request->timestamp,
                'params' => $request->x_params,
                'rawHeaders' => $request->x_rawHeaders,
                'body' => $request->x_body
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
