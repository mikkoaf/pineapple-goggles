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

use Illuminate\Foundation\Http\FormRequest;

/**
 * @OA\Schema(
 *     description="Registering a user",
 *     title="Register",
 *     schema="Register"
 * )
 * Class RegisterRequest
 * @package App\Http\Requests
 */
class RegisterRequest extends FormRequest
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
            'password' => 'required',
        ];
    }
}
