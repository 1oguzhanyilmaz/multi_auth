<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PostController extends Controller
{
    protected $posts = [
        [
            'id'=> 1,
            'title'=>'Post 1 Title',
            'body'=>'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus amet cum dolor, error eum excepturi exercitationem facere illum impedit nam nulla quasi saepe similique! Autem dolor doloremque in magnam qui?'
        ],
        [
            'id'=> 2,
            'title'=>'Post 2 Title',
            'body'=>'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus amet cum dolor, error eum excepturi exercitationem facere illum impedit nam nulla quasi saepe similique! Autem dolor doloremque in magnam qui?'
        ],
        [
            'id'=> 3,
            'title'=>'Post 3 Title',
            'body'=>'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus amet cum dolor, error eum excepturi exercitationem facere illum impedit nam nulla quasi saepe similique! Autem dolor doloremque in magnam qui?'
        ],
    ];

    public function __construct()
    {
        $this->middleware('permission:list-posts|create-posts|show-posts|edit-posts|delete-posts', ['only' => ['index','store']]);
        $this->middleware('permission:create-posts', ['only' => ['create','store']]);
        $this->middleware('permission:edit-posts', ['only' => ['edit','update']]);
        $this->middleware('permission:delete-posts', ['only' => ['destroy']]);
    }

    public function index(){
        $posts = $this->posts;
        return view('admin.posts.index', compact('posts'));
    }

    public function create(){}
    public function store(){}

    public function show($id){
        $post = $this->find($id);

        return view('admin.posts.show', compact('post'));
    }

    public function edit($id){
        $post = $this->find($id);

        return view('admin.posts.edit', compact('post'));
    }

    public function update(){}
    public function destroy(){}

    private function find($id){
        foreach ($this->posts as $key => $value){
            if ($id == $value['id']){
                return $value;
            }
        }
        return [];
    }
}
