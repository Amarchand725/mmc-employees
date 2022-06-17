<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Spouse;
use App\Models\Child;
use App\Models\ExtendedFamily;
use App\Models\ContactDetail;
use App\Models\ResidentialAddress;
use App\Models\EmployeeForm;
use App\Models\EmergencyContact;
use App\Models\OtherQualification;
use App\Models\Reference;
use App\Models\EmployeeDocument;
use App\Models\EmployeeEducationDocument;
use App\Models\EmployeeExperienceCertificate;
use App\Models\EmployeeSalarySlip;
use App\Models\Education;
use App\Models\EmploymentHistory;
use App\Models\GeneralInformation;
use App\Models\Role;
use App\Models\User;
use Auth;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->ajax()){
            $query = Employee::orderby('id', 'desc')->where('id', '>', 0);
            if($request['search'] != ""){
                $query->where('name', 'like', '%'. $request['search'] .'%');
            }
            if($request['status']!="All"){
                if($request['status']==2){
                    $request['status'] = 0;
                }
                $query->where('status', $request['status']);
            }
            $models = $query->paginate(10);
            return (string) view('admin.employee.search', compact('models'));
        }
        $page_title = 'All Employees';
        $models = Employee::orderby('id', 'desc')->paginate(10);
        return view('admin.employee.index', compact('models', 'page_title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page_title = 'Add Employee';
        return view('web.employee.form-1', compact('page_title'));
    }

    public function EmployeeRegFirstForm($shared_token)
    {
        $user = User::where('share_token', $shared_token)->first();
        $page_title = 'Employee First Form';   
        if($user){
            $employee_id = $user->id;
            return view('web.employee.form-1', compact('page_title', 'employee_id'));
        }else{
            return view('web.not-found');
        }
    }

    public function EmployeeRegSecondForm($employee_id)
    {
        $page_title = 'Employee Second Form';
        return view('web.employee.form-2', compact('page_title', 'employee_id'));
    }

    public function EmployeeRegThirdForm($employee_id)
    {
        $page_title = 'Employee Third Form';
        return view('web.employee.form-3', compact('page_title', 'employee_id'));
    }

    public function EmployeeRegFourthdForm($employee_id)
    {
        $page_title = 'Employee Fourth Form';
        return view('web.employee.form-4', compact('page_title', 'employee_id'));
    }

    public function EmployeeRegFifthdForm($employee_id)
    {
        $page_title = 'Employee Fifth Form';
        return view('web.employee.form-5', compact('page_title', 'employee_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request;
        if(isset($request->employee_id)){
            $model = EmployeeForm::where('employee_id', $request->employee_id)->where('name', $request->form_name)->first();
        }

        if(isset($request->employee_id) && empty($model)){
            if($request->form_name=='form-2'){
                $validator = $request->validate([
                    'name_of_contact_person' => 'required|max:255',
                    'relationship' => 'required|max:255',
                    'residential_contact' => 'max:255',
                    'mobile' => 'required|max:255',
                    'health_condition' => 'max:255',
                    'hobbies' => 'max:255',
                ]);

                $model = EmergencyContact::create([
                    'employee_id' => $request->employee_id,
                    'name_of_contact_person' => $request->name_of_contact_person,
                    'relationship' => $request->relationship,
                    'residential_contact' => $request->residential_contact,
                    'mobile' => $request->mobile,
                    'health_condition' => $request->health_condition,
                    'hobbies' => $request->hobbies,
                ]);

                if($model && !empty($request->education_names)){
                    foreach($request->education_names as $key => $education){
                        if($education != ''){
                            Education::create([
                                'employee_id' => $request->employee_id,
                                'particular' => $education,
                                'year' => $request->education_years[$key],
                                'name_of_institute' => $request->education_institutes[$key],
                                'devision_or_grade' => $request->education_grades[$key],
                            ]);
                        }
                    }
                }

                if(!empty($request->course_titles)){
                    foreach($request->course_titles as $key => $course){
                        if($course != ''){
                            OtherQualification::create([
                                'employee_id' => $request->employee_id,
                                'course' => $education,
                                'year' => $request->course_years[$key],
                                'name_of_institute' => $request->institute_names[$key],
                                'grade_or_percentage' => $request->course_grades[$key],
                            ]);
                        }
                    }
                }

                if(!empty($request->history_company_names)){
                    foreach($request->history_company_names as $key => $history){
                        if($history != ''){
                            EmploymentHistory::create([
                                'employee_id' => $request->employee_id,
                                'name_of_employer' => $history,
                                'address' => $request->history_company_addresses[$key],
                                'contact_person' => $request->history_company_contacts[$key],
                                'contact_no' => $request->history_company_contacts[$key],
                                'employee_from' => $request->history_company_employed_from[$key],
                                'employee_to' => $request->history_company_employed_to[$key],
                                'last_designation' => $request->history_company_designations[$key],
                                'reason_for_leaving' => $request->history_company_leaving_reasons[$key],
                            ]);
                        }
                    }
                }

                EmployeeForm::create([
                    'employee_id' => $request->employee_id,
                    'name' => $request->form_name,
                    'status' => 1,
                ]);

                return redirect()->route('employee-reg-third-form', $request->employee_id)->with('success', 'Form 2 submitted Successfully !');

            }elseif($request->form_name=='form-3'){
                if(!empty($request->full_names)){
                    foreach($request->full_names as $key=>$name){
                        Reference::create([
                            'employee_id' => $request->employee_id,
                            'full_name' => $name,
                            'relationship' => $request->relationships[$key],
                            'company_name' => $request->company_names[$key],
                            'designation' => $request->designations[$key],
                            'address' => $request->addresses[$key],
                            'contact_no' => $request->contact_nos[$key],
                        ]);
                    }
                }

                EmployeeForm::create([
                    'employee_id' => $request->employee_id,
                    'name' => $request->form_name,
                    'status' => 1,
                ]);

                return redirect()->route('employee-reg-fourth-form', $request->employee_id)->with('success', 'Form 3 submitted Successfully !');

            }elseif($request->form_name=='form-4'){
                $validator = $request->validate([
                    'cnic_front' => 'required',
                    'cnic_back' => 'required',
                    'passport' => 'required',
                    'updated_cv' => 'required',
                ]);

                $model = new EmployeeDocument();
                $model->employee_id = $request->employee_id;
                if (isset($request->cnic_front)) {
                    $cnic_front = date('d-m-Y-His').uniqid().'.'.$request->file('cnic_front')->getClientOriginalExtension();
                    $request->cnic_front->move(public_path('/admin/assets/employee-docs/documents'), $cnic_front);
                    $model->cnic_front = $cnic_front;
                }

                if (isset($request->cnic_back)) {
                    $cnic_back = date('d-m-Y-His').uniqid().'.'.$request->file('cnic_back')->getClientOriginalExtension();
                    $request->cnic_back->move(public_path('/admin/assets/employee-docs/documents'), $cnic_back);
                    $model->cnic_back = $cnic_back;
                }
                if (isset($request->passport)) {
                    $passport = date('d-m-Y-His').uniqid().'.'.$request->file('passport')->getClientOriginalExtension();
                    $request->passport->move(public_path('/admin/assets/employee-docs/documents'), $passport);
                    $model->passport = $passport;
                }
                if (isset($request->updated_cv)) {
                    $updated_cv = date('d-m-Y-His').uniqid().'.'.$request->file('updated_cv')->getClientOriginalExtension();
                    $request->updated_cv->move(public_path('/admin/assets/employee-docs/cvs'), $updated_cv);
                    $model->updated_cv = $updated_cv;
                }

                $model->save();

                if($request->hasfile('educational_documents')){
                    foreach($request->file('educational_documents') as $file)
                    {
                        $document = date('d-m-Y-His').uniqid().'.'.$file->extension();
                        $file->move(public_path().'/admin/assets/employee-docs/educational_documents', $document);
                        EmployeeEducationDocument::create([
                            'employee_id' => $request->employee_id,
                            'document' => $document,
                        ]);
                    }
                }
                if($request->hasfile('additional_documents')){
                    foreach($request->file('additional_documents') as $file)
                    {
                        $document = date('d-m-Y-His').uniqid().'.'.$file->extension();
                        $file->move(public_path().'/admin/assets/employee-docs/educational_documents', $document);
                        EmployeeEducationDocument::create([
                            'employee_id' => $request->employee_id,
                            'document' => $document,
                        ]);
                    }
                }

                if($request->hasfile('experience_certificates')){
                    foreach($request->file('experience_certificates') as $file)
                    {
                        $document = date('d-m-Y-His').uniqid().'.'.$file->extension();
                        $file->move(public_path().'/admin/assets/employee-docs/experience_certificates', $document);
                        EmployeeExperienceCertificate::create([
                            'employee_id' => $request->employee_id,
                            'document' => $document,
                        ]);
                    }
                }

                if($request->hasfile('salary_slips')){
                    foreach($request->file('salary_slips') as $file)
                    {
                        $document = date('d-m-Y-His').uniqid().'.'.$file->extension();
                        $file->move(public_path().'/admin/assets/employee-docs/salary_slips', $document);
                        EmployeeSalarySlip::create([
                            'employee_id' => $request->employee_id,
                            'slip' => $document,
                        ]);
                    }
                }

                EmployeeForm::create([
                    'employee_id' => $request->employee_id,
                    'name' => $request->form_name,
                    'status' => 1,
                ]);

                return redirect()->route('employee-reg-fifth-form', $request->employee_id)->with('success', 'Form 4 submitted Successfully !');
            }elseif($request->form_name=='form-5'){
                $validator = $request->validate([
                    'cnic_front' => 'required',
                    'cnic_back' => 'required',
                    'passport' => 'required',
                    'updated_cv' => 'required',
                ]);

                $model = new EmployeeDocument();
                $model->employee_id = $request->employee_id;


                //sending notification email to admn & user.
                EmployeeForm::create([
                    'employee_id' => $request->employee_id,
                    'name' => $request->form_name,
                    'status' => 1,
                ]);

                if($model){
                    $emp = User::where('id', $request->employee_id)->first();
                    $emp->form_status = 1;
                    $emp->save();

                    $user = User::where('id', $request->employee_id)->first();
                    $admin = User::role('Admin')->first();

                    $details = [
                        'greeting' => 'Hi '. $admin->name,
                        'body' => 'Mr/Mrs. '.\Str::upper($user->name). ' has submited form successfully.',
                        'thanks' => '',
                        'actionText' => 'You can view the form.',
                        'actionURL' => route('admin.login'),
                    ];
                    
                    Notification::send($admin, new AppNotification($details));

                    $details = [
                        'greeting' => 'Hi '. $user->name,
                        'body' => 'You have submitted your form successfully.',
                        'thanks' => 'Thank you so much!',
                        'actionText' => '',
                        'actionURL' => '',
                    ];
              
                    Notification::send($user, new AppNotification($details));

                    return redirect()->route('thanks')->with('success', 'Thanks you have submited your form. !');
                }
            }
        }else{
            $validator = $request->validate([
                'full_name' => 'required|max:255',
                'father_name' => 'required|max:255',
                'dob' => 'required|max:255',
                'place_of_birth' => 'required|max:255',
                'place_of_birth' => 'required|max:255',
                'cnic' => 'required|max:255',
                'cnic_expiry' => 'required|max:255',
                'blood_group' => 'max:255',
                'religion' => 'required|max:255',
                'personal_mobile_no' => 'required|max:255',
                'personal_email' => 'required|max:255',
            ]);

            if($request->marital_status==1){
                $validator = $request->validate([
                    'spouse_name' => 'max:255',
                    'spouse_dob' => 'max:255',
                    'spouse_cnic_no' => 'max:255',
                ]);
            }

            // return $request;
            $employee = new Employee();
            $employee->user_id = $request->employee_id;
            $employee->full_name = $request->full_name;
            $employee->father_name = $request->father_name;
            $employee->dob = $request->dob;
            $employee->place_of_birth = $request->place_of_birth;
            $employee->cnic = $request->cnic;
            $employee->cnic_expiry = $request->cnic_expiry;
            $employee->blood_group = $request->blood_group;
            $employee->Religion = $request->religion;
            $employee->marital_status = $request->marital_status;
            $employee->save();

            if($employee){
                $spouses = new Spouse();
                $spouses->employee_id = $employee->id;
                $spouses->spouse_name  = $request->spouse_name;
                $spouses->spouse_gender = $request->spouse_gender;
                $spouses->spouse_dob = $request->spouse_dob;
                $spouses->spouse_cnic_no = $request->spouse_cnic_no;
                $spouses->save();
            }
            if($spouses && isset($request->child_names)){
                foreach($request->child_names as $key=>$child_name){
                    if($child_name != ''){
                        $Child = new Child();
                        $Child->employee_id = $employee->id;
                        $Child->name = $child_name;
                        $Child->gender = $request->child_genders[$key];
                        $Child->dob = $request->child_dobs[$key];
                        $Child->cnic = $request->child_cnic_nos[$key];
                        $Child->save();
                    }
                }
            }

            $extended = new ExtendedFamily();
            $extended->employee_id = $employee->id;
            $extended->father = $request->father;
            $extended->mother = $request->mother;
            $extended->brother = $request->brother;
            $extended->sister = $request->sister;
            $extended->save();

            if($extended){
                $contactdetail = new ContactDetail();
                $contactdetail->employee_id = $employee->id;
                $contactdetail->home_ptcl_no = $request->home_ptcl_no;
                $contactdetail->personal_mobile_no = $request->personal_mobile_no;
                $contactdetail->personal_email = $request->personal_email;
                $contactdetail->save();
            }

            if($contactdetail){
                foreach($request->types as $k=>$type){
                    if($type != ''){
                        $address = new ResidentialAddress();
                        $address->employee_id = $employee->id;
                        $address->type = $type;
                        $address->living_since = $request->living_sinces[$k];
                        $address->nearest_landmark = $request->nearest_landmarks[$k];
                        $address->peroperty_type = $request->property_types[$k];
                        $address->complete_address = $request->completed_addresses[$k];
                        $address->save();
                    }
                }
            }

            EmployeeForm::create([
                'employee_id' => $request->employee_id,
                'name' => $request->form_name,
                'status' => 1,
            ]);
        }

        return redirect()->route('employee-reg-second-form', $request->employee_id)->with('success', 'Form 1 submitted Successfully !');
    }

    public function thanks()
    {
        return "Thanks";
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $page_title = 'Show Employee Details';
        $model = Employee::where('id', $id)->first();
        return View('admin.employee.show', compact('model', 'page_title'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        $page_title = 'Edit Employee Details';
        $model = Employee::where('slug', $slug)->first();
        return View('admin.employee.edit', compact('model', 'page_title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = $request->validate([
            'name' => 'required|max:255',
        ]);

        $model = Employee::where('id', $id)->first();

        $model->name = $request->name;
        $model->description = $request->description;
        $model->status = $request->status;
        $model->update();

        return redirect()->route('employee.index')->with('message', 'Employee Updated Successfully !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = Employee::where('id', $id)->first();

        if ($model) {
            $model->delete();
            return true;
        } else {
            return response()->json(['message' => 'Failed '], 404);
        }
    }
}
