<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
              case 'add':
                // dd($this->avatar);
                  $ruler = [
                      'title'=>'required|max:255',
                      'content'=>'required',
                      'category_id'=>'required',
                  ];

                break;
               
                
              default:
                break;
            }
          break;
        case 'PATCH':
          // dd(123);
          switch($currentAction){
            case 'edit':
              // dd($this->route('id'));

              $ruler = [
                'title'=>'required|max:255',
                'content'=>'required',
                'category_id'=>'required',
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
    return [
      'title.required' => 'Tiêu đề không được để trống',
      'title.max' => 'Tiêu đề không được quá 255 ký tự',
      'content.required' => 'Nội dung không được để trống',
      'category_id.required' => 'Danh mục không được để trống',
    ];
  }
}
