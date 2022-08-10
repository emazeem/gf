<?php
use Illuminate\Support\Facades\Mail;

function getTitleFromSlug($slug){
    return ucfirst(str_replace('-',' ',$slug));
}
function sendEmail($to,$from,$subject,$message){
    if ($from==null){
        $from='connectsocial@napollo.net';
    }

    try{
        Mail::html( $message, function( $message ) use ($subject,$to) {
            $message->subject( $subject )->to( $to );
        });
        return true;
    }catch (Exception $exception){
        return response()->json($exception->getMessage());
    }
}