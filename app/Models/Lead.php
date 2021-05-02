<?php

namespace App\Models;

use \DateTimeInterface;
use App\Traits\Auditable;
use App\Traits\MultiTenantModelTrait;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Lead extends Model
{
    use SoftDeletes;
    use MultiTenantModelTrait;
    use Auditable;
    use HasFactory;

    public $table = 'leads';

    protected $dates = [
        'created_at',
        'followup_date',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'email',
        'phone',
        'whatsapp_no',
        'alternative_number',
        'localtion',
        'address',
        'interest',
        'comment',
        'source',
        'utm',
        'utm_campaign',
        'utm_medium',
        'ip',
        'created_at',
        'followup_date',
        'lead_status_id',
        'assign_to_id',
        'updated_at',
        'deleted_at',
        'team_id',
    ];

    public function getFollowupDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setFollowupDateAttribute($value)
    {
        $this->attributes['followup_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function lead_status()
    {
        return $this->belongsTo(LeadStatus::class, 'lead_status_id');
    }

    public function assign_to()
    {
        return $this->belongsTo(User::class, 'assign_to_id');
    }

    public function team()
    {
        return $this->belongsTo(Team::class, 'team_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
