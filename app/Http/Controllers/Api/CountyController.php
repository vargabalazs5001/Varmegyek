<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\County;
use App\Http\Controllers\Controller;


class CountyController extends Controller
{
    public function index()
    {
        $data = County::orderBy('name')->get();
        $content = json_encode(['data' => $data, 'message' => 'Listed']);
        return response($content, Response::HTTP_OK);
    }
    public function save(Request $request){
        $id = $request->get('id');
        if($id){
            $entity = County::find($id);
            if(!$entity) {
                $content = json_encode(['data' => [], 'message' => 'NotFound']);
                return response($content, Response::HTTP_NOT_FOUND);
            }
            $entity = $this->setEntityData($entity, $request);
            $entity->update();
            $content = json_encode(['data' => [], 'message' => 'Updated']);
            return response($content);
        }
        $entity = new County();
        $entity = $this->setEntityData($entity, $request);
        $entity->save();
        $content = json_encode(['data' => $entity, 'message' => 'Created']);
        return response($content, Response::HTTP_CREATED);
    }
    public function search(Request $request){
        $counties = County::where('name', 'like', '%' . $request->input('filter') . '%')->get();
        $content = json_encode(['data' => $counties, 'message' => 'Found']);
        return response($content, Response::HTTP_FOUND);
    }
    public function delete(Request $request, $id){
        if($id){
            $entity = County::find($id);
            if(!$entity){
                $content = json_encode(['data' => [], 'message' => 'NotFound']);
                return response($content, Response::HTTP_NOT_FOUND);
            }
            $entity = $this->setEntityData($entity, $request);
            $entity->delete();
            $content = json_encode(['data' => [], 'message' => 'Deleted']);
            return response($content);
        }
    }
    private function setEntityData(County $entity, Request $request): ?County
    {
        $entity->name = $request->get('name');

        return $entity;
    }
}
