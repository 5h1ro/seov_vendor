<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Client;
use App\Models\Order;
use App\Models\Product;
use App\Models\ProductWishlist;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Vendor;
use App\Models\VendorWishlist;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

use function PHPUnit\Framework\isEmpty;
use function PHPUnit\Framework\isNull;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $category = Category::all();
        $vendor = Vendor::paginate(5)->sortByDesc('sold');
        $product = Product::paginate(5)->sortByDesc('sold');
        if (isset($category)) {
            return response()->json([
                'message'  => 'Data Beranda',
                'category' => json_decode($category),
                'vendor'   => json_decode($vendor),
                'product'  => json_decode($product)
            ]);
        } else {
            return response()->json([
                'message' => 'Data Tidak Ditemukan'
            ], 404);
        }
    }

    public function category($id)
    {
        $vendor = Vendor::where('id_category', $id)->get();
        if ($vendor->isEmpty()) {
            return response()->json([
                'message' => 'Data Tidak Ditemukan'
            ], 404);
        } else {
            return response()->json([
                'message'  => 'Data Detail User',
                'data'     => json_decode($vendor)
            ]);
        }
    }

    public function vendor($id)
    {
        $vendor = Vendor::where('id', $id)->first();
        $product = Product::where('id_vendor', $id)->paginate(2)->sortByDesc('sold');
        if (isset($vendor)) {
            if ($product->isEmpty()) {
                return response()->json([
                    'message'  => 'Data Detail User',
                    'vendor'   => json_decode($vendor)
                ]);
            } else {
                return response()->json([
                    'message'  => 'Data Detail User',
                    'vendor'   => json_decode($vendor),
                    'product'  => json_decode($product)
                ]);
            }
        } else {
            return response()->json([
                'message' => 'Data Tidak Ditemukan'
            ], 404);
        }
    }

    public function product($id)
    {
        $product = Product::where('id', $id)->first();
        if ($product->order->isEmpty()) {
            if (isset($product)) {
                return response()->json([
                    'message'  => 'Data Detail User',
                    'data'     => json_decode($product)
                ]);
            } else {
                return response()->json([
                    'message' => 'Data Tidak Ditemukan'
                ], 404);
            }
        } else {
            foreach ($product->order as $order) {
                $order->review;
                if (isset($product)) {
                    return response()->json([
                        'message'  => 'Data Detail User',
                        'data'     => json_decode($product)
                    ]);
                } else {
                    return response()->json([
                        'message' => 'Data Tidak Ditemukan'
                    ], 404);
                }
            }
        }
    }

    public function order($id, Request $request)
    {
        $client = Client::where('id_user', Auth::user()->id)->first();
        Order::create([
            'id_client' => $client->id,
            'id_product' => $id,
            'amount' => $request->amount,
            'total' => $request->total,
            'event_date' =>  $request->event_date
        ]);
        return response()->json(['message' => 'Data Berhasil Ditambahkan'], 201);
    }

    public function allproduct($id)
    {
        $product = Product::where('id_vendor', $id)->get();
        if (!$product->isEmpty()) {
            return response()->json([
                'message'  => 'Data Detail User',
                'data'     => json_decode($product)
            ]);
        } else {
            return response()->json([
                'message' => 'Data Tidak Ditemukan'
            ], 404);
        }
    }

    public function review($id)
    {
        $order = Order::where('id_product', $id)->get();
        if ($order->isEmpty()) {
            return response()->json([
                'message' => 'Data Tidak Ditemukan'
            ], 404);
        } else {
            foreach ($order as $data) {
                $review = $data->review;
                return response()->json([
                    'message'  => 'Data Detail User',
                    'data'     => json_decode($review)
                ]);
            }
        }
    }
}
