<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    use HasFactory , SoftDeletes;
    protected $guarded = [];

    public function hasSpouse()
    {
        return $this->hasOne(Spouse::class, 'employee_id', 'id');
    }

    public function haveChildren()
    {
        return $this->hasOne(Child::class, 'employee_id', 'id');
    }

    public function hasExtandFamily()
    {
        return $this->hasOne(ExtendedFamily::class, 'employee_id', 'id');
    }

    public function hasContactDetails()
    {
        return $this->hasOne(ContactDetail::class, 'employee_id', 'id');
    }

    public function haveResidentialAddresses()
    {
        return $this->hasMany(ResidentialAddress::class, 'employee_id', 'id');
    }

    public function hasEmergencyContact()
    {
        return $this->hasOne(EmergencyContact::class, 'employee_id', 'id');
    }

    public function haveEducations()
    {
        return $this->hasMany(Education::class, 'employee_id', 'id');
    }

    public function haveOtherQualifications()
    {
        return $this->hasMany(OtherQualification::class, 'employee_id', 'id');
    }

    public function haveEmployements()
    {
        return $this->hasMany(EmploymentHistory::class, 'employee_id', 'id');
    }

    public function haveRefereces()
    {
        return $this->hasMany(Reference::class, 'employee_id', 'id');
    }

    public function haveEmployeeDocuments()
    {
        return $this->hasOne(EmployeeDocument::class, 'employee_id', 'id');
    }

    public function haveEducationDocuments()
    {
        return $this->hasMany(EmployeeEducationDocument::class, 'employee_id', 'id');
    }

    public function haveExperienceCertificates()
    {
        return $this->hasMany(EmployeeExperienceCertificate::class, 'employee_id', 'id');
    }

    public function haveSalarySlips()
    {
        return $this->hasMany(EmployeeSalarySlip::class, 'employee_id', 'id');
    }

    public function haveGeneralInformation()
    {
        return $this->hasMany(GeneralInformation::class, 'employee_id', 'id');
    }

    public function haveAnswersQuestions()
    {
        return $this->hasMany(TickAnswer::class, 'employee_id', 'id');
    }
}
