<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Image;
use GIFEndec\Events\FrameDecodedEvent;
use GIFEndec\IO\FileStream;
use GIFEndec\Decoder;

class ApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function gif(Request $request) {

        if ($request->hasFile('file')) {

            foreach ($request->file('file') as $file) {

                $image = $file;
                $fileName = uniqid() . '.' . $image->getClientOriginalExtension();
                $location = 'uploads/' . $fileName;

                // Image::make($image)->save($location);

                $gifStream = new FileStream($image);

          
                 //Create Decoder instance from MemoryStream
        
                $gifDecoder = new Decoder($gifStream);

                
                //Run decoder. Pass callback function to process decoded Frames when they're ready.
                 
                $gifDecoder->decode(function (FrameDecodedEvent $event) {
                    //Convert frame index to zero-padded strings (001, 002, 003)
                     
                    $paddedIndex = str_pad($event->frameIndex, 3, '0', STR_PAD_LEFT);
                    //Write frame images to directory
                    $event->decodedFrame->getStream()->copyContentsToFile(

                       "uploads/frame{$paddedIndex}.gif"
                    );
                });

                $frameArray = [];

                foreach (glob('uploads/frame*.gif') as $frame) {
                    $frameArray[] = $frame;
                }

                
                return response()->json(['location' => $location, 'frames' => $frameArray]);
            }

        }
        // if ($request->hasFile('file')) {
        //     return "hello";
        //     $data = ["file" => []];
        //     foreach($request->file('file') as $key => $file) {
        //         $data["file"][$key] = base64_encode(file_get_contents($request->file('file')[$key]->path()));
        //     }
        //     return $data;
        // }

        // return 'no files';
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
