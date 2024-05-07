<?php

namespace App\Http\Livewire;

use App\Models\UploadAbstract;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class AbstractForm extends Component
{
    public $topic, $type, $title, $authors, $institutions, $abstract, $keywords, $presenter;
    public $add = false, $edit = false, $abstract_edit_id, $abstract_delete_id;

    public function mount()
    {
        $this->presenter = Auth::user()->participant->full_name1;
    }
    public function rules()
    {
        return
            [
                'topic' => 'required|in:organic and bio chemistry,analytical and enviromental chemistry,inorganic and material chemistry,physical and computation chemistry,chemical education',
                'type' => 'required',
                'title' => 'required',
                'authors' => 'required',
                'institutions' => 'required',
                'abstract' => 'required',
                'keywords' => 'required',
                'presenter' => 'required',
            ];
    }

    //Custom Errror messages for validation
    protected $messages = [
        'topic.required' => 'topic is required !',
        'topic.in' => 'topic can only contain (Organic and Bio Chemistry, Analytical and Enviromental Chemistry, Inorganic and Material Chemistry, Physical and Computation Chemistry, Chemical Education) !',
        'type.required' => 'Type is required !',
        'title.required' => 'Title is required !',
        'keywords.required' => 'Keywords is required !',
        'authors.required' => 'Authors type is required !',
        'institutions.required' => 'Institutions is required !',
        'abstract.required' => 'Abstract is required !',
        'presenter.required' => 'Presenter is required !',
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
        $this->topic = null;
        $this->type = null;
        $this->title = null;
        $this->keywords = null;
        $this->authors = null;
        $this->abstract = null;
        $this->institutions = null;
        $this->presenter = null;
        $this->edit = false;
    }

    public function editAbstract($id)
    {
        $abstract = UploadAbstract::find($id);
        $this->abstract_edit_id = $id;
        $this->topic = $abstract->topic;
        $this->type = $abstract->type;
        $this->title = $abstract->title;
        $this->keywords = $abstract->keywords;
        $this->authors = $abstract->authors;
        $this->abstract = $abstract->abstract;
        $this->institutions = $abstract->institutions;
        $this->presenter = $abstract->presenter;
        $this->edit = true;
    }

    public function update()
    {
        $this->validate();
        UploadAbstract::where('id', $this->abstract_edit_id)->update([
            'topic' => $this->topic,
            'type' => $this->type,
            'title' => $this->title,
            'authors' => $this->authors,
            'institutions' => $this->institutions,
            'abstract' => $this->abstract,
            'keywords' => $this->keywords,
            'presenter' => $this->presenter,
        ]);

        session()->flash('message', 'Edit abstract was successful !');
        $this->empty();
        $this->cancel();
    }

    public function cancel()
    {
        $this->add = false;
        $this->edit = false;
        $this->resetErrorBag();
        $this->resetValidation();
        $this->dispatchBrowserEvent('to-top');
    }

    public function save()
    {
        $this->validate();
        UploadAbstract::create([
            'topic' => $this->topic,
            'type' => $this->type,
            'title' => $this->title,
            'authors' => $this->authors,
            'institutions' => $this->institutions,
            'abstract' => $this->abstract,
            'keywords' => $this->keywords,
            'presenter' => $this->presenter,
            'participant_id' => Auth::user()->participant->id,
            'status' => 'not yet reviewed'
        ]);

        session()->flash('message', 'Add abstract was successful !');
        $this->cancel();
        $this->empty();
    }



    public function render()
    {
        return view('livewire.abstract-form', [
            'abstracts' => UploadAbstract::where('participant_id', Auth::user()->participant->id)->latest()->get()
        ]);
    }
}
