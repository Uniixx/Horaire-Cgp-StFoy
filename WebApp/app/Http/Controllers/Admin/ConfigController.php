<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Config\BulkDestroyConfig;
use App\Http\Requests\Admin\Config\DestroyConfig;
use App\Http\Requests\Admin\Config\IndexConfig;
use App\Http\Requests\Admin\Config\StoreConfig;
use App\Http\Requests\Admin\Config\UpdateConfig;
use App\Models\Config;
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

class ConfigController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexConfig $request
     * @return array|Factory|View
     */
    public function index(IndexConfig $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Config::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['guildId', 'id', 'logchannel', 'prefix', 'welcomechannel'],

            // set columns to searchIn
            ['guildId', 'id', 'logchannel', 'prefix', 'welcomechannel']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.config.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.config.create');

        return view('admin.config.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreConfig $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreConfig $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the Config
        $config = Config::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/configs'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/configs');
    }

    /**
     * Display the specified resource.
     *
     * @param Config $config
     * @throws AuthorizationException
     * @return void
     */
    public function show(Config $config)
    {
        $this->authorize('admin.config.show', $config);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Config $config
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Config $config)
    {
        $this->authorize('admin.config.edit', $config);


        return view('admin.config.edit', [
            'config' => $config,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateConfig $request
     * @param Config $config
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateConfig $request, Config $config)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values Config
        $config->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/configs'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/configs');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyConfig $request
     * @param Config $config
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyConfig $request, Config $config)
    {
        $config->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyConfig $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyConfig $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    Config::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
