<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Horaire\BulkDestroyHoraire;
use App\Http\Requests\Admin\Horaire\DestroyHoraire;
use App\Http\Requests\Admin\Horaire\IndexHoraire;
use App\Http\Requests\Admin\Horaire\StoreHoraire;
use App\Http\Requests\Admin\Horaire\UpdateHoraire;
use App\Models\Horaire;
use App\Models\Guild;
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

use App\Notifications\Database;


class HoraireController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param IndexHoraire $request
     * @return array|Factory|View
     */
    public function index(IndexHoraire $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Horaire::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['day', 'guildId', 'id', 'month', 'year'],

            // set columns to searchIn
            ['guildId', 'id']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.horaire.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.horaire.create');

        return view('admin.horaire.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreHoraire $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreHoraire $request)
    {
        $months = array(
            1 => "January",
            2 => "February",
            3 => "March",
            4 => "April",
            5 => "May",
            6 => "June",
            7 => "July",
            8 => "August",
            9 => "September",
            10 => "October",
            11 => "November",
            12 => "December"
        );
        
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the Horaire
        $horaire = Horaire::create($sanitized);

        if ($request->ajax()) {
            $guild = Guild::findOrFail(958717980592721980);
            $guild->notify(new Database("New schedule for the " . $request->day . " " . $months[$request->month] . " " . $request->year . ". To see it `type /getClasses " . $request->day. "`."));
            return ['redirect' => url('admin/horaires'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/horaires');
    }

    /**
     * Display the specified resource.
     *
     * @param Horaire $horaire
     * @throws AuthorizationException
     * @return void
     */
    public function show(Horaire $horaire)
    {
        $this->authorize('admin.horaire.show', $horaire);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Horaire $horaire
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Horaire $horaire)
    {
        $this->authorize('admin.horaire.edit', $horaire);


        return view('admin.horaire.edit', [
            'horaire' => $horaire,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateHoraire $request
     * @param Horaire $horaire
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateHoraire $request, Horaire $horaire)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values Horaire
        $horaire->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/horaires'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/horaires');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyHoraire $request
     * @param Horaire $horaire
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyHoraire $request, Horaire $horaire)
    {
        $horaire->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyHoraire $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyHoraire $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    Horaire::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
