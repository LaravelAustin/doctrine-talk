<?php

namespace App\Http\Controllers;

use App\Entities\Post;
use App\Entities\User;
use App\Http\Resources\PostResource;
use App\Queries\PostQuery;
use App\Repositories\PostRepository;
use App\Services\PostService;
use Hashids\Hashids;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

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
        if ($request->has('filters')) {
            return PostResource::collection($this->posts->getFilteredPosts(PostQuery::createFromRequest($request)));
        }

        return PostResource::collection($this->posts->getAllPosts());
    }

    public function show(string $postId): JsonResource
    {
        return new PostResource($this->posts->find(resolve(Hashids::class)->decode($postId)[0]));
    }

    public function store(Request $request, PostService $postService): JsonResource
    {
        return new PostResource($postService->createPost(\EntityManager::find(User::class, 1), $request->input()));
    }

    public function patch(Request $request, string $postId, PostService $postService): JsonResource
    {
        $post = $this->posts->find(resolve(Hashids::class)->decode($postId)[0]);

        $post = $postService->updatePost($post, $request->input());

        return new PostResource($post);
    }
}
