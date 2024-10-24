<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Company;

class CompanyFormView extends Component
{
    use WithFileUploads;

    public $company; 
    public $name;
    public $email;
    public $logo;
    public $website;

    public function mount($companyId = null)
    {
        if ($companyId) {
            $this->company = Company::find($companyId);

            if ($this->company) {
                $this->name = $this->company->name;
                $this->email = $this->company->email;
                $this->website = $this->company->website;
            }
        }
    }

    public function submit()
    {
        $validatedData = $this->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:companies,email,' . ($this->company ? $this->company->id : ''),
            'logo' => 'nullable|image|dimensions:min_width=100,min_height=100|max:2048',
            'website' => 'required|url|unique:companies,website,' . ($this->company ? $this->company->id : ''),
        ]);

        // Handle file upload
        if ($this->logo) {
            $logoPath = $this->logo->store('logos', 'public');
        } else {
            $logoPath = $this->company ? $this->company->logo : null;
        }

        if ($this->company) {
            // Update existing company
            $this->company->update([
                'name' => $this->name,
                'email' => $this->email,
                'logo' => $logoPath,
                'website' => $this->website,
            ]);

            session()->flash('message', 'Company updated successfully!');
        } else {
            // Create a new company
            Company::create([
                'name' => $this->name,
                'email' => $this->email,
                'logo' => $logoPath,
                'website' => $this->website,
            ]);

            session()->flash('message', 'Company created successfully!');
        }

        return redirect()->route('companies.index');
    }

    public function render()
    {
        return view('livewire.company-form-view');
    }
}
