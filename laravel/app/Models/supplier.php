<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Supplier extends Authenticatable
{
	use HasFactory, Notifiable;

	protected $fillable = [
		'first_name',
		'last_name',
		'email',
		'phone',
		'product_type',
		'id_number',
		'country',
		'password',
		'must_change_password',
		'password_changed_at',
	];
    protected $validationRules = [
        'first_name' => 'required|string|max:255',
        'last_name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:suppliers,email',
        'phone' => 'required|string|max:10',
        'product_type' => 'required|string|max:255',
        'id_number' => 'required|string|max:100|unique:suppliers,id_number',
        'country' => 'required|string|max:100',
        'password' => 'required|string|min:8|confirmed',
    ];


	protected $hidden = [
		'password',
	];

	protected $casts = [
		'must_change_password' => 'boolean',
		'password_changed_at' => 'datetime',
	];

	public function getFullNameAttribute()
	{
		return $this->first_name . ' ' . $this->last_name;
	}
}