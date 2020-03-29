<?php

namespace Nesiasoft\Core\Emails\Traits;

use Illuminate\Database\Eloquent\Relations\MorphMany;

trait HasEmails
{
    /**
     * Return all emails for this model.
     *
     * @return MorphMany
     */
    public function emails()
    {
        return $this->morphMany(config('emails.email_class'), 'emailable');
    }
}
