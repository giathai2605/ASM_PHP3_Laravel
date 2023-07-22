<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        $ruler=[];
      $currentAction= $this->route()->getActionMethod();
      switch($this->method()){
        case 'POST':
            switch($currentAction){
              case 'addNew':
                // dd($this->avatar);
                  $ruler = [
                      'fullname'=>'required|min:10',
                      'email'=>'required|email|unique:users,email',
                      'username'=>'required|min:6|max:50|unique:users,username',
                      'password'=>'required|min:6|max:20',
                      'phone'=>'required|regex:/^[0-9]+$/|max:10|unique:users,phone',
                      'gender'=>'required|numeric|max:1',
                      'birthday'=>'required|date|before:today',
                      'address'=>'required',
                      'avatar'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                      'role_id'=>'required',

                  ];
                break;
               
                
              default:
                break;
            }
          break;
        case 'PATCH':
          // dd(123);
          switch($currentAction){
            case 'update':
              // dd($this->route('id'));

              $ruler = [
                  'fullname' => 'required|min:10',
                  'username'=>'required|min:6|max:50|unique:users,username,'. $this->route('id'),
                  'email' => 'required|email|unique:users,email,' . $this->route('id'),
                  'phone' => 'required|regex:/^[0-9]+$/|max:10|unique:users,phone,' . $this->route('id'), 
                  'password'=>'required|min:6',
                  'gender' => 'required|numeric|max:1',
                  'birthday' => 'required|date|before:today',
                  'address' => 'required',
              ];
              break;

              case 'changePassowrd':
                $ruler = [
                    'current_password' => 'required|min:6|max:20',
                    'password'=>'required|min:6|max:20',
                    'confirm_password'=>'required|same:password',
                ];
                break;

            default:
              break;
            }
          break;
        default:
         break;   
        }
      return $ruler;
    }

    public function messages()
    {
      $messages = [
        'fullname.required' => 'Họ tên bắt buộc nhập',
        'fullname.min' => 'Họ tên phải có ít nhất 10 ký tự',
        'email.required' => 'Email bắt buộc nhập',
        'email.email' => 'Email không đúng định dạng',
        'email.unique' => 'Email đã tồn tại',
        'username.required' => 'Tên đăng nhập bắt buộc nhập',
        'username.min' => 'Tên đăng nhập phải có ít nhất 6 ký tự',
        'username.max' => 'Tên đăng nhập không được quá 50 ký tự',
        'username.unique' => 'Tên đăng nhập đã tồn tại',
        'password.required' => 'Mật khẩu bắt buộc nhập',
        'password.min' => 'Mật khẩu phải có ít nhất 6 ký tự',
        'password.max' => 'Mật khẩu không được quá 20 ký tự',
        'phone.required' => 'Số điện thoại bắt buộc nhập',
        'phone.unique' => 'Số điện thoại đã tồn tại',
        'phone.regex' => 'Số điện thoại không được chứa ký tự đặc biệt hoặc khoảng trắng.',
        'gender.required' => 'Bắt buộc nhập giới tính',
        'birthday.required' => 'Bắt buộc nhập ngày sinh',
        'birthday.date' => 'Ngày sinh không đúng định dạng',
        'birthday.before' => 'Ngày sinh không được lớn hơn ngày hiện tại',
        'address.required' => 'Bắt buộc nhập địa chỉ',
        'avatar.required' => 'Bắt buộc nhập ảnh đại diện',
        'avatar.image' => 'Ảnh đại diện không đúng định dạng',
        'avatar.mimes' => 'Ảnh đại diện phải là định dạng: jpeg,png,jpg,gif,svg',
        'avatar.max' => 'Ảnh đại diện không được quá 2048kb',
        'role_id.required' => 'Bắt buộc chọn vai trò',
        'current_password.required' => 'Bắt buộc nhập mật khẩu cũ',
        'current_password.min' => 'Mật khẩu phải có ít nhất 6 ký tự',
        'current_password.max' => 'Mật khẩu không được quá 20 ký tự',
        'old_password.required' => 'Bắt buộc nhập mật khẩu cũ',
        'old_password.same' => 'Mật khẩu cũ không đúng',
        'confirm_password.required' => 'Bắt buộc nhập xác nhận mật khẩu',
        'confirm_password.same' => 'Xác nhận mật khẩu không đúng',

      
       
      
    ];
    return $messages;
    }

    }

