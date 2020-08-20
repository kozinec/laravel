<?php

namespace App\Http\Controllers\Blog;

use App\Events\Blog\BlogCreatedEvent;
use App\Http\Controllers\Controller;
use App\Http\Requests\BlogCreateRequest;
use App\Models\Blog;
use App\Models\Tag;
use App\Models\User;
use App\Services\BlogService;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        /** @var Builder $query */
        $query = Blog::with(['user.profile', 'tags'])
            ->where('status', '=', true);

        if ($q = $request->get('q')) {
            $query
                ->where('title', 'like', "%$q%")
                ->orWhere('description', 'like', "%$q%");
        }

        if ($tag = $request->get('tag')) { // как фильтровать по тегу
            $query->whereHas('tags', function (Builder $query) use ($tag) {
                $query->where('id', '=', $tag);
            });
        }

        $blogs = $query->orderByDesc('id')->paginate(20);

        return view('blog.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('blog.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  BlogCreateRequest  $request
     * @param  BlogService  $service
     * @return \Illuminate\Http\Response
     */
    public function store(BlogCreateRequest $request, BlogService $service)
    {
        $model = $service->create(
            $request->only('title', 'description')
        );

        event(new BlogCreatedEvent($model));

        return redirect(
            route('blog.index')
        )->with('success', 'Blog page success created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
//        $blog = Blog::find(6);
//
//        if(!$blog) {
//            throw new ModelNotFoundException();
//        }

        return view('blog.view', compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Blog  $blog
     * @return void
     */
    public function edit(Blog $blog)
    {
        return view('blog.edit', compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  BlogCreateRequest  $request
     * @param  Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(BlogCreateRequest $request, Blog $blog)
    {
        $data = $request->only('title', 'description');
        $blog->update($data);

        return redirect(
            route('blog.index')
        )->with('info', 'Blog success updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        $blog->delete();

        return redirect(
            route('blog.index')
        );
    }
}
