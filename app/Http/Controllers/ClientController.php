<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Order;
use App\Models\ProductWishlist;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\VendorWishlist;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $client = Client::where('id_user', Auth::user()->id)->first();
        $client->user;
        if (isset($client)) {
            return response()->json([
                'message' => 'Data Detail User',
                'data' => json_decode($client)
            ]);
        } else {
            return response()->json([
                'message' => 'Data Tidak Ditemukan'
            ], 404);
        }
    }

    public function update(Request $request)
    {
        $client = Client::where('id_user', Auth::user()->id)->first();
        $data = $request->all();
        if (isset($client)) {
            $client->fill($data);
            $client->save();
            return response()->json([
                'message' => 'Data User Berhasil Di Update',
                'data' => json_decode($client)
            ]);
        } else {
            return response()->json([
                'message' => 'Data Tidak Ditemukan'
            ], 404);
        }
    }

    public function product_wishlist()
    {
        $client = Client::where('id_user', Auth::user()->id)->first();
        $wishlist = ProductWishlist::where('id_client', $client->id)->get();
        if (!$wishlist->isEmpty()) {
            foreach ($wishlist as $data) {
                $data->client;
                $data->product;
                $data->product->vendor;
                $data->product->vendor->category;
            }
            return response()->json([
                'message' => 'Data Product Wishlist',
                'data' => json_decode($wishlist)
            ]);
        } else {
            return response()->json([
                'message' => 'Data Tidak Ditemukan'
            ], 404);
        }
    }

    public function vendor_wishlist()
    {
        $client = Client::where('id_user', Auth::user()->id)->first();
        $wishlist = VendorWishlist::where('id_client', $client->id)->get();
        if (!$wishlist->isEmpty()) {
            foreach ($wishlist as $data) {
                $data->client;
                $data->vendor;
                $data->vendor->category;
            }
            return response()->json([
                'message' => 'Data Vendor Wishlist',
                'data' => json_decode($wishlist)
            ]);
        } else {
            return response()->json([
                'message' => 'Data Tidak Ditemukan'
            ], 404);
        }
    }

    public function order()
    {
        $client = Client::where('id_user', Auth::user()->id)->first();
        $order = Order::where('id_client', $client->id)->get();
        if (!$order->isEmpty()) {
            foreach ($order as $data) {
                $data->client;
                $data->product;
                $data->product->vendor;
                $data->product->vendor->category;
            }
            return response()->json([
                'message' => 'Data Order',
                'data' => json_decode($order)
            ]);
        } else {
            return response()->json([
                'message' => 'Data Tidak Ditemukan'
            ], 404);
        }
    }

    public function addReview($id, Request $request)
    {
        Review::create([
            'id_order' => $id,
            'message' => $request->message,
            'rating' => $request->rating,
            'date' =>  Carbon::now()->toDateString()
        ]);
        return response()->json(['message' => 'Data Berhasil Ditambahkan'], 201);
    }

    public function addProductWishlist($id)
    {
        $client = Client::where('id_user', Auth::user()->id)->first();
        ProductWishlist::create([
            'id_client' => $client->id,
            'id_product' => $id
        ]);
        return response()->json(['message' => 'Data Berhasil Ditambahkan'], 201);
    }

    public function addVendorWishlist($id)
    {
        $client = Client::where('id_user', Auth::user()->id)->first();
        VendorWishlist::create([
            'id_client' => $client->id,
            'id_vendor' => $id
        ]);
        return response()->json(['message' => 'Data Berhasil Ditambahkan'], 201);
    }

    public function deleteProductWishlist($id)
    {
        ProductWishlist::where('id', $id)->first()->delete();
        return response()->json(['message' => 'Data Berhasil Dihapus']);
    }

    public function deleteVendorWishlist($id)
    {
        VendorWishlist::where('id', $id)->first()->delete();
        return response()->json(['message' => 'Data Berhasil Dihapus']);
    }
}
