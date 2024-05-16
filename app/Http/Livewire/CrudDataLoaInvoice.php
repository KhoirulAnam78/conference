<?php

namespace App\Http\Livewire;

use GuzzleHttp\Client;
use Livewire\Component;
use App\Models\GlobalSetting;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class CrudDataLoaInvoice extends Component
{
    use WithFileUploads;
    public $kop, $content,$stempel,$ttd_loa,$ttd_invoice,$ttd_receipt;
    public $image_ttd_loa,$image_ttd_invoice,$image_ttd_receipt;
    public $pathStempel,$pathTtdLoa,$pathTtdInvoice,$pathTtdReceipt;
    
    public function inputGlobalSetting($name,$value){
        $data = GlobalSetting::where('name',$name)->first();
        if($data){
            $data->update([
                'value' => $value
            ]);
        }else{
            GlobalSetting::create([
                'name' => $name,
                'value' => $value
            ]);
        }
    }

    public function save(){
        if($this->stempel){
            $this->validate([
                'stempel' => 'max:5024|mimes:jpg,jpeg,png'
            ]);
        }
        
        if($this->image_ttd_loa){
            $this->validate([
                'image_ttd_loa' => 'max:5024|mimes:jpg,jpeg,png'
            ]);
        }
        
        if($this->image_ttd_invoice){
            $this->validate([
                'image_ttd_invoice' => 'max:5024|mimes:jpg,jpeg,png'
            ]);
        }
        
        if($this->image_ttd_receipt){
            $this->validate([
                'image_ttd_receipt' => 'max:5024|mimes:jpg,jpeg,png'
            ]);
        }
        
        if($this->content){
            $dom = new \domdocument();
            $dom->loadHtml($this->content, LIBXML_NOWARNING | LIBXML_NOERROR);
    
            //identify img element
            $images = $dom->getelementsbytagname('img');
    
             //loop over img elements, decode their base64 source data (src) and save them to folder,
            //and then replace base64 src with stored image URL.
            foreach($images as $k => $img){
                //collect img source data
                $data = $img->getattribute('src');
    
                //checking if img source data is image by detecting 'data:image' in string
                if (strpos($data, 'data:image')!==false){
                    list($type, $data) = explode(';', $data);
                    list(, $data)      = explode(',', $data);
                
                
                    //decode base64
                    $data = base64_decode($data);
    
                    //naming image file
                    $image_name= time().rand(000,999).$k.'.jpg';
    
                    // image path (path) to use upload file to
                    $path = public_path('/storage/images/'. $image_name);
    
                    //image path (path2) to save to DB so that summernote can display image in edit mode (When editing summernote content) NB: the difference btwn path and path2 is the forward slash "/" in path2
                    $path2 = public_path('/storage/images/'. $image_name);
    
                    file_put_contents($path, $data);
    
                    // modify image source data in summernote content before upload to DB
                    $img->removeattribute('src');
                    $img->setattribute('src', $path2);
                }
            }
            $this->content = $dom->saveHtml();
            $this->inputGlobalSetting('kop',$this->content);
        }
        $this->inputImageGlobalSetting($this->stempel,'stempel');
        $this->inputImageGlobalSetting($this->image_ttd_invoice,'image_ttd_invoice');
        $this->inputImageGlobalSetting($this->image_ttd_receipt,'image_ttd_receipt');
        $this->inputImageGlobalSetting($this->image_ttd_loa,'image_ttd_loa');
        $this->inputGlobalSetting('ttd_loa',$this->ttd_loa);
        $this->inputGlobalSetting('ttd_invoice',$this->ttd_invoice);
        $this->inputGlobalSetting('ttd_receipt',$this->ttd_receipt);
        
        $this->dispatchBrowserEvent('alert',['title'=>'Success','message' => 'Berhasil mengubah data !']);
    }

    public function inputImageGlobalSetting($file,$name){
        if($file){
            $file_path = $file->temporaryUrl();
            $client = new Client();
            
            // REMOVE BG API
            // dguB25AP7Jxdwda5EtuD3Gf9 API KEY

            $res = $client->post('https://api.remove.bg/v1.0/removebg', [
                'multipart' => [
                    [
                        'name'     => 'image_file',
                        'contents' => fopen($file_path,'r')
                    ],
                    [
                        'name'     => 'size',
                        'contents' => 'auto'
                    ]
                ],
                'headers' => [
                    'X-Api-Key' => 'dguB25AP7Jxdwda5EtuD3Gf9'
                ]
            ]);

            // $fp = fopen($name." no-bg.png", "wb");
            // fwrite($fp, $res->getBody());
            // fclose($fp);


            $imageContent = (string) $res->getBody();
            $path_file = 'images/'.$name.date('Y-m-d').'no-bg.png';
            Storage::disk('public')->put($path_file, $imageContent);
            $image = GlobalSetting::where('name',$name)->first();
            if($image){
                Storage::delete($image->value);
                GlobalSetting::where('name',$name)->update([
                    'value' => $path_file
                ]);
            }else{
                GlobalSetting::create([
                    'name' => $name,
                    'value' => $path_file
                ]);
            }
        }
    }

    public function getValue($name){
        $data = GlobalSetting::where('name',$name)->first();
        return $data->value ?? null;
    }

    public function mount(){
        $this->kop = $this->getValue('kop');
        $this->ttd_loa = $this->getValue('ttd_loa');
        $this->ttd_invoice = $this->getValue('ttd_invoice');
        $this->ttd_receipt = $this->getValue('ttd_receipt');
        $this->pathStempel = $this->getValue('stempel');
        $this->pathTtdLoa = $this->getValue('image_ttd_loa');
        $this->pathTtdInvoice = $this->getValue('image_ttd_invoice');
        $this->pathTtdReceipt = $this->getValue('image_ttd_receipt');
    }
    
    public function render()
    {
        return view('livewire.crud-data-loa-invoice');
    }
}