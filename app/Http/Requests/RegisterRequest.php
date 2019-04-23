<?php
/**
 *
 * @OA\RequestBody(
 *     request="Register",
 *     description="User Registers to the system",
 *     required=true,
 *     @OA\JsonContent(ref="#/components/schemas/Register"),
 * )
 */
namespace App\Http\Requests;


/**
 * @OA\Schema(
 *     description="Registering a user",
 *     title="Register",
 *     schema="Register"
 * )
 * Class RegisterRequest
 * @package App\Http\Requests
 */
class RegisterRequest  extends ApiRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            /**
             * @OA\Property(
             *      property="name",
             *      type="string",
             *      description="Username",
             * )
             */
            'name' => 'required',

            /**
             * @OA\Property(
             *      property="email",
             *      type="string",
             *      format="email",
             *      description="User email",
             * )
             */
            'email' => 'required|email',

            /**
             * @OA\Property(
             *      property="password",
             *      type="string",
             *      description="User password",
             * )
             */
            'password' => 'required|min:8|case_diff|numbers|letters',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'A name is required',
            'email.required'  => 'Email is required',
            'email.email' => 'Provide valid email',
            'password.required' => 'Password required',
            'password.min:8' => 'Password has to be more than 8 characters',
            'password.case_diff' => 'Password must include upper and lowercase characters',
            'password.numbers' => 'Password must include numbers',
            'password.letters' => 'Password must include letters',
        ];
    }
}
