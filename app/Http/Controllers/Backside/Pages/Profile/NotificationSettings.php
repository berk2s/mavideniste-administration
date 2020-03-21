<?php

namespace App\Http\Controllers\Backside\Pages\Profile;

use App\Http\Controllers\Controller;
use App\Models\DeliveredNotificationSettings;
use App\Models\EnrouteNotificationSettings;
use App\Models\PreparingNotificationSettings;
use Illuminate\Http\Request;

class NotificationSettings extends Controller
{
    public function get_view(){

        $prepareTitle = PreparingNotificationSettings::where('id', 1)->get()[0]->title;
        $prepareText  = PreparingNotificationSettings::where('id', 1)->get()[0]->text;

        $enrouteTitle = EnrouteNotificationSettings::where('id', 1)->get()[0]->title;
        $enrouteText = EnrouteNotificationSettings::where('id', 1)->get()[0]->text;

        $deliveredTitle = DeliveredNotificationSettings::where('id', 1)->get()[0]->title;
        $deliveredText = DeliveredNotificationSettings::where('id', 1)->get()[0]->text;

        return view('backinterface.pages.profile.notificationsettings', compact([
            'prepareTitle',
            'prepareText',
            'enrouteTitle',
            'enrouteText',
            'deliveredTitle',
            'deliveredText',
        ]));
    }

    public function handle_prepare(Request $request){
        $title = $request->prepare_notification_title;
        $text = $request->prepare_notification_text;

        $update = PreparingNotificationSettings::find(1);
        $update->title = $title;
        $update->text = $text;
        $update->save();
        return redirect('/bildirim-ayarlari');
    }

    public function handle_enroute(Request $request){
        $title = $request->enroute_notification_title;
        $text = $request->enroute_notification_text;

        $update = EnrouteNotificationSettings::find(1);
        $update->title = $title;
        $update->text = $text;
        $update->save();
        return redirect('/bildirim-ayarlari');
    }

    public function handle_delivered(Request $request){
        $title = $request->delivered_notification_title;
        $text = $request->delivered_notification_text;

        $update = DeliveredNotificationSettings::find(1);
        $update->title = $title;
        $update->text = $text;
        $update->save();
        return redirect('/bildirim-ayarlari');
    }

}
