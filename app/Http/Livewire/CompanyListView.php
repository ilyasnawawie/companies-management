<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Company;
use Livewire\WithPagination;

class CompanyListView extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public function deleteCompany($companyId)
    {
        $company = Company::findOrFail($companyId);

        if ($company->logo) {
            \Storage::disk('public')->delete($company->logo);
        }

        $company->delete();

        session()->flash('message', 'Company deleted successfully!');

        $this->resetPage(); 
    }

    public function render()
    {
        $companies = Company::paginate(10);

        return view('livewire.company-list-view', ['companies' => $companies]);
    }
}
