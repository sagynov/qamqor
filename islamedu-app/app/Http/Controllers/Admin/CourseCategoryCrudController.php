<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CourseCategoryRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class CourseCategoryCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class CourseCategoryCrudController extends CrudController
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
        CRUD::setModel(\App\Models\CourseCategory::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/course-category');
        CRUD::setEntityNameStrings(__('course.category.single'), __('course.category.plural'));
    }

    /**
     * Define what happens when the List operation is loaded.
     * 
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        CRUD::addColumn(['name' => 'title', 'label' => __('course.category.title')]);
        CRUD::addColumn([
            'name' => 'icon', 
            'label' => __('course.category.icon'),
            'type'      => 'image',
            // image from a different disk (like s3 bucket)
            'disk'   => 'public', 
            // optional width/height if 25px is not ok with you
            'height' => '30px',
            'width'  => '30px',
        ]);
        CRUD::addColumn([
            'name' => 'items',
            'label' => __('course.category.items_count'),
            'type' => 'relationship_count',
            'suffix' => ''
        ]);

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
        CRUD::setValidation(CourseCategoryRequest::class);

        CRUD::addField(['name' => 'title', 'label' => __('course.category.title')]);
        CRUD::addField([
            'name' => 'icon', 
            'label' => __('course.category.icon'),
            'type'      => 'upload',
            'upload'    => true,
            'disk'      => 'public'
        ]);

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
}
