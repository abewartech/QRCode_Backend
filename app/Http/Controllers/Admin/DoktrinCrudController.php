<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\DoktrinRequest;
use App\Models\Doktrin;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class DoktrinCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class DoktrinCrudController extends CrudController
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
        CRUD::setModel(\App\Models\Doktrin::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/doktrin');
        CRUD::setEntityNameStrings('doktrin operasi', 'doktrin operasi');
        if (backpack_user()->hasRole('user')) {
//dd(backpack_user()->can('view_protected_document'));
//dd(count(backpack_user()->permissions) > 0);
            if (!count(backpack_user()->permissions) > 0) {
                $this->crud->addClause('where', 'is_protected', '0');
            }
        }
    }

    /**
     * Define what happens when the List operation is loaded.
     *
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        $this->crud->addButtonFromView('line', 'preview', 'preview', 'end');
        $this->crud->addButtonFromView('line', 'download', 'download', 'end');
        $this->crud->denyAccess('show');
        CRUD::column('id')->label('No');
        CRUD::column('no_doktrin');
        CRUD::column('name');
        CRUD::column('tgl');
        CRUD::column('pembina');
        // CRUD::column('file');
        // CRUD::column('created_at');
        // CRUD::column('updated_at');

        /**
         * Columns can be defined using the fluent syntax or array syntax:
         * - CRUD::column('price')->type('number');
         * - CRUD::addColumn(['name' => 'price', 'type' => 'number']);
         */
    }

    /**
     * Define what happens when the Create operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(DoktrinRequest::class);

        CRUD::field('no_doktrin');
        CRUD::field('name');
        CRUD::field('tgl')->type('date');
        CRUD::field('pembina');
        CRUD::field('file')->type('upload')->upload(true)->disk('public_beneran');
        CRUD::field('is_protected')->type('checkbox');

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

    public function download($id)
    {
        $doktrin = Doktrin::find($id);
        $file_path = public_path($doktrin->file);
        return response()->download($file_path);
    }

    public function previewpdf($id)
    {
        $doktrin = Doktrin::find($id);
        $file_path = public_path($doktrin->file);
        return response()->file($file_path);
    }
}
