<?php

namespace App\Http\Controllers;

use App\Http\Resources\PostResource;
use App\Repositories\PostRepository;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * @var PostRepository
     */
    private $posts;

    public function __construct(PostRepository $posts)
    {
        $this->posts = $posts;
    }

    public function index(Request $request)
    {
        if ($filters = $request->input('filters')) {
            return PostResource::collection($this->posts->getFilteredPosts($filters));
        }

        return PostResource::collection($this->posts->getAllPosts());
    }
}
