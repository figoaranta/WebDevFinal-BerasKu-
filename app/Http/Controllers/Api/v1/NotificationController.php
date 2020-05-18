<?php

namespace App\Http\Controllers\Api\v1;
use Illuminate\Http\Request;
use App\Notification;
use App\Http\Resources\NotificationResource;
use App\Http\Resources\NotificationResourceCollection;
use App\Http\Controllers\Controller;

class NotificationController extends Controller
{
	public function index():NotificationResourceCollection
	{
		return new NotificationResourceCollection(Notification::paginate());
	}

    public function show(Notification $notification):NotificationResource
    {
    	return new NotificationResource($notification);
    }

    public function store(Request $request):NotificationResource
    {
    	$request->validate([
    		'accountId' => 'required',
    		'notificationMessage' => 'required'
    	]);

    	$notification = Notification::create($request->all());
    	return new NotificationResource($notification);
    }

    public function update(Request $request , Notification $notification):NotificationResource
    {
    	$notification->update($request->all());
    	return new NotificationResource($notification);
    }

    public function destroy(Notification $notification)
    {
    	$notification->delete();
    	return response()->json([]);
    }
}
