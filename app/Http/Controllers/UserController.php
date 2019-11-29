<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserPut;
use App\Models\User;
use App\Repositories\User\UserRepositoryInterface;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use App\Repositories\Order\OrderRepositoryInterface;

class UserController extends Controller
{
    private $userRepository;
    private $dataUpdate = [];
    private $orderRepository;

    public function __construct(UserRepositoryInterface $userRepository, OrderRepositoryInterface $orderRepository)
    {
        $this->userRepository = $userRepository;
        $this->orderRepository = $orderRepository;
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

    public function order($id)
    {
        if ($id != auth()->id()) {
            return back();
        }

        $user = $this->userRepository->getWithFind($id, 'orders');

        return view('user.order', ['orders' => $user->orders]);
    }

    public function cancelOrder($id)
    {
        $order = $this->orderRepository->update($id, ['status' => config('order.cancel')]);

        if ($order) {
            $dataResponse = [
                'flag' => true,
            ];

            return response()->json($dataResponse);
        }

        $dataResponse = [
            'flag' => false,
        ];

        return response()->json($dataResponse);
    }

    public function orderDetail($id)
    {
        $order = $this->orderRepository->getWithFind($id, 'orderDetails.product.images');
        $productList = [];

        if ($order) {
            $orderDetails = $order->orderDetails;
            foreach ($orderDetails as $orderDetail) {
                $productName = $orderDetail->product->name;
                $productImage = $orderDetail->product->images->last();

                array_push($productList, [
                    'productImage' => $productImage->image,
                    'productName' => $productName,
                    'quantity' => $orderDetail->quantity,
                    'price' => $orderDetail->price,
                    'totalPrice' => $orderDetail->quantity * $orderDetail->price,
                ]);
            }
        }

        return view('user.order_detail', ['productList' => $productList]);
    }
}
