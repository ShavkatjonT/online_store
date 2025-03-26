<?php

namespace App\Http\Controllers;

use App\Models\UserSetting;
use App\Http\Requests\StoreUserSettingRequest;
use App\Http\Requests\UpdateUserSettingRequest;
use App\Http\Resources\UserSettingResource;

class UserSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return $this->response(UserSettingResource::collection($this->auth()->settings));
    }


    public function store(StoreUserSettingRequest $request)
    {
        if ($this->auth()->settings()->where('setting_id', $request->setting_id)->exists()) {
            return $this->error('setting already exists');
        }

        $userSetting = $this->auth()->settings()->create([
            "setting_id" => $request->setting_id,
            "value_id" => $request->value_id ?? null,
            "switch" => $request->switch ?? null,
        ]);

        return $this->success('user setting created', $userSetting);
    }



    public function update(UpdateUserSettingRequest $request, UserSetting $userSetting)
    {

        $userSetting->update([
            'switch' => $request->switch === null ? null : (bool) $request->switch,
            'value_id' => $request->value_id === null ? null : $request->value_id,
        ]);

        return $this->success('user setting updated');
    }


    public function destroy(UserSetting $userSetting)
    {
        $userSetting->delete();

        return $this->success('user setting deleted');
    }
}
