<?php

namespace App\Http\Controllers;

use App\Components\Recuise;
use App\Http\Requests\PostRequest;
use App\Models\CategoryPost;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use App\Traits\StorageImageTrait;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function AuthLogin()
    {
        $admin_id = Session::get('id');
        if ($admin_id) {
            return  redirect()->route('dashboard');
        } else {
            return  redirect()->route('admin')->send();
        }
    }
    public function index()
    {
        $posts = Post::latest()->paginate(5);
        return view('admin.post.index_post', compact('posts'));
    }
    public function create()
    {
        $htmlOption = $this->getCategoryPost($parentId = '');
        return view('admin.post.add_post', compact('htmlOption'));
    }
    public function getCategoryPost($parentId)
    {
        $data = CategoryPost::all();
        $recuise = new Recuise($data);

        $htmlOption = $recuise->categoryRecusive($parentId);
        return $htmlOption;
    }
    public function store(PostRequest $request)
    {


        try {
            DB::beginTransaction();
            $dataPost = [
                'post_title' => $request->post_title,
                'post_des' => $request->post_des,
                'post_content' => $request->post_content,
                'post_meta_des' => $request->post_meta_des,
                'post_meta_keywords' => $request->post_meta_keywords,
                // 'user_id' => auth()->id(),
                'category_post_id' => $request->category_post_id,
                'post_slug' => Str::slug($request->post_title),
            ];
            $dataUploadFeatureImage = $this->StorageTraitUpload($request, 'post_image_path', 'post');
            if (!empty($dataUploadFeatureImage)) {
                $dataPost['post_image_name'] = $dataUploadFeatureImage['file_name'];
                $dataPost['post_image_path'] = $dataUploadFeatureImage['file_path'];
            };

            $post = Post::create($dataPost);
            DB::commit();
            return redirect()->route('post.index');
        } catch (Exception $exception) {
            DB::rollBack();
            Log::error(message: 'Message' . $exception->getMessage() . 'Line:' . $exception->getLine());
        }
    }
    public function StorageTraitUpload($request, $fieldName, $folderName)
    {
        if ($request->hasFile($fieldName)) {
            $file = $request->$fieldName; //lay dung ten file anh truyen vao 
            $fileNameOrigin = $file->getClientOriginalName();
            $fileNameHash = Str::random(length: 20) . '.' . $file->getClientOriginalExtension();
            $filepath = $request->file($fieldName)->storeAs('public/' . $folderName . '/' . auth()->id(), $fileNameHash); //file(name:'') là name trong thẻ input
            $dataUploadTrait = [
                'file_name' => $fileNameOrigin,
                'file_path' => Storage::url($filepath)
            ];
            return $dataUploadTrait;
        }
        return null;
    }
    public function edit($id)
    {
        $post = Post::find($id);
        // $this->authorize('update', $post);
        // dd($post->postImage()->first());
        $htmlOption = $this->getCategoryPost($post->category_post_id);
        return view('admin.post.edit_post', compact('htmlOption', 'post'));
    }
    public function update(Request $request, $id)
    {

        // try {
        //     DB::beginTransaction();
        $datapostUpdate = [
            'post_title' => $request->post_title,
            'post_des' => $request->post_des,
            'post_content' => $request->post_content,
            'post_meta_des' => $request->post_meta_des,
            'post_meta_keywords' => $request->post_meta_keywords,
            // 'user_id' => auth()->id(),
            'category_post_id' => $request->category_post_id,
            'post_slug' => Str::slug($request->post_title),


        ];
        $dataUploadFeatureImage = $this->storageTraitUpload($request, 'post_image_path', 'post');
        if (!empty($dataUploadFeatureImage)) {
            $datapostUpdate['post_image_name'] = $dataUploadFeatureImage['file_name'];
            $datapostUpdate['post_image_path'] = $dataUploadFeatureImage['file_path'];
        };
        Post::find($id)->update($datapostUpdate);
        $post = Post::find($id);

        // DB::commit();
        return redirect()->route('post.index');
        // } catch (Exception $exception) {
        //     DB::rollBack();
        //     Log::error(message: 'Message' . $exception->getMessage() . 'Line:' . $exception->getLine());
        // }
    }
    public function delete($id)
    {
        try {
            Post::find($id)->delete();
            return response()->json([
                'code' => 200,
                'message' => 'success'
            ], status: 200);
        } catch (Exception $exception) {
            Log::error(message: 'Message' . $exception->getMessage() . 'Line:' . $exception->getLine());
            return response()->json([
                'code' => 500,
                'message' => 'fail'
            ], status: 500);
        }
    }
}
