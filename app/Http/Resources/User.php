<?php

namespace App\Http\Resources;

use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordInterface;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;

class User extends JsonResource implements CanResetPasswordInterface
{
    use Notifiable;
    use CanResetPassword;

    protected $token;

    public function __construct($resource, $token = null)
    {
        parent::__construct($resource);
        $this->token = $token;
    }

    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'last_name' => $this->last_name,
            'phone' => $this->phone,
            'email' => $this->email,
            'role' => $this->role,
            $this->merge($this->userable),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
