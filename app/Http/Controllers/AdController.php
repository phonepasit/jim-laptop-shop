<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ad;
use Illuminate\Support\Facades\File;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Session;

class AdController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ad = Ad::all();
        // dd($ad);
        return view('admin.ad.index', compact('ad'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.ad.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ad = $this->IsVaidSort($request);
        if ($ad == true) {
            $ad = new Ad;
            $ad->name = $request->input('name');
            $ad->description = $request->input('description');
            $ad->url = $request->input('url');
            $ad->active = $request->input('active');
            $ad->sort_by = $request->input('sort_by');
            if ($request->hasfile('image')) {
                $file = $request->file('image');
                $extention = $file->getClientOriginalExtension();
                $filename = time() . '.' . $extention;
                $file->move('uploads/Ad/', $filename);
                $ad->image = $filename;
            }
            $ad->save();
            return redirect('admin/ad')->with('status', 'Ad Image Added Successfully');
        }
        Session::flash('error', 'Vui lòng đúng số thứ tự');
        return redirect()->back();
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
        $ad = Ad::find($id);
        return view('admin.ad.edit', compact('ad'));
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
        $ad = $this->IsVaidSort_update($request, $id);
        if ($ad == true) {
            $ad = Ad::find($id);
            $ad->name = $request->input('name');
            $ad->description = $request->input('description');
            $ad->url = $request->input('url');
            $ad->active = $request->input('active');
            $ad->sort_by = $request->input('sort_by');
            if ($request->hasfile('image')) {
                $file = $request->file('image');
                $extention = $file->getClientOriginalExtension();
                $filename = time() . '.' . $extention;
                $file->move('uploads/Ad/', $filename);
                $ad->image = $filename;
            }
            $ad->save();
            return redirect('admin/ad')->with('status', 'Ad Image Added Successfully');
        }
        Session::flash('error', 'Vui lòng đúng số thứ tự');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ad = Ad::find($id);
        $destination = 'uploads/Ad/' . $ad->image;
        if (File::exists($destination)) {
            File::delete($destination);
        }
        $ad->delete();
        return redirect()->back()->with('status', 'Ad Image Deleted Successfully');
    }
    protected function IsVaidSort(Request $request)
    {
        $sort = $request->input('sort_by');
        $count_ad = Ad::select()->where('sort_by', $sort)->count('sort_by');
        if ($count_ad > 0 || $sort <= 0) {
            return false;
        }
        return true;
    }
    protected function IsVaidSort_update(Request $request, $id)
    {
        $sort = $request->input('sort_by');

        $count_ad = Ad::select()->where('sort_by', $sort)->where('id', '<>', $id)->count('sort_by');
        if ($count_ad > 0 || $sort <= 0) {
            return false;
        }
        return true;
    }
}
