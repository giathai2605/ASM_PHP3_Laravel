<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostCategoryRequest extends FormRequest
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
                        'name' => 'required|unique:property_category,name',
                        'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                        'description' => 'max:255',
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
                    'name' => 'required|unique:property_category,name,'.$this->route('id'),
                    'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                    'description' => 'max:255',
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
            
            'name.required' => 'Tên loại bất động sản không được để trống',
            'name.unique' => 'Tên loại bất động sản đã tồn tại',
            'image.required' => 'Ảnh loại bất động sản không được để trống',
            'image.image' => 'Ảnh loại bất động sản không đúng định dạng',
            'image.mimes' => 'Ảnh loại bất động sản phải thuộc các định dạng sau: jpeg,png,jpg,gif,svg',
            'image.max' => 'Ảnh loại bất động sản không được vượt quá 2048kb',
            'description.max' => 'Mô tả loại bất động sản không được vượt quá 255 ký tự',
  
        
         
        
      ];
      return $messages;
      }
}
