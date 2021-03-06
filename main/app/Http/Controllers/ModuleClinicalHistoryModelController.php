<?php

namespace App\Http\Controllers;

use App\ModuleClinicalHistoryModel;
use App\FormTemplate;
use Illuminate\Http\Request;
use DB;


class ModuleClinicalHistoryModelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {

            $moduleclinicalHistoryModel = ModuleClinicalHistoryModel::query();
            $moduleclinicalHistoryModel->when(request()->input('search') != '', function ($q) {
                $q->where(function ($query) {
                    $query->where('description', 'like', '%' . request()->input('search') . '%')
                        ->orWhere('name', 'like', '%' . request()->input('search') . '%');
                });
            });

            $moduleclinicalHistoryModel->when((request()->input('Idmodule') && request()->input('Idmodule') != ''), function ($q) {
                $q->where('clinical_history_model_id', request()->get('Idmodule'));
            });

            return response()->success($moduleclinicalHistoryModel
            ->with('ClinicalHistoryModel')
            ->paginate(request()->get('pageSize', 10), ['*'], 'page', request()->get('page', 1)) );
        } catch (\Throwable $th) {
            return response()->error($th->getMessage(), 400);
        }
    }
    
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getFields()
    {
        try {
            
            $response = ModuleClinicalHistoryModel::
                  with(['variablesClinicalHistoryModel' => function($q){$q->orderBy('dependence', 'Asc');}, 'variablesClinicalHistoryModel.valuesForSelect'])
                  ->where('clinical_history_model_id', request()->get('id'))
                  ->get();
       
            return response()->success($response);
           
        } catch (\Throwable $th) {
            return response()->error($th->getMessage(), 400);
        }
    }
    
    
    public function getFieldsByForms()
    {
        try {
            
            $response = FormTemplate::
                  with(['variablesFormTemplate' => function($q){$q->orderBy('dependence', 'Asc');}, 'variablesFormTemplate.valuesForSelect'])
                  ->where('id', request()->get('form'))
                  ->get();
       
            return response()->success($response);
           
        } catch (\Throwable $th) {
            return response()->error($th->getMessage(), 400);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $req = request()->get('modulesForm');
        $data = collect([]);
        
        foreach($req[0]['variables'] as $datum){
            
            $data->put($datum['name'], $datum['valor']);

        }
        
        ModuleClinicalHistoryModel::create($data->all());
        return response()->success('Operacion Realizada correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\moduleHistoryModel  $moduleHistoryModel
     * @return \Illuminate\Http\Response
     */
    public function show(moduleHistoryModel $moduleHistoryModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\moduleHistoryModel  $moduleHistoryModel
     * @return \Illuminate\Http\Response
     */
    public function edit(moduleHistoryModel $moduleHistoryModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\moduleHistoryModel  $moduleHistoryModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, moduleHistoryModel $moduleHistoryModel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\moduleHistoryModel  $moduleHistoryModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(moduleHistoryModel $moduleHistoryModel)
    {
        //
    }
}
