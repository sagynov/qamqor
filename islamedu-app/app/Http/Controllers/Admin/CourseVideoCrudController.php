<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CourseVideoRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use Illuminate\Support\Facades\Http;

/**
 * Class CourseVideoCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class CourseVideoCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation { store as traitStore; }

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     * 
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\CourseVideo::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/course-video');
        CRUD::setEntityNameStrings(__('course.video.single'), __('course.video.plural'));
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
            'name' => 'thumbnail', 
            'label' => __('course.video.thumbnail'),
            'type'      => 'image',
            'width' => '120px',
            'height'  => '90px',
        ]);
        CRUD::addColumn(['name' => 'title', 'label' => __('course.video.title')]);
        CRUD::addColumn(['name' => 'video_url', 'label' => __('course.video.video_url')]);
        CRUD::addColumn(['name' => 'duration', 'label' => __('course.video.duration')]);
        CRUD::addColumn([
            'name' => 'item', 
            'attribute' => 'title',
            'label' => __('course.item.single'), 
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
        CRUD::setValidation(CourseVideoRequest::class);
        
        CRUD::field('title')->label(__('course.video.title'));
        CRUD::field('video_url')->label(__('course.video.video_url'));
        CRUD::field('course_item_id')
        ->type('select')
        ->label(__('course.item.single'))
        ->entity('item')
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
    public function store() {
        $video_url = $this->crud->getRequest()->request->get('video_url');
        preg_match('/(youtu\.be|youtube\.com)\/(watch\?v=)?(?<video_code>.*?)(&.*?)?$/', $video_url, $video_match);
        
        $video_code = @$video_match['video_code'] ?? null;
        $api_key = env('YOUTUBE_KEY');
        if($api_key && $video_code) {
            $this->crud->addField(['type' => 'hidden', 'name' => 'video_code']);
            $this->crud->getRequest()->request->add(['video_code'=> $video_code]);
            $response = Http::get('https://www.googleapis.com/youtube/v3/videos?id='.$video_code.'&part=snippet,contentDetails&key='.$api_key);
            $data = $response->json();
            if(isset($data['items'][0])){
                $item = $data['items'][0];
                $title = $this->crud->getRequest()->request->get('title');
                if(!$title){
                    if(isset($item['snippet']['title'])) {
                        $title = $item['snippet']['title'];
                        $this->crud->getRequest()->request->add(['title'=> $title]);
                    }
                }
                
                if(isset($item['snippet']['thumbnails']['standard']['url'])) {
                    $thumbnail = $item['snippet']['thumbnails']['standard']['url'];
                    $this->crud->addField(['type' => 'hidden', 'name' => 'thumbnail']);
                    $this->crud->getRequest()->request->add(['thumbnail'=> $thumbnail]);
                }
                if(isset($item['contentDetails']['duration'])){
                    $duration = $item['contentDetails']['duration'];
                    preg_match('/(\d+)/', $duration, $duration_array);
                    
                    foreach ($duration_array as $key => $val) {
                        $duration_array[$key] = sprintf("%02d", $val);
                    }
                    $duration_updated = implode(':', $duration_array);
                    $this->crud->addField(['type' => 'hidden', 'name' => 'duration']);
                    $this->crud->getRequest()->request->add(['duration'=> $duration_updated]);
                }
            }
        }
        return $this->traitStore();
    }
}
