<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Offer;
use App\Models\Video;
use App\Http\Requests\OfferRequest;
use LaravelLocalization;
use App\Traits\offerTrait;
use App\Events\VideoViewer;
use App\Scopes\OfferScope;
class CrudController extends Controller
{
    use OfferTrait;

    public function getOffers(){
        return Offer::get();
    }

    public function create(){
        return view('offers.create');
    }

    public function store(OfferRequest $Request){
        
        
        /* if($validator->fails()){
            //return $validator -> errors();
            return redirect()->back()->withErrors($validator)->withInputs($Request->all());
        } */
        
        //return 'okay';
        $file_name = $this -> saveImage($Request -> photo,'images/offers');
        Offer::create([
            'photo'=>$file_name,
            'name_ar'=>$Request->name_ar,
            'name_en'=>$Request->name_en,
            'price'=>$Request->price,
            'details_ar'=>$Request->details_ar,
            'details_en'=>$Request->details_en,
        ]);
        return redirect()->back()->with(['success'=>'تم إضافة العرض بنجاح']);
    }
    public function getAllOffers(){
        /* $offers = Offer::select('id','photo','name_'.LaravelLocalization::getCurrentLocale().' as name','price','details_'.LaravelLocalization::getCurrentLocale().' as details') ->get();
        return view('offers.all',compact('offers')); */
        $offers = Offer::select('id',
            'price',
            'photo',
            'name_' . LaravelLocalization::getCurrentLocale() . ' as name',
            'details_' . LaravelLocalization::getCurrentLocale() . ' as details'
        )->paginate(PAGINATION_COUNT);



        //return view('offers.all', compact('offers'));


        return view('offers.paginations',compact('offers'));

    }
    public function editOffer($offer_id){
        $offer=offer::find($offer_id);
        if(!$offer)
        return redirect() -> beck();

        $offer=offer::select('id','name_ar','name_en','details_ar','details_en','price') ->find($offer_id);
        return view('offers.edit',compact('offer'));
        return $offer_id;

    }

    public function updateOffer(OfferRequest $Request,$offer_id){
        $offer=offer::find($offer_id);
        if(!$offer){
            return redirect() -> back();

        }
        

        $offer->update($Request->all());
        return redirect() -> back() -> with(['success'=>'تم التحديث بنجاح']);
        

    }

    public function getVideo(){
        $video = video::first();
        event(new VideoViewer($video));
        return view('video')->with('video',$video,);
    }
    public function delete($offer_id)
    {
        //check if offer id exists

        $offer = Offer::find($offer_id);   // Offer::where('id','$offer_id') -> first();

        if (!$offer)
            return redirect()->back()->with(['error' => __('messages.offer not exist')]);

        $offer->delete();

        return redirect()
            ->route('offers.all')
            ->with(['success' => __('messages.offer deleted successfully')]);
        }

        public function getAllInactiveOffers(){

            // where  whereNull whereNotNull whereIn
            //Offer::whereNotNull('details_ar') -> get();
  
          // return  $inactiveOffers = Offer::invalid()->get();  //all inactive offers
  
                                    // global scope
             return  $inactiveOffers = Offer::get();  //all inactive offers

                // how to  remove global scope

            //return $offer  = Offer::withoutGlobalScope(OfferScope::class)->get();
  
  
      }

            

    
}

