<?php

namespace App\Http\Controllers;

use App\Models\Sign;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
// use Intervention\Image\Facades\Image;
use Image;
use RealRashid\SweetAlert\Facades\Alert;


class ImageUploadController extends Controller
{
    // public function uploadImage(Request $request)
    // {
    //     $request->validate([
    //         'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
    //     ]);

    //     if ($request->hasFile('image')) {
    //         $image = $request->file('image');
    //         $extension = $image->getClientOriginalExtension();
    //         $imageName = time() . '.' . $extension;

    //         $user = User::find(Auth::id());
    //         if ($user->image && strpos($user->image, $user->name) === 0) {
    //             Storage::disk('public')->delete('images/profile/' . $user->image);
    //         }

    //         $userStorageDirectory = 'public/images/profile/' . $user->name;
    //         $image->storeAs($userStorageDirectory, $imageName);
    //         $user->image = $user->name . '/' . $imageName;
    //         $user->save();
    //     }
    //     Alert::success('Success', 'Your image profile has been uploaded.');
    //     return redirect()->route('showProfile');
    // }

    // public function removeImage(Request $request)
    // {
    //     $user = User::find(Auth::id());

    //     if ($user->image && $user->image != 'user.png') {
    //         Storage::disk('public')->delete('images/' . $user->image);
    //         $user->image = 'user.png';
    //         $user->save();
    //     }

    //     Alert::success('Success', 'Image profile has been delete.');
    //     return redirect()->route('showProfile');
    // }

    public function upSign(Request $request)
    {
        try{
            $validatedData = $request->validate([
                'sign' => 'required|file|mimes:jpeg,png,jpg|max:2048'
            ]);
            $validatedData['user_id'] = auth()->user()->id;
            if ($request->hasFile('sign')) {
                $file = $request->file('sign');

                $firstName = auth()->user()->nik;
                $fileName = $firstName . '.' . $file->getClientOriginalExtension();
                $existingSign = Sign::where('user_id', auth()->user()->id)->first();
                if ($existingSign) {
                    Storage::delete('public/images/Sign/' . $existingSign->sign);
                    $file->storeAs('public/images/Sign/', $fileName);
                    $existingSign->update(['sign' => $fileName]);
                } else {
                    $file->storeAs('public/images/Sign/', $fileName);
                    $validatedData['sign'] = $fileName;
                    Sign::create($validatedData);
                }
                Alert::success('Success', 'Successfully added signature');
                return redirect()->back();
            } else {
            throw new \Exception('File not found.');
            }
        } catch (\Exception $e) {
            Alert::error('Error', 'failed to add signature: ' . $e->getMessage())->persistent(true);
            return redirect()->back()->withInput();
        }
    }
}
