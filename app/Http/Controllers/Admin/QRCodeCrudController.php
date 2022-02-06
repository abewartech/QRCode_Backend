<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\QRCodeRequest;
use App\Models\QRCode as ModelsQRCode;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use Barryvdh\DomPDF\Facade\Pdf;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

/**
 * Class QRCodeCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class QRCodeCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation {
        store as traitStore;
    }
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation {
        update as traitUpdate;
    }
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     *
     * @return void
     */
    function setup()
    {
        CRUD::setModel(\App\Models\QRCode::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/q-r-code');
        CRUD::setEntityNameStrings('qr code', 'qr codes');
    }

    /**
     * Define what happens when the List operation is loaded.
     *
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    function setupListOperation()
    {
        $this->crud->denyAccess('show');
        $this->crud->addButtonFromView('line', 'print', 'print', 'end');
        CRUD::column('name');
        CRUD::column('qrcode')->type('qrcode');

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
    function setupCreateOperation()
    {
        CRUD::setValidation(QRCodeRequest::class);

        CRUD::field('name')->type('text');
        // CRUD::field('qrcode')->type('image')->crop(false)->aspect_ratio(0);

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
    function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }

    /**
     * Store a newly created resource in the database.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    function store()
    {
        $this->crud->setRequest($this->crud->validateRequest());
        $this->crud->unsetValidation(); // validation has already been run

        $response = $this->traitStore();

        $name = $this->crud->entry->name;

        $result = QrCode::generate($name);

        $qrcode = ModelsQRCode::find($this->crud->entry->id);
        $qrcode->qrcode = $result;
        $qrcode->update();

        return $response;
    }

    /**
     * Update the specified resource in the database.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    function update()
    {
        $this->crud->setRequest($this->crud->validateRequest());
        $this->crud->unsetValidation(); // validation has already been run

        $response = $this->traitUpdate();

        $name = $this->crud->entry->name;

        $result = QrCode::generate($name);

        $qrcode = ModelsQRCode::find($this->crud->entry->id);
        $qrcode->qrcode = $result;
        $qrcode->update();

        return $response;
    }

    function print($id) {
        $qrcode = ModelsQRCode::find($id);
        $result = QrCode::size(300)->generate($qrcode->name);

        $logo = "data:image/svg+xml;base64,". base64_encode($result);

        $pdf = PDF::loadView('pdf.qr', compact('logo'));
        return $pdf->download('qr.pdf');
    }
}
