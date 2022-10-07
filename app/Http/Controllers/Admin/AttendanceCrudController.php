<?php

namespace App\Http\Controllers\Admin;

use App\Exports\AttExport;
use App\Http\Requests\AttendanceRequest;
use App\Models\User;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use Maatwebsite\Excel\Facades\Excel;

/**
 * Class AttendanceCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class AttendanceCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     *
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\Attendance::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/attendance');
        CRUD::setEntityNameStrings('attendance', 'attendances');
        $this->crud->denyAccess(['show', 'create', 'update', 'delete']);
    }

    /**
     * Define what happens when the List operation is loaded.
     *
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        $this->crud->addButtonFromView('top', 'exportondemand', 'exportondemand', 'end');
        // $this->crud->removeAllButtons();
        $this->crud->enableExportButtons();
        CRUD::column('id');
        CRUD::column('user_id')->type('select')->entity('userId')->attribute('name')->model('App\Models\User');
        CRUD::column('latitude');
        CRUD::column('longitude');
        CRUD::column('created_at');
        CRUD::column('updated_at');

        /**
         * Columns can be defined using the fluent syntax or array syntax:
         * - CRUD::column('price')->type('number');
         * - CRUD::addColumn(['name' => 'price', 'type' => 'number']);
         */
        $this->crud->addFilter([
            'name' => 'user_id',
            'type' => 'select2',
            'label' => 'User',
        ], function () {
            return User::all()->pluck('name', 'id')->toArray();
        }, function ($value) {
            $value = json_decode($value);
            if (!empty($value)) {
                $this->crud->addClause('where', 'user_id', $value);
            }
        });
        $this->crud->addFilter([
            'type' => 'date_range',
            'name' => 'created_at',
            'label' => 'Date range',
        ],
            false,
            function ($value) {
                $dates = json_decode($value);
                $this->crud->addClause('where', 'created_at', '>=', $dates->from);
                $this->crud->addClause('where', 'created_at', '<=', $dates->to . ' 23:59:59');
            });
    }

    /**
     * Define what happens when the Create operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(AttendanceRequest::class);

        CRUD::field('id');
        CRUD::field('user_id');
        CRUD::field('latitude');
        CRUD::field('longitude');
        CRUD::field('created_at');
        CRUD::field('updated_at');

        /**
         * Fields can be defined using the fluent syntax or array syntax:
         * - CRUD::field('price')->type('number');
         * - CRUD::addField(['name' => 'price', 'type' => 'number']));
         */
    }

    /**
     * Define what happens when the Update operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-update
     * @return void
     */
    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }

    public function historyexport($start, $end)
    {
        return Excel::download(new AttExport($start, $end), 'Attendance-' . $start . '-' . $end . '.xlsx');
    }

    public function statistics(){
        return view('statistics');
    }
}
