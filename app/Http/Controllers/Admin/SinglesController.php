<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Single\BulkDestroySingle;
use App\Http\Requests\Admin\Single\DestroySingle;
use App\Http\Requests\Admin\Single\IndexSingle;
use App\Http\Requests\Admin\Single\StoreSingle;
use App\Http\Requests\Admin\Single\UpdateSingle;
use App\Models\Single;
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

class SinglesController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexSingle $request
     * @return array|Factory|View
     */
    public function index(IndexSingle $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Single::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'title', 'enabled'],

            // set columns to searchIn
            ['id', 'title']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.single.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.single.create');

        return view('admin.single.create',[
            'mode' => 'create'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreSingle $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreSingle $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the Single
        $single = Single::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/singles'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/singles');
    }

    /**
     * Display the specified resource.
     *
     * @param Single $single
     * @throws AuthorizationException
     * @return void
     */
    public function show(Single $single)
    {
        $this->authorize('admin.single.show', $single);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Single $single
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Single $single)
    {
        $this->authorize('admin.single.edit', $single);


        return view('admin.single.edit', [
            'single' => $single,
            'mode' => 'edit'
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateSingle $request
     * @param Single $single
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateSingle $request, Single $single)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values Single
        $single->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/singles'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
                'object' => $single
            ];
        }

        return redirect('admin/singles');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroySingle $request
     * @param Single $single
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroySingle $request, Single $single)
    {
        $single->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroySingle $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroySingle $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    Single::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
