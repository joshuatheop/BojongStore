<?php

namespace App\Http\Controllers\user; // Pastikan namespace-nya user

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class ProductController extends Controller
{
    /**
     * Menampilkan halaman utama (tabel produk).
     */
    public function index()
    {
        $products = Product::with('category')->latest()->paginate(10);
        // Arahkan ke view di dalam folder user/products
        return view('user.products.index', compact('products'));
    }

    /**
     * Menampilkan form untuk menambah produk baru.
     */
    public function create()
    {
        $categories = Category::all();
        // Arahkan ke view di dalam folder user/products
        return view('user.products.create', compact('categories'));
    }

    /**
     * Menyimpan produk baru ke database.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255|unique:products',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'shoppee' => 'nullable|url',
            'whatsapp' => 'nullable|string',
            'category_id' => 'required|exists:categories,id',
            'tags' => 'nullable|string',
            'seller' => 'required|string|max:255',
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('public/products');
            $validatedData['image'] = $path;
        }

        $validatedData['slug'] = Str::slug($request->name);

        Product::create($validatedData);

        // Arahkan kembali ke route user.products.index
        return redirect()->route('user.products.index')->with('success', 'Produk berhasil ditambahkan.');
    }

    /**
     * Menampilkan form untuk mengedit produk.
     */
    public function edit(Product $product)
    {
        $categories = Category::all();
        // Arahkan ke view di dalam folder user/products
        return view('user.products.edit', compact('product', 'categories'));
    }

    /**
     * Memperbarui data produk di database.
     */
    public function update(Request $request, Product $product)
    {
        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255', Rule::unique('products')->ignore($product->id)],
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'shoppee' => 'nullable|url',
            'whatsapp' => 'nullable|string',
            'category_id' => 'required|exists:categories,id',
            'tags' => 'nullable|string',
            'seller' => 'required|string|max:255',
        ]);

        if ($request->hasFile('image')) {
            if ($product->image) {
                Storage::delete($product->image);
            }
            $path = $request->file('image')->store('public/products');
            $validatedData['image'] = $path;
        }

        $validatedData['slug'] = Str::slug($request->name);
        $product->update($validatedData);

        // Arahkan kembali ke route user.products.index
        return redirect()->route('user.products.index')->with('success', 'Produk berhasil diperbarui.');
    }

    /**
     * Menghapus produk dari database.
     */
    public function destroy(Product $product)
    {
        if ($product->image) {
            Storage::delete($product->image);
        }
        $product->delete();

        // Arahkan kembali ke route user.products.index
        return redirect()->route('user.products.index')->with('success', 'Produk berhasil dihapus.');
    }
}