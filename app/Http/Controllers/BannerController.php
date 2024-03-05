<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banner;
use Illuminate\Support\Facades\File;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Session;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banner = Banner::all();
        // dd($banner);
        return view('admin.banner.index', compact('banner'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.banner.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $banner = $this->IsVaidSort($request);
        if ($banner == true) {
            $banner = new Banner;
            $banner->name = $request->input('name');
            $banner->description = $request->input('description');
            $banner->url = $request->input('url');
            $banner->active = $request->input('active');
            $banner->sort_by = $request->input('sort_by');
            if ($request->hasfile('image')) {
                $file = $request->file('image');
                $extention = $file->getClientOriginalExtension();
                $filename = time() . '.' . $extention;
                $file->move('uploads/Banner/', $filename);
                $banner->image = $filename;
            }
            $banner->save();
            return redirect('admin/banner')->with('status', 'banner Image Added Successfully');
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
        $banner = Banner::find($id);
        return view('admin.banner.edit', compact('banner'));
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
        $banner = $this->IsVaidSort_update($request, $id);
        if ($banner == true) {
            $banner = Banner::find($id);
            $banner->name = $request->input('name');
            $banner->description = $request->input('description');
            $banner->url = $request->input('url');
            $banner->active = $request->input('active');
            $banner->sort_by = $request->input('sort_by');
            if ($request->hasfile('image')) {
                $file = $request->file('image');
                $extention = $file->getClientOriginalExtension();
                $filename = time() . '.' . $extention;
                $file->move('uploads/Banner/', $filename);
                $banner->image = $filename;
            }
            $banner->save();
            return redirect('admin/banner')->with('status', 'banner Image Added Successfully');
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
        $banner = Banner::find($id);
        $destination = 'uploads/Banner/' . $banner->image;
        if (File::exists($destination)) {
            File::delete($destination);
        }
        $banner->delete();
        return redirect()->back()->with('status', 'banner Image Deleted Successfully');
    }
    protected function IsVaidSort(Request $request)
    {
        $sort = $request->input('sort_by');
        $count_banner = Banner::select()->where('sort_by', $sort)->count('sort_by');
        if ($count_banner > 0 || $sort <= 0) {
            return false;
        }
        return true;
    }
    protected function IsVaidSort_update(Request $request, $id)
    {
        $sort = $request->input('sort_by');

        $count_banner = Banner::select()->where('sort_by', $sort)->where('id', '<>', $id)->count('sort_by');
        if ($count_banner > 0 || $sort <= 0) {
            return false;
        }
        return true;
    }
}
