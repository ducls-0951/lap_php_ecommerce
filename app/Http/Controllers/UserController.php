<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserPut;
use App\Models\User;
use App\Repositories\User\UserRepositoryInterface;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    private $userRepository;
    private $dataUpdate = [];

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function show($id)
    {
        if ($id != auth()->id()) {
            return back();
        }

        $user = $this->userRepository->find($id);
        if ($user) {
            return view('user.profile', ['user' => $user]);
        }

        return back();
    }

    public function update($id, UpdateUserPut $request)
    {
        $dataReceive = $request->only([
            'old_password',
            'password',
        ]);

        if ($id == auth()->id()) {
            if ($request->hasFile('image')) {
                $image = $request['image'];
                $imageType = $image->getClientOriginalExtension();
                if (in_array($imageType, config('user.imageType'))) {
                    $imageName = time() . $image->getClientOriginalName();
                    $destinationPath = storage_path(config('admin.upload_image'));
                    $image->move($destinationPath, $imageName);
                    $this->dataUpdate['image'] = $imageName;
                }

                if ($dataReceive['old_password'] && $dataReceive['password']) {
                    if (Hash::check($dataReceive['old_password'], auth()->user()->getAuthPassword())) {
                        $this->dataUpdate['password'] = Hash::make($dataReceive['password']);
                        $user = $this->userRepository->update($id, $this->dataUpdate);
                        $dataResponse = [
                            'user' => $user,
                            'flag' => true,
                        ];

                        return response()->json($dataResponse);
                    }
                } else {
                    $user = $this->userRepository->update($id, $this->dataUpdate);
                    $dataResponse = [
                        'user'=> $user,
                        'flag' => true,
                    ];

                    return response()->json($dataResponse);
                }
            } else {
                if ($dataReceive['old_password'] && $dataReceive['password']) {
                    if (Hash::check($dataReceive['old_password'], auth()->user()->getAuthPassword())) {
                        $dataUpdate['password'] = Hash::make($dataReceive['password']);
                        $user = $this->userRepository->update($id, $dataUpdate);
                        $dataResponse = [
                            'user' => $user,
                            'flag' => true,
                        ];

                        return response()->json($dataResponse);
                    }
                }
            }
        }

        return response()->json(['flag' => false]);
    }
}
