<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PayrollPayment extends Model
{
	protected $fillable = [
		"total_cost",
		"end_period",
		"start_period",
		"total_overtimes_surcharges",
		"total_incomes",
		"total_parafiscals",
		"total_provisions",
		"total_retentions",
		"total_salaries",
		"total_social_secturity",
		"payment_frequency",
		"company_id"
	];



	public function personPayrollPayment()
	{
		return $this->hasMany(PersonPayrollPayment::class);
	}

	public function provisionsPersonPayrollPayment()
	{
		return $this->hasMany(ProvisionsPersonPayrollPayment::class);
	}

	public function socialSecurityPersonPayrollPayment()
	{
		return $this->hasMany(SocialSecurityPersonPayrollPayment::class);
	}


	/**
	 * Get the user that owns the PayrollPayment
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function company()
	{
		return $this->belongsTo(Company::class);
	}
}
