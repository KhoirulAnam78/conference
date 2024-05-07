<?php

namespace App\Http\Livewire;

use App\Models\Payment;
use Livewire\Component;
use App\Models\UploadAbstract;
use App\Models\UploadFulltext;
use Illuminate\Support\Facades\Auth;
use Livewire\WithFileUploads;

class FulltextForm extends Component
{
    public $title, $fulltext, $payment_id, $payment;
    public $add = false, $edit = false, $abstract_edit_id, $abstract_delete_id;

    use WithFileUploads;
    public function mount()
    {
        $this->payment = Payment::where('participant_id', Auth::user()->participant->id)->where('validation', 'valid')->get();
        // dd($this->payment);
    }
    public function rules()
    {
        return
            [
                'title' => 'required',
                'payment_id' => 'required',
                'fulltext' => 'required|file|mimes:pdf',
            ];
    }

    //Custom Errror messages for validation
    protected $messages = [
        'title.required' => 'Title is required !',
        'payment_id.required' => 'Abstract is required !',
        'fulltext.required' => 'Fulltext is required !',
        'fulltext.file' => 'Fulltext must type a file !',
        'fulltext.mimes' => 'Fulltext must have .pdf format !',
    ];

    //Reatime Validation
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function add()
    {
        $this->add = true;
        $this->dispatchBrowserEvent('to-top');
        $this->resetErrorBag();
        $this->resetValidation();
    }


    public function empty()
    {
        $this->abstract_edit_id = null;
        $this->title = null;
        $this->fulltext = null;
        $this->payment_id = null;
        $this->add = false;
    }

    // public function editAbstract($id)
    // {
    //     $abstract = UploadAbstract::find($id);
    //     $this->abstract_edit_id = $id;
    //     $this->topic = $abstract->topic;
    //     $this->type = $abstract->type;
    //     $this->title = $abstract->title;
    //     $this->keywords = $abstract->keywords;
    //     $this->authors = $abstract->authors;
    //     $this->abstract = $abstract->abstract;
    //     $this->institutions = $abstract->institutions;
    //     $this->presenter = $abstract->presenter;
    //     $this->edit = true;
    // }

    // public function update()
    // {
    //     $this->validate();
    //     UploadAbstract::where('id', $this->abstract_edit_id)->update([
    //         'topic' => $this->topic,
    //         'type' => $this->type,
    //         'title' => $this->title,
    //         'authors' => $this->authors,
    //         'institutions' => $this->institutions,
    //         'abstract' => $this->abstract,
    //         'keywords' => $this->keywords,
    //         'presenter' => $this->presenter,
    //     ]);

    //     session()->flash('message', 'Edit abstract was successful !');
    //     $this->empty();
    //     $this->cancel();
    // }

    public function cancel()
    {
        $this->add = false;
        // $this->edit = false;
        $this->resetErrorBag();
        $this->resetValidation();
        $this->dispatchBrowserEvent('to-top');
    }

    public function save()
    {
        $this->validate();

        $filePath = $this->fulltext->store('fulltext');
        UploadFulltext::create([
            'title' => $this->title,
            'payment_id' => $this->payment_id,
            'fulltext' => $filePath,
            'validation' => 'not yet validated',
            'validated_by' => null
        ]);

        session()->flash('message', 'Upload fulltext was successful !');
        $this->cancel();
        $this->empty();
    }

    public function render()
    {
        return view('livewire.fulltext-form', [
            'fulltexts' => UploadFulltext::whereRelation('payment', 'participant_id', Auth::user()->participant->id)->latest()->get()
        ]);
    }
}
