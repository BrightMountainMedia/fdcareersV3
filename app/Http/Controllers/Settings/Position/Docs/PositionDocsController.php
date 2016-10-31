<?php

namespace App\Http\Controllers\Settings\Position\Docs;

use Carbon\Carbon;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Position;
use App\Http\Controllers\Controller;

class PositionDocsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Store the position's document title.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function storeDoc1_title(Request $request, $id)
    {
        Position::where('id', $id)
            ->update([
                'doc1_title' => $request->doc1_title,
                'updated_at' => Carbon::now()
            ]);

        return $request->doc1_title;
    }

    /**
     * Store the position's document.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function storeDoc1_url(Request $request, $id)
    {
        $doc1_path = $request->file('doc1_url')->store('public/docs');
        $doc1_path = str_replace('public', '/storage', $doc1_path);
        Position::where('id', $id)
	            ->update([
	                'doc1_url' => $doc1_path, 
	                'updated_at' => Carbon::now()
	            ]);

        return $doc1_path;
    }

    /**
     * Store the position's document title and document.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function storeDoc1(Request $request, $id)
    {
        $doc1_path = $request->file('doc1_url')->store('public/docs');
        $doc1_path = str_replace('public', '/storage', $doc1_path);
        Position::where('id', $id)
	            ->update([
	                'doc1_title' => $request->doc1_title,
	                'doc1_url' => $doc1_path, 
	                'updated_at' => Carbon::now()
	            ]);

        return $doc1_path;
    }

    /**
     * Store the position's document title.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function storeDoc2_title(Request $request, $id)
    {
        Position::where('id', $id)
	            ->update([
	                'doc2_title' => $request->doc2_title,
	                'updated_at' => Carbon::now()
	            ]);

        return $request->doc2_title;
    }

    /**
     * Store the position's document.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function storeDoc2_url(Request $request, $id)
    {
        $doc2_path = $request->file('doc2_url')->store('public/docs');
        $doc2_path = str_replace('public', '/storage', $doc2_path);
        Position::where('id', $id)
	            ->update([
	                'doc2_url' => $doc2_path, 
	                'updated_at' => Carbon::now()
	            ]);

        return $doc2_path;
    }

    /**
     * Store the position's document title and document.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function storeDoc2(Request $request, $id)
    {
        $doc2_path = $request->file('doc2_url')->store('public/docs');
        $doc2_path = str_replace('public', '/storage', $doc2_path);
        Position::where('id', $id)
	            ->update([
	                'doc2_title' => $request->doc2_title,
	                'doc2_url' => $doc2_path, 
	                'updated_at' => Carbon::now()
	            ]);

        return $doc2_path;
    }

    /**
     * Store the position's document title.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function storeDoc3_title(Request $request, $id)
    {
        Position::where('id', $id)
	            ->update([
	                'doc3_title' => $request->doc3_title,
	                'updated_at' => Carbon::now()
	            ]);

        return $request->doc3_title;
    }

    /**
     * Store the position's document.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function storeDoc3_url(Request $request, $id)
    {
        $doc3_path = $request->file('doc3_url')->store('public/docs');
        $doc3_path = str_replace('public', '/storage', $doc3_path);
        Position::where('id', $id)
	            ->update([
	                'doc3_url' => $doc3_path, 
	                'updated_at' => Carbon::now()
	            ]);

        return $doc3_path;
    }

    /**
     * Store the position's document title and document.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function storeDoc3(Request $request, $id)
    {
        $doc3_path = $request->file('doc3_url')->store('public/docs');
        $doc3_path = str_replace('public', '/storage', $doc3_path);
        Position::where('id', $id)
	            ->update([
	                'doc3_title' => $request->doc3_title,
	                'doc3_url' => $doc3_path, 
	                'updated_at' => Carbon::now()
	            ]);

        return $doc3_path;
    }

    /**
     * Store the position's document title.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function storeDoc4_title(Request $request, $id)
    {
        Position::where('id', $id)
	            ->update([
	                'doc4_title' => $request->doc4_title,
	                'updated_at' => Carbon::now()
	            ]);

        return $request->doc4_title;
    }

    /**
     * Store the position's document.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function storeDoc4_url(Request $request, $id)
    {
        $doc4_path = $request->file('doc4_url')->store('public/docs');
        $doc4_path = str_replace('public', '/storage', $doc4_path);
        Position::where('id', $id)
	            ->update([
	                'doc4_url' => $doc4_path, 
	                'updated_at' => Carbon::now()
	            ]);

        return $doc4_path;
    }

    /**
     * Store the position's document title and document.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function storeDoc4(Request $request, $id)
    {
        $doc4_path = $request->file('doc4_url')->store('public/docs');
        $doc4_path = str_replace('public', '/storage', $doc4_path);
        Position::where('id', $id)
	            ->update([
	                'doc4_title' => $request->doc4_title,
	                'doc4_url' => $doc4_path, 
	                'updated_at' => Carbon::now()
	            ]);

        return $doc4_path;
    }

    /**
     * Store the position's document title.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function storeDoc5_title(Request $request, $id)
    {
        Position::where('id', $id)
	            ->update([
	                'doc5_title' => $request->doc5_title,
	                'updated_at' => Carbon::now()
	            ]);

        return $request->doc5_title;
    }

    /**
     * Store the position's document.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function storeDoc5_url(Request $request, $id)
    {
        $doc5_path = $request->file('doc5_url')->store('public/docs');
        $doc5_path = str_replace('public', '/storage', $doc5_path);
        Position::where('id', $id)
	            ->update([
	                'doc5_url' => $doc5_path, 
	                'updated_at' => Carbon::now()
	            ]);

        return $doc5_path;
    }

    /**
     * Store the position's document title and document.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function storeDoc5(Request $request, $id)
    {
        $doc5_path = $request->file('doc5_url')->store('public/docs');
        $doc5_path = str_replace('public', '/storage', $doc5_path);
        Position::where('id', $id)
	            ->update([
	                'doc5_title' => $request->doc5_title,
	                'doc5_url' => $doc5_path, 
	                'updated_at' => Carbon::now()
	            ]);

        return $doc5_path;
    }

    /**
     * Store the position's document title.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function storeDoc6_title(Request $request, $id)
    {
        Position::where('id', $id)
	            ->update([
	                'doc6_title' => $request->doc6_title,
	                'updated_at' => Carbon::now()
	            ]);

        return $request->doc6_title;
    }

    /**
     * Store the position's document.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function storeDoc6_url(Request $request, $id)
    {
        $doc6_path = $request->file('doc6_url')->store('public/docs');
        $doc6_path = str_replace('public', '/storage', $doc6_path);
        Position::where('id', $id)
	            ->update([
	                'doc6_url' => $doc6_path, 
	                'updated_at' => Carbon::now()
	            ]);

        return $doc6_path;
    }

    /**
     * Store the position's document title and document.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function storeDoc6(Request $request, $id)
    {
        $doc6_path = $request->file('doc6_url')->store('public/docs');
        $doc6_path = str_replace('public', '/storage', $doc6_path);
        Position::where('id', $id)
	            ->update([
	                'doc6_title' => $request->doc6_title,
	                'doc6_url' => $doc6_path, 
	                'updated_at' => Carbon::now()
	            ]);

        return $doc6_path;
    }
}
