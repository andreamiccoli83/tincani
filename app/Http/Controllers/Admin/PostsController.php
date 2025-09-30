<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Post\BulkDestroyPost;
use App\Http\Requests\Admin\Post\DestroyPost;
use App\Http\Requests\Admin\Post\IndexPost;
use App\Http\Requests\Admin\Post\StorePost;
use App\Http\Requests\Admin\Post\UpdatePost;
use App\Models\Post;
use Brackets\AdminListing\Facades\AdminListing;
use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use App\Models\Category;
use App\Models\Social;
use Illuminate\Http\Request;

class PostsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexPost $request
     * @return array|Factory|View
     */
    public function index(IndexPost $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Post::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['category_id', 'enabled', 'id', 'published_at', 'social_id', 'title'],

            // set columns to searchIn
            ['body', 'category_id', 'id', 'link', 'title'],


            function ($query) use ($request) {
                $query->with(['category', 'social']);

                $defaultOrder = 'id'; // Puoi impostare l'ordinamento predefinito qui


                if ($request->has('category')) {
                    $query->whereIn('category_id', $request->get('category'));
                }

                if ($request->has('social')) {
                    $query->whereIn('social_id', $request->get('social'));
                }

                if ($request->has('orderBy')) {
                    $query->orderBy($request->get('orderBy'), $request->get('orderDirection', 'asc'));
                } else {
                    $query->orderBy($defaultOrder, 'desc');
                }
            }
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }
        return view('admin.post.index', [
            'data' => $data,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.post.create');

        return view('admin.post.create',[
            'categories' => Category::all(),
            'socials' => Social::all(),
            'mode' => 'create',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StorePost $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StorePost $request)
    {
        // Ottieni l'ultimo valore di order_column
        $lastOrder = Post::max('order_column');

        // Sanitize input
        $sanitized = $request->getSanitized();

        // Assegna il valore di order_column
        $sanitized['order_column'] = $lastOrder + 1;

        // Store the Post
        $post = Post::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/posts'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/posts');
    }

    /**
     * Display the specified resource.
     *
     * @param Post $post
     * @throws AuthorizationException
     * @return void
     */
    public function show(Post $post)
    {
        $this->authorize('admin.post.show', $post);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Post $post
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Post $post)
    {
        $this->authorize('admin.post.edit', $post);


        return view('admin.post.edit', [
            'categories' => Category::all(),
            'socials' => Social::all(),
            'post' => $post,
            'mode' => 'edit',
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdatePost $request
     * @param Post $post
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdatePost $request, Post $post)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values Post
        $post->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/posts'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
                'object' => $post
            ];
        }

        return redirect('admin/posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyPost $request
     * @param Post $post
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyPost $request, Post $post)
    {
        $post->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyPost $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyPost $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    Post::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
    /**
     * @return Factory
     */
    public function sortIndex()
    {
        $data = Post::orderBy('id', 'asc')->get(['id', 'title'])->map(function ($item) {
            return [
                'id' => $item->getKey(),
                'title' => $item->title,
            ];
        });

        return view('admin.post.sortable-listing', compact('data'));
    }

    /**
     * @param Request $request
     * @return array
     */
    public function sortUpdate(Request $request): array
    {

        collect($request['sortable_array'])->each(function ($item, $key) {
            Post::where('id', $item['id'])->update(['order_column' => $key + 1]);
        });

        if ($request->ajax()) {
            return ['redirect' => url('admin/posts'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }
    }
}
