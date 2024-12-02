<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    public function index(){
        $news = News::orderBy('created_at', 'desc')->get();
        return view('tools.newsinfo',[
            'news' => $news,
            "title" => "News & Info"
        ]);
    }

    public function store(Request $request)
    {
        try{
            $validatedData = $request->validate([
                'title' => 'required|max:255',
                'image' => 'image|file|max:10240',
                'body' => 'required'
            ]);

            $validatedData['body'] = strip_tags($validatedData['body']);
            $validatedData['user_id'] = auth()->user()->id;

            $now = Carbon::now('Asia/Jakarta');

            $validatedData['date'] = $now->toDateString();
            $validatedData['time'] = $now->toTimeString();

            if ($request->hasFile('image')) {
                $file = $request->file('image');

                $timestamp = time();
                $day = date('d', $timestamp);
                $month = date('m', $timestamp);
                $year = date('Y', $timestamp);

                $formattedDate = $day . $month . substr($year, -2);
                $originalName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
                $fileName = $originalName . '-' . $formattedDate . '.' . $file->getClientOriginalExtension();

                $file->storeAs('public/images/News & Update/'. $fileName);
                $validatedData['image'] = $fileName;

                News::create($validatedData);
                Alert::success('Success', 'Successfully added news');
                return redirect()->back();
            } else {
            throw new \Exception('File not found.');
            }
        } catch (\Exception $e) {
            Alert::error('Error', 'Failed to add news : ' . $e->getMessage())->persistent(true);
            return redirect()->back()->withInput();
        }
    }

    public function edit($id){
        $news = News::where('id', $id)->first();

        return view('tools.newsinfo', compact('news'));
    }

    public function update(Request $request, $id) {
        try {
            $validatedData = $request->validate([
                'title' => 'required|max:255',
                'body' => 'required',
                'image' => 'nullable|mimes:png,jpg|max:1024',
            ]);

            $oldImage = News::findOrFail($id)->image;

            $validatedData['body'] = strip_tags($validatedData['body']);
            $validatedData['user_id'] = auth()->user()->id;

            $now = Carbon::now('Asia/Jakarta');
            $validatedData['date'] = $now->toDateString();
            $validatedData['time'] = $now->toTimeString();

            $news = News::findOrFail($id);
            if ($request->hasFile('image')) {
                $file = $request->file('image');

                $timestamp = time();
                $day = date('d', $timestamp);
                $month = date('m', $timestamp);
                $year = date('Y', $timestamp);

                $formattedDate = $day . $month . substr($year, -2);
                $originalName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
                $fileName = $originalName . '-' . $formattedDate . '.' . $file->getClientOriginalExtension();

                $file->storeAs('public/images/News & Update/'. $fileName);
                $validatedData['image'] = $fileName;

                if ($oldImage) {
                    Storage::delete('public/images/News & Update/' . $oldImage);
                }

            } else {
                $validatedData['image'] = $oldImage;
            }
            $news->update($validatedData);
            Alert::success('Success', 'Successfully Changed the News');
            return redirect()->back();
        } catch (\Exception $e) {
            Alert::error('Error', 'Failed to Change the News : ' . $e->getMessage())->persistent(true);
            return redirect()->back()->withInput();
        }
    }

    public function delete($id){
        try {
            $news = News::findOrFail($id);
            $photo = $news->image;
            $news->delete();

            if (!empty($photo)) {
                try {
                    Storage::delete('public/images/News & Update/' . $photo);
                    Alert::success('Success', 'News successfully deleted.');
                } catch (\Exception $e) {
                    Alert::warning('Warning', 'Data has been deleted but failed to delete the associated file.');
                }
            }
            return redirect()->back();
        } catch (\Exception $e) {
            Alert::error('Error', 'Failed to Delete News : ' . $e->getMessage())->persistent(true);
            return redirect()->back();
        }
    }

    public function news($id)
    {
        $news = News::where('id', $id)->first();
        $listPost = News::orderBy('created_at', 'desc')->get();
        return view('news.single_page',[
            'news' => $news,
            'listPost' => $listPost,
            "title" => "NewsInfo",
        ]);
    }
}
