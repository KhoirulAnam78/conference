<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Str;
use App\Models\InformationPages;

class CrudInformationPages extends Component
{
    public $add=false,$content,$name, $proses_id;

    public function changeValue(){
        $this->dispatchBrowserEvent('summernote-value',['value'=>'Khoirul Anam Ni Bos']);
    }
    
    public function navigation($bool){
        $this->add = $bool;
        if($bool == false){
            $this->proses_id = null;
            $this->name = null;
            $this->content = null;
            $this->dispatchBrowserEvent('summernote-value',['value' => '']);
        }
    }

    public function save(){

        if($this->proses_id){
            $validations = [
                'name' => 'required|unique:satellite_events,name,'.$this->proses_id,
                'content' => 'required'
            ];
        }else{
            $validations = [
                'name' => 'required|unique:satellite_events,name',
                'content' => 'required'
            ];
        }
        $this->validate($validations);
        
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
                    $path = 'storage/images/'. $image_name;
    
                    //image path (path2) to save to DB so that summernote can display image in edit mode (When editing summernote content) NB: the difference btwn path and path2 is the forward slash "/" in path2
                    $path2 = 'storage/images/'. $image_name;
    
                    file_put_contents($path, $data);
    
                    // modify image source data in summernote content before upload to DB
                    $img->removeattribute('src');
                    $img->setattribute('src', $path2);
                }
            }
            $this->content = $dom->saveHtml();

            if($this->proses_id){
                InformationPages::where('id',$this->proses_id)->update([
                    'name' => $this->name,
                    'slug' => Str::slug($this->name),
                    'contents' => $this->content
                ]);
            }else{
                InformationPages::create([
                    'name' => $this->name,
                    'slug' => Str::slug($this->name),
                    'contents' => $this->content
                ]);
            }
            
            $this->navigation(false);
            $this->dispatchBrowserEvent('summernote-value',['value' => '']);
            $this->dispatchBrowserEvent('alert',['title'=>'Success','message' => 'Berhasil menyimpan data !']);
        }
    }

    public function showEdit($id){
        $data = InformationPages::find($id);
        $this->name = $data->name;
        $this->content = $data->contents;
        $this->proses_id = $id;
        $this->navigation(true);
        $this->dispatchBrowserEvent('summernote-value',['value' => $this->content]);
    }

    public function hapus($id){
        InformationPages::where('id',$id)->delete();
        $this->dispatchBrowserEvent('alert',['title'=>'Success','message' => 'Berhasil menghapus data !']);
    }

    public function render()
    {
        $pages = InformationPages::select('id','name')->get();
        return view('livewire.crud-information-pages',compact('pages'));
    }
}