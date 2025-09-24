<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\CartItem;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
                public function addToCart(Request $request)
                {
                                $productId = $request->input('product_id');
                                $quantity = $request->input('quantity', 1);

                                $product = Product::findOrFail($productId);

                                $userId = Auth::id();
                                $sessionId = Session::getId();

                                // Find if the item already exists in the cart
                                $cartItem = CartItem::where('product_id', $productId)
                                                ->when($userId, function ($query) use ($userId) {
                                                                return $query->where('user_id', $userId);
                                                }, function ($query) use ($sessionId) {
                                                                return $query->where('session_id', $sessionId);
                                                })
                                                ->first();

                                if ($cartItem) {
                                                // Update quantity if item already exists
                                                $cartItem->quantity += $quantity;
                                                $cartItem->save();
                                } else {
                                                // Create new cart item
                                                CartItem::create([
                                                                'user_id' => $userId,
                                                                'product_id' => $productId,
                                                                'quantity' => $quantity,
                                                                'price' => $product->price,
                                                                'session_id' => $userId ? null : $sessionId, // Use session_id only for guests
                                                ]);
                                }

                                return response()->json(['message' => 'Product added to cart successfully!'], 200);
                }

                public function viewCart()
                {
                                $userId = Auth::id();
                                $sessionId = Session::getId();

                                $cartItems = CartItem::with('product')
                                                ->when($userId, function ($query) use ($userId) {
                                                                return $query->where('user_id', $userId);
                                                }, function ($query) use ($sessionId) {
                                                                return $query->where('session_id', $sessionId);
                                                })
                                                ->get();

                                // Calculate cart total
                                $cartTotal = $cartItems->sum(function ($item) {
                                                return $item->price * $item->quantity;
                                });

                                return view('website.pages.cart', compact('cartItems', 'cartTotal'));
                }

                public static function getCartItemCount()
                {
                                $userId = Auth::id();
                                $sessionId = Session::getId();

                                return CartItem::when($userId, function ($query) use ($userId) {
                                                return $query->where('user_id', $userId);
                                }, function ($query) use ($sessionId) {
                                                return $query->where('session_id', $sessionId);
                                })->sum('quantity');
                }

                public function getCartContentAjax()
                {
                                $userId = Auth::id();
                                $sessionId = Session::getId();

                                $cartItems = CartItem::with('product')
                                                ->when($userId, function ($query) use ($userId) {
                                                                return $query->where('user_id', $userId);
                                                }, function ($query) use ($sessionId) {
                                                                return $query->where('session_id', $sessionId);
                                                })
                                                ->get();

                                $cartTotal = $cartItems->sum(function ($item) {
                                                return $item->price * $item->quantity;
                                });

                                // You can return this as JSON, or as a rendered partial view
                                return response()->json(['cartItems' => $cartItems, 'cartTotal' => $cartTotal]);
                }
}
