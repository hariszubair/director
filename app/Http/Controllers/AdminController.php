<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Yajra\Datatables\Datatables;
use Carbon\Carbon;
use App\Models\Profile;
class AdminController extends Controller
{
   public function directors(){
   	return view('admin.directors');
   }
   public function ajax_directors(){
         $directors=User::with('profile')->whereHas("roles", function($q){ $q->where("name", "Director");});
        return Datatables::of($directors	)->addColumn('action', function ($row) {
               return $temp='<a href="edit_profile/'.$row->id.'" class="btn btn-primary" title="Edit"><i class="fas fa-edit"></i></a><a href="delete/'.$row->id.'" class="btn btn-danger delete"><i class="fas fa-trash"  onclick="return confirm("Are you sure?")"></i></a>';
               // <a href="mail/'.$row->id.'" class="btn btn-success" title="Mail"><i class="fas fa-paper-plane"></i></a>
               // 
        })->addColumn('membership', function ($row) {
        	if($row->profile){
        		if($row->profile->membership_type == null){
				$membership='No membership';        		
        		}
        		else{
        		$membership='Valid till '.Carbon::parse($row->profile->membership_time)->format('d-m-Y');	
        		}
        		return $membership;
        	}
        	else{
				return '';        		

        	}

        })->addColumn('phone', function ($row) {
            if($row->profile){
              return $row->profile->phone;
            }
        })->addColumn('company_name', function ($row) {
            if($row->profile){
              return $row->profile->company_name;
            }
        })->addIndexColumn()
        ->escapeColumns([])->make(true);

    } 
    public function companies(){
   	return view('admin.companies');
   }
   public function ajax_companies(){
         $directors=User::with('profile')->whereHas("roles", function($q){ $q->where("name", "Company");});
        return Datatables::of($directors	)->addColumn('action', function ($row) {
               return $temp='<a href="edit_profile/'.$row->id.'" class="btn btn-primary" title="Edit" onclick="return confirm("Are you sure?")" ><i class="fas fa-edit"></i></a><a href="delete/'.$row->id.'" class="btn btn-danger delete" onclick="return confirm("Are you sure?")" ><i class="fas fa-trash" ></i></a>';

               // <a href="mail/'.$row->id.'" class="btn btn-success" title="Mail"><i class="fas fa-paper-plane"></i></a>
               
        })->addColumn('membership', function ($row) {
        	if($row->profile){
        		if($row->profile->membership_type == null){
				$membership='No membership';        		
        		}
        		else{
        		$membership='Valid till '.Carbon::parse($row->profile->membership_time)->format('d-m-Y');	
        		}
        		return $membership;
        	}
        	else{
				return '';        		

        	}

        })->addColumn('phone', function ($row) {
            if($row->profile){
              return $row->profile->phone;
            }
        })->addColumn('company_name', function ($row) {
            if($row->profile){
              return $row->profile->company_name;
            }
        })
        ->escapeColumns([])->make(true);

    }  
    public function mail($id=null)
    {
        $user=User::find($id);

        if($user){
            $email=$user->email;
        }
        else{
            $email='';
        }

         $director_email=User::whereHas('roles', function ($query) {
     $query->where('name', 'Director');
        })->get(['email']);
         $partial_director_email=User::whereHas('roles', function ($query) {
    $query->where('name', 'Director');
        })->doesntHave('profile')->get(['email']);
         $complete_director_email=User::whereHas('roles', function ($query) {
    $query->where('name', 'Director');
        })->has('profile')->get(['email']);
          $company_email=User::whereHas('roles', function ($query) {
             $query->where('name', 'Company');
        })->has('profile')->count();
          $partial_company_email=User::whereHas('roles', function ($query) {
             $query->where('name', 'Company');
        })->doesntHave('profile')->get(['email']);
           $complete_company_email=User::whereHas('roles', function ($query) {
             $query->where('name', 'Company');
        })->has('profile')->get(['email']);
        return view('admin/mail',compact('email','complete_director_email','complete_company_email','partial_director_email','partial_company_email'));
    }
    public function send_mail(Request $request)
    {
      return  $email=$request->email;
        $subject=$request->subject;
        $messages=$request->message;
          Mail::send('emails.general', ['messages'=>$messages], function ($m) use($email,$subject) {
            $m->from('mail@honeybeetech.com.au', 'Honey Bee');
            $m->to($email)->subject($subject);
        });
          return redirect()->back()->with('success', 'Email sent successfully.');

    }
    public function delete($id)
    {
        Profile::where('user_id',$id)->delete();
        User::where('id',$id)->delete();
        return redirect()->back();
    }
}
