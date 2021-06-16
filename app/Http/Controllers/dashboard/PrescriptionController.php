<?php

namespace App\Http\Controllers\dashboard;

use App\Prescription;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PrescriptionController extends Controller
{
    public function showPrescription()
    {
        $this->data('prescriptionData', Prescription::orderBy('id', 'DESC')->get());
        return view( 'dashboard.pages.prescriptions.show-prescription', $this->data);
    }

    public function prescriptionDelete(Request $request)
    {
        $id = $request->id;
        $prescription = Prescription::findOrFail($id);
        if ($prescription->delete()) {
            return redirect()->route('show-prescription')->with('success', 'prescription was deleted');
        }
    }

}
