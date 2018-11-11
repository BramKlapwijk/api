<?php

namespace App\Http\Controllers;

use App\ActiveModel;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($category)
    {
        $model = ActiveModel::where('slug', $category)->first();

        $view = view('categories.index');

        $view->model = $model;
        $view->data = ('App\\' . $model->name)::all();

        return $view;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($category)
    {
        $model = ActiveModel::where('slug', $category)->first();

        $view = view('categories.create');
        $data = ('App\\' . $model->name)::first();

        $view->model = $model;
        $view->fields = collect($data->toArray())->except(['created_at', 'updated_at', 'id', 'deleted_at'])->keys();

        return $view;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $category)
    {
        $model = 'App\\' . ActiveModel::where('slug', $category)->first()->name;
        $new = new $model;

        foreach ($request->except('_token') as $key => $value) {
            $new->$key = $value;
        }
        $new->save();

        return redirect($request->route('category'))->with('success', ActiveModel::where('slug', $category)->first()->name.' is created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($category, $id)
    {
        $model = ActiveModel::where('slug', $category)->first();
        $data = ('App\\' . $model->name)::find($id);

        $view = view('categories.edit');

        $view->model = $model;
        $view->id = $data->id;
        $view->record = collect($data->toArray())->except(['created_at', 'updated_at', 'id', 'deleted_at']);

        return $view;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $category, $id)
    {
        $model = 'App\\' . ActiveModel::where('slug', $category)->first()->name;
        $reccord = $model::find($id);

        foreach ($request->except(['_token', '_method']) as $key => $value) {
            $reccord->$key = $value;
        }
        $reccord->save();

        return redirect($request->route('category'))->with('success', ActiveModel::where('slug', $category)->first()->name.' is saved');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($category, $id)
    {
        if (!auth()->user()->can('delete users')) {
            return ['status' => 'danger', 'message' => 'You dont the permission to do this'];
        }

        $model = 'App\\' . ActiveModel::where('slug', $category)->first()->name;
        $reccord = $model::find($id)->delete();

        return ['status' => 'success', 'message' => 'User is deleted'];
    }
}
