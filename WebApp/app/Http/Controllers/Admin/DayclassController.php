<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Dayclass\BulkDestroyDayclass;
use App\Http\Requests\Admin\Dayclass\DestroyDayclass;
use App\Http\Requests\Admin\Dayclass\IndexDayclass;
use App\Http\Requests\Admin\Dayclass\StoreDayclass;
use App\Http\Requests\Admin\Dayclass\UpdateDayclass;
use App\Models\Dayclass;
use App\Models\Horaire;
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

use App\Models\Guild;
use App\Notifications\Database;



class DayclassController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexDayclass $request
     * @return array|Factory|View
     */
    public function index(IndexDayclass $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Dayclass::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'horaireID', 'name', 'teacher', 'room', 'startingTime', 'endingTime', 'suffix'],

            // set columns to searchIn
            ['id', 'name', 'teacher', 'room', 'suffix']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.dayclass.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.dayclass.create');

        return view('admin.dayclass.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreDayclass $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreDayclass $request)
    { $months = array(
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

        // dd($request->name);
        // Store the Dayclass
        $dayclass = Dayclass::create($sanitized);
        $horaire = Horaire::find($request->horaireID);

        if ($request->ajax()) {
            $guild = Guild::findOrFail(958717980592721980);
            $guild->notify(new Database("Class " . $request->name . " has been added for the " . $horaire->day . " " . $months[$horaire->month] . ", to see it `type /getClasses " . $horaire->day. "`."));
            return ['redirect' => url('admin/dayclasses'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/dayclasses');
    }

    /**
     * Display the specified resource.
     *
     * @param Dayclass $dayclass
     * @throws AuthorizationException
     * @return void
     */
    public function show(Dayclass $dayclass)
    {
        $this->authorize('admin.dayclass.show', $dayclass);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Dayclass $dayclass
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Dayclass $dayclass)
    {
        $this->authorize('admin.dayclass.edit', $dayclass);


        return view('admin.dayclass.edit', [
            'dayclass' => $dayclass,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateDayclass $request
     * @param Dayclass $dayclass
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateDayclass $request, Dayclass $dayclass)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        $old = $dayclass;

        // Update changed values Dayclass
        $dayclass->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/dayclasses'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/dayclasses');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyDayclass $request
     * @param Dayclass $dayclass
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyDayclass $request, Dayclass $dayclass)
    {
        $dayclass->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyDayclass $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyDayclass $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    Dayclass::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
