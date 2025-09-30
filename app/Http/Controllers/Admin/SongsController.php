<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Song\BulkDestroySong;
use App\Http\Requests\Admin\Song\DestroySong;
use App\Http\Requests\Admin\Song\IndexSong;
use App\Http\Requests\Admin\Song\StoreSong;
use App\Http\Requests\Admin\Song\UpdateSong;
use App\Models\Song;
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

class SongsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexSong $request
     * @return array|Factory|View
     */
    public function index(IndexSong $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Song::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'title'],

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

        return view('admin.song.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.song.create');

        return view('admin.song.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreSong $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreSong $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the Song
        $song = Song::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/songs'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/songs');
    }

    /**
     * Display the specified resource.
     *
     * @param Song $song
     * @throws AuthorizationException
     * @return void
     */
    public function show(Song $song)
    {
        $this->authorize('admin.song.show', $song);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Song $song
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Song $song)
    {
        $this->authorize('admin.song.edit', $song);


        return view('admin.song.edit', [
            'song' => $song,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateSong $request
     * @param Song $song
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateSong $request, Song $song)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values Song
        $song->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/songs'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/songs');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroySong $request
     * @param Song $song
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroySong $request, Song $song)
    {
        $song->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroySong $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroySong $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    Song::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
