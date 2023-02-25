<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CourseItemRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class CourseItemCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class CourseItemCrudController extends CrudController
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
        CRUD::setModel(\App\Models\CourseItem::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/course-item');
        CRUD::setEntityNameStrings(__('course.item.single'), __('course.item.plural'));
    }

    /**
     * Define what happens when the List operation is loaded.
     * 
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        CRUD::addColumn([
            'name' => 'image', 
            'label' => __('course.item.image'),
            'type'      => 'image',
            // image from a different disk (like s3 bucket)
            'disk'   => 'public', 
            // optional width/height if 25px is not ok with you
            'width' => '150px',
            'height'  => '150px',
        ]);
        CRUD::addColumn(['name' => 'title', 'label' => __('course.item.title')]);
        CRUD::addColumn(['name' => 'description', 'label' => __('course.item.description')]);
        CRUD::addColumn([
            'name' => 'category', 
            'attribute' => 'title',
            'label' => __('course.category.single'), 
        ]);
        CRUD::addColumn([
            'name'  => 'language',
            'label' => __('course.item.language'),
            'type'  => 'enum',
            // optional, specify the enum options with custom display values
            'options' => [
                'kk' => 'Қазақша',
                'ru' => 'Русский'
            ]
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
        CRUD::setValidation(CourseItemRequest::class);

        CRUD::addField([
            'name' => 'image', 
            'label' => __('course.item.image'),
            'type'      => 'upload',
            'upload'    => true,
            'disk'      => 'public'
        ]);
        CRUD::field('title')->label(__('course.item.title'));
        CRUD::field('description')->label(__('course.item.description'));
        CRUD::addField([
            'name'  => 'language',
            'label' => __('course.item.language'),
            'type'  => 'enum',
            // optional, specify the enum options with custom display values
            'options' => [
                'kk' => 'Қазақша',
                'ru' => 'Русский'
            ]
        ]);
        CRUD::field('course_category_id')
        ->type('select')
        ->label(__('course.category.single'))
        ->entity('category')
        ->attribute('title')
        ->size(6);

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
