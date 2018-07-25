<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Importer;
use DB;
use Exporter;

class adminjainpeople extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//         $yourFileName='xxx.xlx';
//         $query = DB::table('estimatedetails')->select('cat_id','spec_des');
// $excel = Exporter::make('Excel');
// $excel->loadQuery($query);
// return $excel->stream($yourFileName);
$excel = Importer::make('Excel');
$excel->load('uploads/zzz.xlsx');
$excel->setSheet(2);
$collection = $excel->getCollection();
//dd($collection)
print_r($collection);die;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.jainpeopleadd',['cat'=>'']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        print_r($request['email']);die;
        $bodyContent = $request->getContent();
        print_r($bodyContent);die;
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
    }
    public function otherinfo(Request $request){
//echo $request['email'];

$html='<div>

<div class="form-group">
<label for="name">First Name</label>
<input type="text" name="fnmm[]" class="form-control required " value="" id="fnmm"/>
</div>
<div class="form-group">
<label for="name">Last Name</label>
<input type="text" name="lnmm[]" class="form-control required " value="" id="lnmm"/>
</div>
<div class="form-group">
<label for="name">email</label>
<input type="text" name="email[]" class="form-control required " value="" id="emailxx"/>
</div>

<input type="tbuttonext"  class="form-control  delbo" value="Delete" />

<div>
';
echo $html;
    }
}
